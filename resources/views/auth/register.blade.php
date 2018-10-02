@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg7.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form action="{{ route('register') }}" class="form" method="POST">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">
                                Registro
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
                            Completa tus datos
                        </p>
                        <div class="card-body">
                            <div class="input-group form-group bmd-form-group{{ $errors->has('name') ? ' has-danger' : 'has-success' }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">
                                            face
                                        </i>
                                    </span>
                                </div>
                                @if ($errors->has('name'))
                                <label class="bmd-label-floating" for="name">
                                    {{ $errors->first('name') }}
                                </label>
                                @endif
                                <input class="form-control" id="name" name="name" placeholder="{{ $errors->has('name') ? '' : 'Nombre...' }}" type="text" value="{{ old('name') }}">
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
                            <div class="input-group form-group bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : 'has-success' }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">
                                            lock_outline
                                        </i>
                                    </span>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                <label class="bmd-label-floating" for="password_confirmation">
                                    {{ $errors->first('password_confirmation') }}
                                </label>
                                @endif
                                <input class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" placeholder="{{ $errors->has('password_confirmation') ? '' : 'Confirmar password...' }}" type="password">
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
                        </div>
                        <br>
                            <div class="footer text-center form-group">
                                <button class="btn btn-primary btn-link" type="submit">
                                    {{ __('Confirmar registro') }}
                                </button>
                            </div>
                        </br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</div>
@endsection
