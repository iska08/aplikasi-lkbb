<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PletonStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'peserta_id'    => 'nullable',
            'nama_anggota'  => 'nullable',
            'kelas_anggota' => 'nullable',
            'nis_anggota'   => 'nullable',
            'posisi'        => 'nullable',
            'foto_anggota'  => 'nullable|file|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'foto_anggota.image' => 'The file must be an image.',
            'foto_anggota.max'   => 'The image must not be larger than 2MB.',
        ];
    }
}