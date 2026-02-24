<?php
namespace Tests\App\Services;

use App\Services\UserService;
use Tests\TestCase;
use App\Models\User;
use Mockery;
use Illuminate\Http\JsonResponse;
# command to test the class = php artisan test --filter=UserServiceTest

class UserServiceTest extends TestCase
{
    private $userService;


    # command to test the method = php artisan test --filter=UserServiceTest::testUserStore
    public function testUserStore()
    {
        //
    }

    # php artisan test --filter=UserServiceTest::test_get_users_returns_success_response
    public function test_get_users_returns_success_response()
    {
        // Arrange
        //Simulating what $this->user->all() would normally return from the database, but without touching the DB.
        $fakeUsers = collect([
            new User(['name' => 'Breno', 'email' => 'breno@test.com', 'password' => 'passwordtest']),
            new User(['name' => 'Maria', 'email' => 'maria@test.com','password' => 'passwordtest123']),
        ]);

        $userMock = Mockery::mock(User::class);

        $userMock->shouldReceive('all')
            ->once()
            ->andReturn($fakeUsers);

        $service = new UserService($userMock);

        // Act
        $response = $service->getUsers();

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->status());

        $responseData = $response->getData(true);

        $this->assertEquals('success', $responseData['status']);
        $this->assertEquals('Usuários exibidos com sucesso', $responseData['message']);
        $this->assertCount(2, $responseData['data']);
        }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
