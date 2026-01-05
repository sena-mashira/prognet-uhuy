<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        // Jika update, route('blog') akan berisi instance model
        $blog = $this->route('blogs');
        $id = $blog ? $$blog->id : null;

        return [
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'slug'              => [
                'nullable',
                'string',
                'max:225',
                'unique:blogs,slug,' . ($id ?? 'NULL') . ',id',
            ],
            'thumbnail'   => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'Judul wajib diisi.',
            'slug.required'         => 'Slug dibutuhkan untuk identitas tulisan.',
            'slug.unique'           => 'Slug ini sudah dipakai tulisan lain.',
            'content.required'      => 'Konten tidak boleh kosong.',
            'thumbnail.required'    => 'Thumbnail tidak boleh kosong.',
            'thumbnail.image'       => 'Thumbnail harus berupa file gambar.',
            'thumbnail.mimes'       => 'Format thumbnail harus jpeg/png/jpg/webp.',
            'thumbnail.max'         => 'Thumbnail maksimal 2MB.',
        ];
    }
}
