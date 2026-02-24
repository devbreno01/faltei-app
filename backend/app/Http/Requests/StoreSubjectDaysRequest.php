<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class StoreSubjectDaysRequest extends FormRequest
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
            "day" => "required|string",
            "subject_id" => "required|integer"
        ];
    }
}
