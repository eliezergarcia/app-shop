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
                Listado de categorías
            </h2>
            <div class="team">
                <a class="btn btn-primary btn-round" href="{{ route('categories.create') }}">
                    Nueva categoría
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
                            <th class="text-right">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td class="text-center" width="5%">
                                {{ $category->id }}
                            </td>
                            <td width="15%">
                                {{ $category->name }}
                            </td>
                            <td>
                                {{ $category->description }}
                            </td>
                            <td class="td-actions text-right" width="15%">
                                <button class="btn btn-info btn-link btn-fab" rel="tooltip" title="Ver categoría" type="button">
                                    <i class="fa fa-info">
                                    </i>
                                </button>
                                <a class="btn btn-success btn-link btn-fab" href="{{ route('categories.edit', $category->id) }}" rel="tooltip" title="Editar categoría">
                                    <i class="fa fa-edit">
                                    </i>
                                </a>
                                <form name="delete-product" style="display: inline;" action="{{ route('categories.destroy', $category->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-link btn-fab" rel="tooltip" title="Eliminar categoría" type="submit"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="display: inline-flex;">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@include('includes.footer');
@endsection
