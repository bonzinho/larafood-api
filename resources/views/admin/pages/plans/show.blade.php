@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do plano <strong>{{$plan->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$plan->name}}
                </li>
                <li>
                    <strong>URL: </strong> {{$plan->url}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$plan->description}}
                </li>
                <li>
                    <strong>Price: </strong> {{number_format($plan->price, 2, '.', ',')}} €
                </li>
            </ul>
            <form action="{{route('plans.destroy', $plan->url)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
@stop
