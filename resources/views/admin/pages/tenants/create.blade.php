@extends('adminlte::page')

@section('title', 'Criar nova empresa')

@section('content_header')
    <h1>Criar Nova Empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('tenants.store')}}" method="post" class="form" enctype="multipart/form-data">

                @csrf

                @include('admin.pages.tenants._partials.form')

            </form>
        </div>
    </div>
@stop
