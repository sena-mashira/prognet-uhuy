<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityRequest extends FormRequest
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
        $opportunity = $this->route('opportunity');
        $id = $opportunity ? $opportunity->id : null;

        return [
            'category_id'       => ['required', 'exists:opportunity_categories,id'],

            'title'             => ['required', 'string', 'max:200'],

            // logika adaptif: store vs update
            'slug'              => [
                'required',
                'string',
                'max:220',
                'unique:opportunities,slug,' . ($id ?? 'NULL') . ',id',
            ],

            'organization'      => ['nullable', 'string', 'max:200'],

            'description'       => ['nullable', 'string'],
            'requirements'      => ['nullable', 'string'],
            'benefits'          => ['nullable', 'string'],

            'location'          => ['nullable', 'string', 'max:150'],
            'education_level'   => ['nullable', 'in:SMA,D3,S1,S2,Umum'],
            'field'             => ['nullable', 'string', 'max:200'],

            'difficulty'        => ['required', 'in:easy,medium,hard'],

            'start_date'        => ['nullable', 'date'],
            'end_date'          => ['nullable', 'date', 'after_or_equal:start_date'],

            'registration_link' => ['nullable', 'url'],
            'poster_url'        => ['nullable', 'url'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',

            'title.required'       => 'Judul tidak boleh kosong.',
            'title.max'            => 'Judul terlalu panjang. Maksimal 200 karakter.',

            'slug.required'        => 'Slug wajib diisi.',
            'slug.unique'          => 'Slug ini sudah digunakan. Gunakan slug lain.',
            'slug.max'             => 'Slug terlalu panjang. Maksimal 220 karakter.',

            'organization.max'     => 'Nama organisasi terlalu panjang. Maksimal 200 karakter.',

            'description.string'   => 'Deskripsi harus berupa teks.',
            'requirements.string'  => 'Bagian persyaratan harus berupa teks.',
            'benefits.string'      => 'Bagian benefit harus berupa teks.',

            'location.max'         => 'Lokasi terlalu panjang. Maksimal 150 karakter.',

            'education_level.in'   => 'Tingkat pendidikan tidak valid.',

            'field.max'            => 'Bidang terlalu panjang. Maksimal 200 karakter.',

            'difficulty.required'  => 'Tingkat kesulitan wajib diisi.',
            'difficulty.in'        => 'Tingkat kesulitan tidak valid.',

            'start_date.date'      => 'Tanggal mulai tidak valid.',
            'end_date.date'        => 'Tanggal selesai tidak valid.',
            'end_date.after_or_equal' => 'Tanggal selesai tidak boleh lebih awal dari tanggal mulai.',

            'registration_link.url' => 'Link pendaftaran harus berupa URL yang valid.',
            'poster_url.url'        => 'URL poster harus berupa tautan valid.',
        ];
    }
}
