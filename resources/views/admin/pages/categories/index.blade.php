@extends('adminlte::page')

@section('title', 'Utilizadores')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('categories.index')}}">Categorias</a>
        </li>
    </ol>

    <h1>Categorias <a href="{{route('categories.create')}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('categories.search')}}" class="form form-inline" method="post">
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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <a href="{{route('categories.show', $category->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($categories->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $categories->appends($filters)->links() !!}
                @else
                    {!! $categories->links() !!}
                @endif
            </div>
        @endif
    </div>
@stop
