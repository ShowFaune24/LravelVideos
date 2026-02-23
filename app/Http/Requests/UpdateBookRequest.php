<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            "title" => ["required", "string", "unique:books,title,{$this->book->id}"],
            "price" => ["required", "numeric"],
            "year" => ["required", "min:0", "integer"],
            "limited" => ["boolean"],
            "author" => ["required", "string"]
        ];
    }

    public function messages() {
        return [
            "title.required" => "Egy konyv cim nelkul nem johet letre."
        ];
    }
}
