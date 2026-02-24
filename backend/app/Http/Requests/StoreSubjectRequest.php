<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class StoreSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            "name" => "required|string",
            "maximum_allowed_absence_percentage" => "required|integer",
            "total_hours" => "required|integer",
            "hours_per_class" => "required|integer",
            "color" => "string",
            "semester_id" => "required|integer"
        ];
    }
}
