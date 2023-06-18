@extends('layouts.app', ['activePage' => 'user', 'title' => 'Relator 1.0', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row justify-content-between">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">{{ __('Informações do Usuário') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
        
                                <div class="row justify-content-between">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">
                                                <i class="w3-xxlarge fa fa-user"></i>{{ __('Nome') }}
                                            </label>
                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>
            
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-user"></i>{{ __('Email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>
            
                                            @include('alerts.feedback', ['field' => 'E-mail'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pl-1">
                                        <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-role">
                                                <i class="w3-xxlarge fa fa-user"></i>{{ __('Função') }}
                                            </label>
                                            <input type="text" name="role" id="input-role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="{{ __('Função') }}" value="{{ old('role', auth()->user()->role) }}" required autofocus>
            
                                            @include('alerts.feedback', ['field' => 'role'])
                                        </div>
                                    </div>
                                </div>

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nome') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>
        
                                        @include('alerts.feedback', ['field' => 'E-mail'])
                                    </div>
                                    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Função') }}
                                        </label>
                                        <input type="text" name="role" id="input-role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="{{ __('Função') }}" value="{{ old('role', auth()->user()->role) }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'role'])
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Salvar') }}</button>
                                    </div>

                                </div>
                            </form>
                            <hr class="my-4" />
                            <form method="post" action="{{ route('profile.password') }}">
                                @csrf
                                @method('patch')
        
                                <h6 class="heading-small text-muted mb-4">{{ __('Senha') }}</h6>
        
                                @include('alerts.success', ['key' => 'password_status'])
                                @include('alerts.error_self_update', ['key' => 'not_allow_password'])
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-current-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Senha Atual') }}
                                        </label>
                                        <input type="password" name="old_password" id="input-current-password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'old_password'])
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Senha Nova') }}
                                        </label>
                                        <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Confirme a Senha Nova') }}
                                        </label>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                    </div>
        
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Alterar Senha') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection