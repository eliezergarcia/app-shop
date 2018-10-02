@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/city-profile.jpg') }}');">
</div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                            <img alt="Circle Image" class="img-raised rounded-circle img-fluid" 
                                src="{{ $product->featured_image_url }}">
                            </img>
                        </div>
                        @if(session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}        
                            </div>
                        @endif
                        <div class="name">
                            <h3 class="title">
                                {{ $product->name }}
                            </h3>
                            <h6>
                                {{ $product->category->name }}
                            </h6>
                            <a class="btn btn-just-icon btn-link btn-dribbble" href="#pablo">
                                <i class="fa fa-dribbble">
                                </i>
                            </a>
                            <a class="btn btn-just-icon btn-link btn-twitter" href="#pablo">
                                <i class="fa fa-twitter">
                                </i>
                            </a>
                            <a class="btn btn-just-icon btn-link btn-pinterest" href="#pablo">
                                <i class="fa fa-pinterest">
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p>
                    {{ $product->long_description }}
                </p>
            </div>
            <br>
            <div class="text-center">
                <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                    <i class="material-icons">add</i> Añadir al carrito
                </button>
            </div>

            <div class="tab-content tab-space">
                <div class="tab-pane active text-center gallery" id="studio">
                    <div class="row">
                        <div class="col-md-3 ml-auto">
                            @foreach ($imagesLeft as $image)
                                <img class="rounded" src="{{ $image->url }}">
                                </img>
                            @endforeach
                        </div>
                        <div class="col-md-3 mr-auto">
                            @foreach ($imagesRight as $image)
                                <img class="rounded" src="{{ $image->url }}">
                                </img>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="modalAddToCartLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione la cantidad que desea agregar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" method="POST" action="{{ route('cartdetail.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="modal-body">
                    <input class="form-control" type="number" name="quantity" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@include('includes.footer')
@endsection
