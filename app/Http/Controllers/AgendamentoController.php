<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Agendamento;
class AgendamentoController extends Controller
{
    function create(Request $request){
        $request->validate([
            'nome'=>'required',
            'telefone'=>'required',
            'origem'=>'required',
            'data_do_Contato'=>'required',
            'observacao'=>'required'
        ]);
        $query = DB::table('servicos')->insert([
            'nome'=>$request->input('nome'),
            'telefone'=>$request->input('telefone'),
            'origem'=>$request->input('origem'),
            'data_do_Contato'=>$request->input('data_do_Contato'),
            'observacao'=>$request->input('observacao')
        ]);
        
    }

    public function listar()
    {
        $data = array(
            'listar' =>DB::table('servicos')->get()

        );
        return view('consultar', $data);
    }
}
