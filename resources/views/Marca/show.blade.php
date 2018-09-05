@extends('layouts.app')

@section('htmlheader_title')
    Marca
@endsection

@section('menu_titulo')
    Marca
@endsection

@section('cardTitle')
    Marcas
@endsection

@section('cardContent')
    Detalhes da Marca
@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('marcas.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>

@endsection

@section('content')




                        <p><strong><h2>Marca : {{$marca->descricao}}</h2></strong></p><br>




@endsection