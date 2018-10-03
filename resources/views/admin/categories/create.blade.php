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
                Registrar nueva categoría
            </h2>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}">
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
                        <label class="control-label" for="image">
                            Imágen de la categoría
                        </label>
                        <input id="image" name="image" type="file">                            
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" placeholder="Descripción de la categoría" rows="5">{{ old('description') }}</textarea>
                </div>
                <button class="btn btn-primary">
                    Registrar categoría
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-default">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
