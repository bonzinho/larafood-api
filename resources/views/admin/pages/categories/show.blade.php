@extends('adminlte::page')

@section('title', "Detalhes da categoria {$category->name}")

@section('content_header')
    <h1>Detalhes da categoria <strong>{{$category->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$category->name}}
                </li>
                <li>
                    <strong>Url: </strong> {{$category->url}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$category->description}}
                </li>

            </ul>
            <form action="{{route('categories.destroy', $category->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
@stop
