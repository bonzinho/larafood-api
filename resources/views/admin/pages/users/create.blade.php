@extends('adminlte::page')

@section('title', 'Criar novo utilizador')

@section('content_header')
    <h1>Criar novo usero</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('users.store')}}" method="post" class="form">

                @csrf

                @include('admin.pages.users._partials.form')

            </form>
        </div>
    </div>
@stop
