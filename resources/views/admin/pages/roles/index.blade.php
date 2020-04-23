@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('roles.index')}}">cargos</a>
        </li>
    </ol>

    <h1>Cargos <a href="{{route('roles.create')}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('roles.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar por nome" class="form-control">
                <button class="ml-3 btn btn-dark" type="submit" value="{{$filters['filter'] ?? ''}}"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>Nome</th>
                    <th width="200">Acções</th>
                    <th>Descrição</th>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                <a href="{{route('roles.show', $role->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{route('roles.edit', $role->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="{{route('roles.permissions', $role->id)}}" class="btn btn-warning"><i class="fa fa-user-lock"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($roles->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $roles->appends($filters)->links() !!}
                @else
                    {!! $roles->links() !!}
                @endif

            </div>
        @endif
    </div>
@stop
