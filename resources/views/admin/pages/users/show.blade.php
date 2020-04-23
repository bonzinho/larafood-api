@extends('adminlte::page')

@section('title', "Detalhes do utilizador {$user->name}")

@section('content_header')
    <h1>Detalhes do utilizador <strong>{{$user->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$user->name}}
                </li>
                <li>
                    <strong>Email: </strong> {{$user->email}}
                </li>
                <li>
                    <strong>Empresa: </strong> {{$user->tenant->name}}
                </li>
            </ul>
            <form action="{{route('users.destroy', $user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
@stop
