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
                Editar categoría seleccionado
            </h2>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
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
                                Nombre de la categoría
                            </label>
                            @endif
                            <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $category->name) }}">
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
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" placeholder="Descripción de la categoría" rows="5">{{ old('description', $category->description) }}</textarea>
                </div>
                <button class="btn btn-primary">
                    Guardar cambios
                </button>
                <a class="btn btn-default" href="{{ route('categories.index') }}">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>
@include('includes.footer');
@endsection
