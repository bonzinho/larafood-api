@extends('adminlte::page')

@section('title', 'Criar novo cargo')

@section('content_header')
    <h1>Criar novo cargo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('roles.store')}}" method="post" class="form">
                @include('admin.pages.roles._partials.form')
            </form>
        </div>
    </div>
@stop
