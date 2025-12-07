<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityCategoryRequest extends FormRequest
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
        $category = $this->route('opportunityCategory');
        $id = $category ? $category->id : null;

        return [
            'name'        => 'required|string|max:100',
            'slug'              => [
                'required',
                'string',
                'max:120',
                'unique:opportunity_categories,slug,' . ($id ?? 'NULL') . ',id',
            ],
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.max'      => 'Nama kategori tidak boleh lebih dari 100 karakter.',

            'slug.required' => 'Slug wajib diisi.',
            'slug.unique'   => 'Slug ini sudah digunakan.',
            'slug.max'      => 'Slug tidak boleh lebih dari 120 karakter.',
        ];
    }
}
