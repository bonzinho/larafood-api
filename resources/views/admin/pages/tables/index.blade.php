@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('tables.index')}}">Mesas</a>
        </li>
    </ol>

    <h1>Mesas <a href="{{route('tables.create')}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('tables.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar por nome" class="form-control">
                <button class="ml-3 btn btn-dark" type="submit" value="{{$filters['filter'] ?? ''}}"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th width="250">Acções</th>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                        <tr>
                            <td>{{$table->name}}</td>
                            <td>{{$table->description}}</td>
                            <td>
                                <a href="{{route('tables.qrcode', $table->id)}}" class="btn btn-warning" target="_blank"><i class="fa fa-qrcode"></i></a>
                                <a href="{{route('tables.show', $table->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{route('tables.edit', $table->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($tables->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $tables->appends($filters)->links() !!}
                @else
                    {!! $tables->links() !!}
                @endif
            </div>
        @endif
    </div>
@stop
