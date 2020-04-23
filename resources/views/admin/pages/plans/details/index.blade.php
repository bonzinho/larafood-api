@extends('adminlte::page')

@section('title', 'Editar detalhe {$detail->name} do plano {$plan->name}')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.details.index', $plan->url)}}" class="active">Detalhes</a></li>
    </ol>
    <h1>Detalhes do plano {{$plan->name}} <a href="{{route('plans.details.create', $plan->url)}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                <th>Nome</th>
                <th width="150">Acções</th>
                </thead>
                <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>
                        <td>
                            <a href="{{route('plans.details.show', [$plan->url, $detail->id])}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                            <a href="{{route('plans.details.edit', [$plan->url, $detail->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if($details->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $detail->links() !!}
                @else
                    {!! $detail->links() !!}
                @endif

            </div>
        @endif
    </div>
@stop
