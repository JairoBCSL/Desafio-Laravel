<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $table = 'solicitacoes';
    protected $fillable = ['titulo', 'motivo_id', 'descricao', 'status_id', 'protocolo'];

    public function rules(){
        return [
            'titulo' => 'required|min:3|max:30',
            'motivo_id' => 'required|exists:motivos,id',
            'descricao' => 'required|min:3|max:30',
            'protocolo' => 'unique'
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo precisa ter no mínimo 3 caracteres',
            'max' => 'O campo precisa ter no máximo 30 caracteres',
            'exists' => 'O registro não existe',
            'unique' => 'O campo :attribute precisa ser único'
        ];
    }

    public function motivo(){
        return $this->belongsTo('\App\Models\Motivo');
    }

    public function status(){
        return $this->belongsTo('\App\Models\Status');
    }

    public function respostas(){
        return $this->hasMany('App\Models\Resposta');
    }
}
