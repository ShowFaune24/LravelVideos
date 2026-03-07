<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
     if(Auth::check() && Auth::user()->can('create',
     Book::class)){
        return true;
     }   
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["required", "string", "unique:books,title"],
            "price" => ["required", "numeric"],
            "year" => ["required", "min:0", "integer"],
            "limited" => ["boolean"],
            "author" => ["required", "string"],
            "type_id" => ["integer"]
        ];
    }
}
