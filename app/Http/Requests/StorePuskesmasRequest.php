<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePuskesmasRequest extends FormRequest
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
            'nama_puskesmas' => 'required',
            'alamat' => 'required',
            'id_desa' => 'required',
        ];
    }
}
