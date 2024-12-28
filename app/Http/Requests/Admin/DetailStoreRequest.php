<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DetailStoreRequest extends FormRequest
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
            'cakupan'         => 'required',
            'alamat'          => 'required',
            'maps'            => 'required',
            'keterangan_lkbb' => 'required',
            'total_pembinaan' => 'required',
            'htm'             => 'required',
        ];
    }
}