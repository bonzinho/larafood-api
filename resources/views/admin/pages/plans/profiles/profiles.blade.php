@extends('adminlte::page')

@section('title', 'Perfis do Plano {$plan->name}')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('plans.index')}}">Planos</a>
        </li>

        <li class="breadcrumb-item active">
            <a href="{{route('plans.profiles', $plan->id)}}">Perfis</a>
        </li>
    </ol>

    <h1>Perfis do plano {{$plan->name}}
        <a href="{{route('plans.profiles.available', $plan->id)}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th width="200">Acções</th>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>{{$profile->description}}</td>
                            <td>
                                <a href="{{route('plans.profiles.detach', [$plan->id, $profile->id])}}" class="btn btn-warning"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
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
