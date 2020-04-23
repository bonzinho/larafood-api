@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('tenants.index')}}">Empresas</a>
        </li>
    </ol>

    <h1>Tenants / Empresas</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('tenants.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar por nome" class="form-control">
                <button class="ml-3 btn btn-dark" type="submit" value="{{$filters['filter'] ?? ''}}"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>Nome</th>
                    <th>Logo</th>
                    <th>Plano</th>
                    <th width="250">Acções</th>
                </thead>
                <tbody>
                    @foreach($tenants as $tenant)
                        <tr>
                            <td>{{$tenant->name}}</td>
                            <td>
                                <img src="{{url('storage/' . $tenant->image)}}" alt="{{$tenant->name}}" style="max-width: 90px">

                            </td>
                            <td>{{$tenant->price}}</td>
                            <td>
                                <a href="{{route('tenants.show', $tenant->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="{{route('tenants.edit', $tenant->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($tenants->links()->count)
            <div class="card-footer">
                @if(isset($filters))
                    {!! $tenants->appends($filters)->links() !!}
                @else
                    {!! $tenants->links() !!}
                @endif
            </div>
        @endif
    </div>
@stop
