<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
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

    public function rules(){
        return [
            'nome'=>'required',
            'data_inicio'=>'required',
            'data_fim'=>'required',
            'hora_inicio'=>'required',
            'hora_terminio'=>'required',
        ];
        return redirect()-route('evento.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function message()
    {
        return [
            'nome.required' => 'Campo nome e requerido ',
            'data_inicio' => 'Campo data de inicio é requirido',
            'data_fim' => 'Campo data de fim é requirido',
            'hora_inicio' => 'Campo hora de inicio é requirido',
            'hora_terminio' => 'Campo hora de terminio é requirido',
        ];
    }
}
