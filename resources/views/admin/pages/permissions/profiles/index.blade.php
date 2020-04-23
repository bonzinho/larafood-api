@extends('adminlte::page')

@section('title', "Perfis da permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('permissions.index')}}">Permissões</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('permissions.profiles', $permission->id)}}">Perfis</a>
        </li>
    </ol>

    <h1>Perfis da permissão {{$permission->name}}</h1>

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
                @foreach($profiles as $profile)
                    <tr>
                        <td>{{$profile->name}}</td>
                        <td>
                            <a href="{{route('profiles.permissions.detach', [$profile->id, $permission->id])}}" class="btn btn-warning"><i class="fa fa-trash"></i></a>
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
