<?php

namespace App\Http\Controllers;

use App\Interesse;
use App\Mail\CampanhaNotificacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CampanhaController extends Controller
{

    public function campanha(){

        return view('campanha.index');
    }


    public function index(Request $request){


        if(strcmp($request->input('campanha'), "all")==0){


            $usuarios = User::all();

            $titulo = $request->titulo;
            $conteudo = $request->conteudo;


            foreach ($usuarios as $usuario){
                Mail::to($usuario)->send(new CampanhaNotificacao($titulo, $conteudo));
            }

            return redirect('campanhas')->with('mensagem','Campanha enviada');
        }

        if(strcmp($request->input('campanha'), "allHomen")==0){

            $usuarios = User::where('sexo', '==' ,'Masculino');

            $titulo = $request->titulo;
            $conteudo = $request->conteudo;


            foreach ($usuarios as $usuario){
                Mail::to($usuario)->send(new CampanhaNotificacao($titulo, $conteudo));
            }

            return redirect('campanhas')->with('mensagem','Campanha enviada');

        }


        if(strcmp($request->input('campanha'), "allMulher")==0){

            $usuarios = User::where('sexo', '==' ,'Feminino');

            $titulo = $request->titulo;
            $conteudo = $request->conteudo;


            foreach ($usuarios as $usuario){
                Mail::to($usuario)->send(new CampanhaNotificacao($titulo, $conteudo));
            }

            return redirect('campanhas')->with('mensagem','Campanha enviada');

        }


        if(strcmp($request->input('campanha'), "Jovens")==0){





            $usuarios = User::all();

            foreach ($usuarios as $usuario){

                // separando yyyy, mm, ddd
                list($ano, $mes, $dia) = explode('-', $usuario->dt_nasc);

                // data atual
                $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                // Descobre a unix timestamp da data de nascimento do fulano
                $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

                // cálculo
                $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);



                $titulo = $request->titulo;
                $conteudo = $request->conteudo;


                if($idade > 18 && $idade < 35){

                    Mail::to($usuario)->send(new CampanhaNotificacao($titulo, $conteudo));

                }



            }





            return redirect('campanhas')->with('mensagem','Campanha enviada');

        }




        if(strcmp($request->input('campanha'), "Adultos")==0){





            $usuarios = User::all();

            foreach ($usuarios as $usuario){

                // separando yyyy, mm, ddd
                list($ano, $mes, $dia) = explode('-', $usuario->dt_nasc);

                // data atual
                $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                // Descobre a unix timestamp da data de nascimento do fulano
                $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

                // cálculo
                $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);



                $titulo = $request->titulo;
                $conteudo = $request->conteudo;


                if($idade > 35 && $idade < 50){

                    Mail::to($usuario)->send(new CampanhaNotificacao($titulo, $conteudo));

                }



            }





            return redirect('campanhas')->with('mensagem','Campanha enviada');

        }



        if(strcmp($request->input('campanha'), "Idosos")==0){





            $usuarios = User::all();

            foreach ($usuarios as $usuario){

                // separando yyyy, mm, ddd
                list($ano, $mes, $dia) = explode('-', $usuario->dt_nasc);

                // data atual
                $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                // Descobre a unix timestamp da data de nascimento do fulano
                $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

                // cálculo
                $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);



                $titulo = $request->titulo;
                $conteudo = $request->conteudo;


                if($idade > 51 && $idade < 100){

                    Mail::to($usuario)->send(new CampanhaNotificacao($titulo, $conteudo));

                }



            }





            return redirect('campanhas')->with('mensagem','Campanha enviada');

        }









    }
}
