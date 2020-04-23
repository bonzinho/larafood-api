@extends('adminlte::page')

@section('title', 'Permissões do cargo {$role->name}')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('roles.index')}}">Cargos</a>
        </li>
    </ol>

    <h1>Permissões disponíveis para o cargo {{$role->name}}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('roles.permissions.available', $role->id)}}" class="form form-inline" method="POST">
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
                <form action="{{route('roles.permissions.attach', $role->id)}}" method="POST">
                    @csrf
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                            </td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->description}}</td>
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
