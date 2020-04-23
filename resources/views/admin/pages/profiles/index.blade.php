@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('profiles.index')}}">Perfis</a>
        </li>
    </ol>

    <h1>Perfis <a href="{{route('profiles.create')}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('profiles.search')}}" class="form form-inline" method="post">
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
                    @foreach($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>{{$profile->description}}</td>
                            <td>
                                <a href="{{route('profiles.show', $profile->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="{{route('profiles.permissions', $profile->id)}}" class="btn btn-warning"><i class="fa fa-user-lock"></i></a>
                                <a href="{{route('profiles.plans', $profile->id)}}" class="btn btn-warning"><i class="fa fa-plane"></i></a>
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
