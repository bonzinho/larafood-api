@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('plans.index')}}">Planos</a>
        </li>
    </ol>

    <h1>Planos <a href="{{route('plans.create')}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar por nome" class="form-control">
                <button class="ml-3 btn btn-dark" type="submit" value="{{$filters['filter'] ?? ''}}"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th width="250">Acções</th>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>{{$plan->name}}</td>
                            <td>{{$plan->price}} €</td>
                            <td>{{$plan->description}}</td>
                            <td>
                                <a href="{{route('plans.show', $plan->url)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{route('plans.edit', $plan->url)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="{{route('plans.details.index', $plan->url)}}" class="btn btn-warning"><i class="fa fa-list"></i></a>
                                <a href="{{route('plans.profiles', $plan->id)}}" class="btn btn-warning"><i class="fa fa-users"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($plans->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $plans->appends($filters)->links() !!}
                @else
                    {!! $plans->links() !!}
                @endif

            </div>
        @endif
    </div>
@stop
