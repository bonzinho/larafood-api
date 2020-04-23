@extends('adminlte::page')

@section('title', 'Criar nova mesa')

@section('content_header')
    <h1>Criar Nova Mesa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('tables.store')}}" method="post" class="form">

                @csrf

                @include('admin.pages.tables._partials.form')

            </form>
        </div>
    </div>
@stop
