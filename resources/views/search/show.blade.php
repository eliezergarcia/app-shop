@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

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
                            <img alt="Imágen de búsqueda" class="img-raised rounded-circle img-fluid" 
                                src="/img/search.png">
                            </img>
                        </div>
                        @if(session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}        
                            </div>
                        @endif
                        <div class="name">
                            <h3 class="title">
                                Resultados de búsqueda
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p>
                    Se encontraron {{ $products->count() }} resultados para el término {{ $query }}
                </p>
            </div>

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
    </div>
</div>
@include('includes.footer')
@endsection
