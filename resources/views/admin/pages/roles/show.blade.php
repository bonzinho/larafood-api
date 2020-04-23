

@extends('adminlte::page')

@section('title', "Detalhes do cargo {$role->name}")

@section('content_header')
    <h1>Detalhes do perfil <strong>{{$role->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$role->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$role->description}}
                </li>
            </ul>
            <form action="{{route('roles.destroy', $role->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
@stop
