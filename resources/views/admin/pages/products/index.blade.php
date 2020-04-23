@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('products.index')}}">Produtos</a>
        </li>
    </ol>

    <h1>Produtos <a href="{{route('products.create')}}" class="ml-3 btn btn-dark"><i class="fa fa-plus"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('products.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar por nome" class="form-control">
                <button class="ml-3 btn btn-dark" type="submit" value="{{$filters['filter'] ?? ''}}"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>Nome</th>
                    <th>Foto</th>
                    <th>Preço</th>
                    <th width="250">Acções</th>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>
                                <img src="{{url('storage/' . $product->image)}}" alt="{{$product->name}}" style="max-width: 90px">

                            </td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{route('products.categories', $product->id)}}" class="btn btn-warning"><i class="fa fa-list"></i></a>
                                <a href="{{route('products.show', $product->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($products->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $products->appends($filters)->links() !!}
                @else
                    {!! $products->links() !!}
                @endif
            </div>
        @endif
    </div>
@stop
