@extends('adminlte::page')

@section('title', "Editar o detalhe {$detail->name} do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.details.index', $plan->url)}}">detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.details.edit', [$plan->url, $detail->id])}}" class="active">editar</a></li>
    </ol>
    <h1>Editar Detalhe do plano {{$plan->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('plans.details.update', [$plan->url, $detail->id])}}" method="post" class="form">

                @csrf
                @method('PUT')

                @include('admin.pages.plans.details._partials._form')


            </form>
        </div>
    </div>
@stop
