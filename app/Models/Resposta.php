<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;
    
    protected $fillable = ['solicitacao_id', 'texto'];

    public function rules(){
        return [
            'texto' => 'required|min:3|max:100',
            'solicitacao_id' => 'required|exists:solicitacoes,id'
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute precisa ter no mínimo 3 caracteres',
            'max' => 'O campo :attribute precisa ter no máximo 100 caracteres',
            'exists' => 'A solicitação não existe'
        ];
    }    
    
    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

}
