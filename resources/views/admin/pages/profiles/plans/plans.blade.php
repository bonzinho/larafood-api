@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('profiles.index')}}">Perfis</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('profiles.plans', $profile->id)}}" class="active">Planos</a>
        </li>
    </ol>

    <h1>Planos do Perfil {{$profile->name}}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <th>Nome</th>
                <th width="200">Acções</th>
                </thead>
                <tbody>
                @foreach($plans as $plan)
                    <tr>
                        <td>{{$plan->name}}</td>
                        <td>
                            <a href="{{route('plans.profile.detach', [$plan->id, $profile->id])}}" class="btn btn-warning"><i class="fa fa-trash"></i></a>
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
