@extends('adminlte::page')

@section('title', 'Criar novo plano')

@section('content_header')
    <h1>Criar nova permissão</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('permissions.store')}}" method="post" class="form">
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@stop
