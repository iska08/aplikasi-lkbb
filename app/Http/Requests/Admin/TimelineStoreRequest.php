<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TimelineStoreRequest extends FormRequest
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
            'tgl_pendaftaran_buka'  => 'required',
            'tgl_pendaftaran_tutup' => 'required',
            'lokasi_pendaftaran'    => 'required',
            'tgl_tm'                => 'required',
            'lokasi_tm'             => 'required',
            'tgl_pelaksanaan'       => 'required',
            'lokasi_pelaksanaan'    => 'required',
        ];
    }
}
