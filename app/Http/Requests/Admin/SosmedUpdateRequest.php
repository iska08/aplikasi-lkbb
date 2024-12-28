<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SosmedUpdateRequest extends FormRequest
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
        $id = $this->route('sosmed');
        return [
            'email'     => 'required',
            'facebook'  => 'required',
            'instagram' => 'required',
            'tiktok'    => 'required',
            'twitter'   => 'required',
            'youtube'   => 'required',
        ];
    }
}
