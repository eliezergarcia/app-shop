@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'landing-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">
                    Bienvenido a App Shop
                </h1>
                <h4>
                    Realiza pedidos en línea y te contactaremos para coordinar la entrega.
                </h4>
                <br>
                    <a class="btn btn-danger btn-raised btn-lg" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">
                        <i class="fa fa-play">
                        </i>
                        ¿Cómo funciona?
                    </a>
                </br>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title">
                        ¿Por qué App Shop?
                    </h2>
                    <h5 class="description">
                        Puedes revisar nuestra relación completa de productos, comparar precios y realizar tus pedidos cuando estés seguro.
                    </h5>
                </div>
            </div>
            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">
                                    chat
                                </i>
                            </div>
                            <h4 class="info-title">
                                Atendemos tus dudas
                            </h4>
                            <p>
                                Atendemos rápidamente cualquier consulta que tengas vía chat. No estás solo, sino que siempre estamos atentos a tus inquietudes.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">
                                    verified_user
                                </i>
                            </div>
                            <h4 class="info-title">
                                Pago seguro
                            </h4>
                            <p>
                                Todo pedido que realices será confirmado a través de una llamada. Si no confías en los pagos en línea puedes pagar contra entrega el valor acordado.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">
                                    fingerprint
                                </i>
                            </div>
                            <h4 class="info-title">
                                Información privada
                            </h4>
                            <p>
                                Los pedidos que realices sólo los conoceras tú a través de tu panel de usuario. Nadie más tiene acceso a esta información.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section text-center">
            <h2 class="title">
                Productos disponibles
            </h2>
            <div class="team">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="team-player">
                            <div class="card card-plain">
                                <div class="col-md-6 ml-auto mr-auto">
                                    <img alt="Thumbnail Image" class="img-raised rounded-circle img-fluid" src="{{ $product->featured_image_url }}" width="250" height="250">
                                    </img>
                                </div>
                                <h4 class="card-title">
                                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    <br>
                                        <small class="card-description text-muted">
                                            {{ is_null($product->category->name) ? '' : $product->category->name }}
                                        </small>
                                    </br>
                                </h4>
                                <div class="card-body">
                                    <p class="card-description">
                                        {{ $product->description }}
                                    </p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <div class="section section-contacts">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">
                        ¿Aún no te has registrado?
                    </h2>
                    <h4 class="text-center description">
                        Regístrate ingresando tus datos básicos, y podrás realizar tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas, con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.
                    </h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">
                                        Nombre
                                    </label>
                                    <input class="form-control" type="email">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">
                                        Correo electrónico
                                    </label>
                                    <input class="form-control" type="email">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating" for="exampleMessage">
                                Tu mensaje
                            </label>
                            <textarea class="form-control" id="exampleMessage" rows="4" type="email">
                            </textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto text-center">
                                <button class="btn btn-primary btn-raised">
                                    Enviar mensaje
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
