@extends('adminlte::page')

@section('title', 'Criar novo plano')

@section('content_header')

    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.details.index', $plan->url)}}" class="active">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.details.create', $plan->url)}}" class="active">{{$plan->name}}</a></li>
    </ol>

    <h1>Criar detalhe do plano {{$plan->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('plans.details.store', $plan->url)}}" method="post" class="form">

                @include('admin.pages.plans.details._partials._form')



            </form>
        </div>
    </div>
@stop
