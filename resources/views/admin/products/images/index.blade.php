@extends('layouts.app')

@section('title', 'Imágenes de productos')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
</div>
<div class="main main-raised">
    <div class="container-fluid">
        <div class="section text-center">
            <h2 class="title">
                Imágenes del producto "{{ $product->name }}"
            </h2>
            <div class="team">
            	<form method="POST" action="" enctype="multipart/form-data" style="display: inline;"> 
            		{{ csrf_field() }}
            		<input type="file" name="photo" required>
	                <button class="btn btn-primary btn-round" type="submit">
	                    Subir nueva imágen
	                </button>
            	</form>
                <a class="btn btn-default btn-round" href="{{ url('admin/products') }}">
                    Listado de productos
                </a>

                <hr>

                <div class="row justify-content-center">
	                @foreach ($images as $image)
	                	<div class="col-md-4">
			                <div class="card">
							  	<div class="card-body">
							  		<div class="row justify-content-center">
							    		<img src="{{ $image->url }}" width="250" height="250">
							  		</div>
							    	<br>
							    	<form method="POST" action="">
							    		{{ csrf_field() }}
							    		{{ method_field('DELETE') }}
							    		<input type="hidden" name="image_id" value="{{ $image->id }}">
							    		<button class="btn btn-danger btn-round">Eliminar</button>
							    		@if($image->featured)
											<button type="button" class="btn btn-info btn-round btn-fab" rel="tooltip" title="Imágen destacada actualmente">
								    			<i class="material-icons">favorite</i>
								    		</button>
							    		@else
								    		<a class="btn btn-primary btn-round btn-fab" href="{{ route('products.images.select', ['id' => $product->id, 'image' => $image->id]) }}">
								    			<i class="material-icons">favorite</i>
								    		</a>
							    		@endif
							    	</form>
							  	</div>
							</div>
	                	</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer');
@endsection
