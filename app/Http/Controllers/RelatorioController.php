<?php

namespace App\Http\Controllers;

use App\Acesso;
use App\Interesse;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RelatorioController extends Controller
{
    public function index(Request $request){


        if(strcmp($request->input('relatorio'), "ProdutoInteresse")==0){

            $interesses = Interesse::all()->groupBy('produto_id');

            $pdf = PDF::loadView('relatorio.interesse',compact('interesses'));


            return $pdf->stream();
        }

        if(strcmp($request->input('relatorio'), "ProdutoAcesso")==0){

            $acessos = DB::select(DB::raw("SELECT produto_id, COUNT(produto_id) AS qtd_acessos FROM acessos
               
                GROUP BY  produto_id    ORDER BY qtd_acessos DESC" ));




            $pdf = PDF::loadView('relatorio.acesso',compact('acessos'));


            return $pdf->stream();
        }


        if(strcmp($request->input('relatorio'), "ProdutoAlerta")==0){

            $alertas = DB::select(DB::raw("SELECT produto_id, COUNT(produto_id) AS qtd_alerta FROM avisos
               
                GROUP BY  produto_id    ORDER BY qtd_alerta DESC" ));




            $pdf = PDF::loadView('relatorio.alerta',compact('alertas'));


            return $pdf->stream();
        }



    }


    public function exibirOpcoesRelatorio(){
        return view('relatorio.index');
    }


}
