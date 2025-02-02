<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PesertaUpdateRequest extends FormRequest
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
        $id = $this->route('edPeserta');
        return [
            'no_urut'     => 'nullable',
            'foto_pleton' => 'nullable|file|image|max:2048',
            'rekomendasi' => 'nullable|file|image|max:2048',
            'status'      => 'nullable',
        ];
    }
}