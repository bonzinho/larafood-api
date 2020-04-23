@extends('adminlte::page')

@section('title', 'Categorias disponíveois para o produto {$product->name}')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('products.index')}}">Products</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{route('products.categories', $product->id)}}">Categorias</a>
        </li>

    </ol>

    <h1>Categorias disponiveis para o produto {{$product->name}}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('product.categories.available', $product->id)}}" class="form form-inline" method="POST">
                @csrf
                <input type="text" value="{{$filters['filter'] ?? ''}}" name="filter" placeholder="Pesquisar por categoria" class="form-control">
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
                <form action="{{route('products.categories.attach', $product->id)}}" method="POST">
                    @csrf
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                <input type="checkbox" name="categories[]" value="{{$category->id}}">
                            </td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
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
