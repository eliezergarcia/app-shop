@extends('layouts.app')

@section('title', 'App Shop | Dashboard')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title text-center">
                Dashboard
            </h2>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito de compras
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizados
                        </a>
                    </li>
                </ul>
            </div>    
            
            <br>
            @if(session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}        
                </div>
            @endif

            <hr>
            <br>
            <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.</p>
            <br>
            
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">
                                
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Precio
                            </th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(auth()->user()->cart->details as $detail)
                        <tr>
                            <td class="text-center" width="5%">
                                <img src="{{ $detail->product->featured_image_url }}" width="50" height="50">
                            </td>
                            <td width="15%">
                                <a href="{{ route('products.show', $detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                            </td>
                            <td width="7%">
                                $ {{ $detail->product->price }}
                            </td>
                            <td width="7%">
                                {{ $detail->quantity }}
                            </td>
                            <td width="7%">
                                $ {{ $detail->product->price * $detail->quantity }}
                            </td>
                            <td class="td-actions" width="7%">
                                <a class="btn btn-info btn-link btn-fab" target="_blank" rel="tooltip" title="Ver producto" href="{{ route('products.show', $detail->product->id) }}">
                                    <i class="fa fa-info">
                                    </i>
                                </a>
                                <form name="delete-product" style="display: inline;" action="{{ route('cartdetail.destroy', $detail->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-link btn-fab" rel="tooltip" title="Eliminar producto" type="submit"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p><h4><b>Importe a pagar: </b> $ {{ auth()->user()->cart->total }}</h4></p>
            </div>

            <div class="row justify-content-center">
                <form method="POST" action="{{ route('cart.update') }}">
                    {{ csrf_field() }}
                    <button class="btn btn-primary btn-round">
                        <i class="material-icons">done</i> Relizar pedido
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
