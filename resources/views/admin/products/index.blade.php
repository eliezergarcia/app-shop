@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
</div>
<div class="main main-raised">
    <div class="container-fluid">
        <div class="section text-center">
            <h2 class="title">
                Lista de productos
            </h2>
            <div class="team">
                <a class="btn btn-primary btn-round" href="{{ url('admin/products/create') }}">
                    Nuevo producto
                </a>
                <br>
                </br>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Descripción
                            </th>
                            <th>
                                Categoría
                            </th>
                            <th class="text-right">
                                Precio
                            </th>
                            <th class="text-right">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="text-center" width="5%">
                                {{ $product->id }}
                            </td>
                            <td width="15%">
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $product->description }}
                            </td>
                            <td width="7%">
                                {{ $product->category ? $product->category->name : 'General' }}
                            </td>
                            <td class="text-right" width="7%">
                                $ {{ $product->price }}
                            </td>
                            <td class="td-actions text-right" width="15%">
                                <button class="btn btn-info btn-link btn-fab" rel="tooltip" title="Ver producto" type="button">
                                    <i class="fa fa-info">
                                    </i>
                                </button>
                                <a class="btn btn-success btn-link btn-fab" href="{{ route('products.edit', $product->id) }}" rel="tooltip" title="Editar producto">
                                    <i class="fa fa-edit">
                                    </i>
                                </a>
                                <a class="btn btn-warning btn-link btn-fab" href="{{ route('products.images.index', $product->id) }}" rel="tooltip" title="Imágenes del producto">
                                    <i class="fa fa-image">
                                    </i>
                                </a>
                                <form name="delete-product" style="display: inline;" action="{{ route('products.destroy', $product->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-link btn-fab" rel="tooltip" title="Eliminar producto" type="submit"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="display: inline-flex;">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@include('includes.footer');
@endsection
