@extends('adminlte::page')

@section('title', 'Editar o Utilizador {$table->name}')

@section('content_header')
    <h1>Editar mesa {{$table->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('tables.update', $table->id)}}" method="post" class="form">

                @csrf
                @method('PUT')

                @include('admin.pages.tables._partials.form')


            </form>
        </div>
    </div>
@stop
