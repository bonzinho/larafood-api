@extends('adminlte::page')

@section('title', 'Criar nova categoria')

@section('content_header')
    <h1>Criar Nova Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('categories.store')}}" method="post" class="form">

                @csrf

                @include('admin.pages.categories._partials.form')

            </form>
        </div>
    </div>
@stop
