@extends('adminlte::page')

@section('title', 'Perfis disponíveis para o plano {$plan->name}')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('profiles.index')}}">Planos</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{route('plans.profiles', $plan->id)}}">Perfis</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{route('plans.profiles.available', $plan->id)}}" class="active">Disponíveis</a>
        </li>
    </ol>

    <h1>Perfis disponíveis para o plano{{$plan->name}}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.profiles.available', $plan->id)}}" class="form form-inline" method="POST">
                @csrf
                <input type="text" value="{{$filters['filter'] ?? ''}}" name="filter" placeholder="Pesquisar por nome da permissão" class="form-control">
                <button class="ml-3 btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                </thead>
                <tbody>
                <form action="{{route('plans.profiles.attach', $plan->id)}}" method="POST">
                    @csrf
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                <input type="checkbox" name="profiles[]" value="{{$profile->id}}">
                            </td>
                            <td>{{$profile->name}}</td>
                            <td>{{$profile->description}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            @include('admin.includes.alerts')
                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>
                </form>
                </tbody>
            </table>
        </div>
        @if($profiles->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $profiles->appends($filters)->links() !!}
                @else
                    {!! $profiles->links() !!}
                @endif

            </div>
        @endif
    </div>
@stop
