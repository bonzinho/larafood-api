@extends('adminlte::page')

@section('title', "Detalhes da mesa {$table->name}")

@section('content_header')
    <h1>Detalhes da mesa <strong>{{$table->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$table->name}}
                </li>
                <li>
                    <strong>Url: </strong> {{$table->url}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$table->description}}
                </li>

            </ul>
            <form action="{{route('tables.destroy', $table->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
@stop
