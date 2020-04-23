@extends('adminlte::page')

@section('title', 'Utilizadores')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('users.index')}}">Utilizadores</a>
        </li>
    </ol>

    <h1>utilizadores <a href="{{route('users.create')}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('users.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar por nome" class="form-control">
                <button class="ml-3 btn btn-dark" type="submit" value="{{$filters['filter'] ?? ''}}"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>Nome</th>
                    <th>Email</th>
                    <th width="250">Acções</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('users.show', $user->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('users.roles', $user->id) }}" class="btn btn-info" title="Cargos"><i class="fas fa-address-card"></i> Cargos
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($users->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $users->appends($filters)->links() !!}
                @else
                    {!! $users->links() !!}
                @endif

            </div>
        @endif
    </div>
@stop
