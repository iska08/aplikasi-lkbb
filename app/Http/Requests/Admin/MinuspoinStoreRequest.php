<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MinuspoinStoreRequest extends FormRequest
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
            'peserta_id'      => 'required|integer|exists:pesertas,id',
            'user_id'         => 'required|integer|exists:users,id',
            'pengurangan_id'  => 'required|array|min:1',  // Validasi sebagai array
            'pengurangan_id.*'=> 'required|integer|exists:pengurangans,id', // Elemen array harus valid
            'minus'           => 'required|array|min:1',
            'minus.*'         => 'required|numeric|min:0', // Pastikan angka valid
            'jumlah'          => 'required|array|min:1',
            'jumlah.*'        => 'required|integer|min:0', // Pastikan integer valid
        ];
    }
}