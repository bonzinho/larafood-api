@extends('adminlte::page')

@section('title', 'Categorias do produto {$product->name}')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('products.index')}}">Produtos</a>
        </li>

        <li class="breadcrumb-item active">
            <a href="{{route('products.categories', $product->id)}}">Categorias</a>
        </li>
    </ol>

    <h1>Categorias do produto {{$product->name}}
        <a href="{{route('product.categories.available', $product->id)}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a>
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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <a href="{{route('products.categories.detach', [$product->id, $category->id])}}" class="btn btn-warning"><i class="fa fa-trash"></i></a>
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
