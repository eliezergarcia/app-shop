@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">
                Editar producto seleccionado
            </h2>
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                {!! method_field('PUT') !!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group{{ $errors->has('name') ? ' has-danger' : 'has-success' }}">
                            @if ($errors->has('name'))
                            <label class="bmd-label-floating" for="name">
                                {{ $errors->first('name') }}
                            </label>
                            @else
                            <label class="bmd-label-floating" for="name">
                                Nombre del producto
                            </label>
                            @endif
                            <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $product->name) }}">
                            </input>
                            @if ($errors->has('name'))
                            <span class="form-control-feedback">
                                <i class="material-icons">
                                    clear
                                </i>
                            </span>
                            @else
                            <span class="form-control-feedback">
                                <i class="material-icons">
                                    done
                                </i>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group{{ $errors->has('price') ? ' has-danger' : 'has-success' }}">
                            @if ($errors->has('price'))
                            <label class="bmd-label-floating" for="price">
                                {{ $errors->first('price') }}
                            </label>
                            @else
                            <label class="bmd-label-floating" for="price">
                                Precio del producto
                            </label>
                            @endif
                            <input class="form-control" id="price" name="price" type="number" value="{{ old('price', $product->price) }}">
                            </input>
                            @if ($errors->has('price'))
                            <span class="form-control-feedback">
                                <i class="material-icons">
                                    clear
                                </i>
                            </span>
                            @else
                            <span class="form-control-feedback">
                                <i class="material-icons">
                                    done
                                </i>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group bmd-form-group{{ $errors->has('description') ? ' has-danger' : 'has-success' }}">
                    @if ($errors->has('description'))
                    <label class="bmd-label-floating" for="description">
                        {{ $errors->first('description') }}
                    </label>
                    @else
                    <label class="bmd-label-floating" for="description">
                        Descripción corta
                    </label>
                    @endif
                    <input class="form-control" id="description" name="description" type="text" value="{{ old('description', $product->description) }}">
                    </input>
                    @if ($errors->has('description'))
                    <span class="form-control-feedback">
                        <i class="material-icons">
                            clear
                        </i>
                    </span>
                    @else
                    <span class="form-control-feedback">
                        <i class="material-icons">
                            done
                        </i>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="long_description" placeholder="Descripción extensa del producto" rows="5">{{ old('long_description', $product->long_description) }}</textarea>
                </div>
                <button class="btn btn-primary">
                    Guardar cambios
                </button>
                <a class="btn btn-default" href="{{ url('/admin/products') }}">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>
@include('includes.footer');
@endsection
