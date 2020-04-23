@extends('adminlte::page')

@section('title', 'Permissões do perfil {$profile->name}')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('profiles.index')}}">Perfis</a>
        </li>
    </ol>

    <h1>Permissões do perfil {{$profile->name}}
        <a href="{{route('profiles.permissions.available', $profile->id)}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a>
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
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->description}}</td>
                            <td>
                                <a href="{{route('profiles.permissions.detach', [$profile->id, $permission->id])}}" class="btn btn-warning"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($permissions->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $permissions->appends($filters)->links() !!}
                @else
                    {!! $permissions->links() !!}
                @endif

            </div>
        @endif
    </div>
@stop
