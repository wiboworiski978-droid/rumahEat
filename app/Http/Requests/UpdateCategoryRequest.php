<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $category = $this->route('category');

        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories', 'name')->ignore($category),
            ],
            'description' => 'nullable|string|max:500',
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'name.required' => 'nama kategori wajib diisi .',
            'name.max' => 'nama kategori maksimal 100 karakter.',
            'name.uniques' => 'kategori mtersebut sudah ada.',
            'description.max' => 'deskripsi maksimal 500 karakter.',
        ];
    }
}
