@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg7.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form action="{{ route('login') }}" class="form" method="POST">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">
                                Inicio de sesión
                            </h4>
                            {{--
                            <div class="social-line">
                                <a class="btn btn-just-icon btn-link" href="#pablo">
                                    <i class="fa fa-facebook-square">
                                    </i>
                                </a>
                                <a class="btn btn-just-icon btn-link" href="#pablo">
                                    <i class="fa fa-twitter">
                                    </i>
                                </a>
                                <a class="btn btn-just-icon btn-link" href="#pablo">
                                    <i class="fa fa-google-plus">
                                    </i>
                                </a>
                            </div>
                            --}}
                        </div>
                        <p class="description text-center">
                            Ingresa tus datos
                        </p>
                        <div class="card-body">
                            <div class="input-group form-group bmd-form-group{{ $errors->has('email') ? ' has-danger' : 'has-success' }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">
                                            mail
                                        </i>
                                    </span>
                                </div>
                                @if ($errors->has('email'))
                                <label class="bmd-label-floating" for="email">
                                    {{ $errors->first('email') }}
                                </label>
                                @endif
                                <input class="form-control" id="email" name="email" placeholder="{{ $errors->has('email') ? '' : 'Email...' }}" type="text" value="{{ old('email') }}">
                                </input>
                                @if ($errors->has('email'))
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
                            <div class="input-group form-group bmd-form-group{{ $errors->has('password') ? ' has-danger' : 'has-success' }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">
                                            lock_outline
                                        </i>
                                    </span>
                                </div>
                                @if ($errors->has('password'))
                                <label class="bmd-label-floating" for="password">
                                    {{ $errors->first('password') }}
                                </label>
                                @endif
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="{{ $errors->has('password') ? '' : 'Password...' }}" type="password">
                                </input>
                                @if ($errors->has('password'))
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
                            <div class="form-group form-check">
                                <label class="form-check-label" for="remember">
                                    <input checked="" class="form-check-input" id="remember" name="remember" value="">
                                        Recordar sesión
                                    </input>
                                    <span class="form-check-sign">
                                        <span class="check">
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="footer text-center form-group ">
                            <button class="btn btn-primary btn-link" type="submit">
                                {{ __('Ingresar') }}
                            </button>
                            {{--
                            <a class="btn btn-primary btn-link btn-wd btn-lg" href="#pablo">
                                Ingresar
                            </a>
                            --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</div>
@endsection
