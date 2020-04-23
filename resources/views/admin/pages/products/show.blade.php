@extends('adminlte::page')

@section('title', "Detalhes do produto {$product->name}")

@section('content_header')
    <h1>Detalhes do produto <strong>{{$product->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <img src="{{url('storage/' . $product->image)}}" alt="{{$product->name}}" style="max-width: 90px">
                </li>
                <li>
                    <strong>Nome: </strong> {{$product->name}}
                </li>

                <li>
                    <strong>Flag: </strong> {{$product->flag}}
                </li>
                <li>
                    <strong>Url: </strong> {{$product->price}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$product->description}}
                </li>

            </ul>
            <form action="{{route('products.destroy', $product->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
@stop
