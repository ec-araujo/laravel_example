@extends('layouts.app', ['activePage' => 'register', 'title' => 'Relator 1.0'])

@section('content')
    <div class="full-page register-page section-image" data-color="black" data-image="{{ asset('light-bootstrap/img/barroquinha.png') }}">
        <div class="content">
            <div class="container">
                <div class="card card-register card-plain text-center">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <img src="{{ asset('light-bootstrap/img/cbmba.png') }}" style="width:80%" class="center">
                                <p>
                                <h4 style="text-align:center; color:white;">CORPO DE BOMBEIROS </h4><p>
                                    <h4 style="text-align:center; color:white;">MILITAR DA BAHIA</h4>
                            </div>
                            <div class="col-md-4 mr-auto">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="card card-plain">
                                        <div class="content">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Nome') }}" value="{{ old('name') }}" required autofocus>
                                            </div>

                                            <div class="form-group">   {{-- is-invalid make border red --}}
                                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                    <select name="role" id="role" class="form-control" placeholder="{{ __('Role') }}" value="{{ old('role') }}" required>
                                                    <option value="">Selecione um tipo</option>
                                                    <option value="Master">Master</option>
                                                    <option value="DMT">DMT</option>
                                                    <option value="COBM">COBM</option>
                                                    <option value="COBMI">COBMI</option>
                                                    <option value="SPO/GBM">1ºGBM/SPO</option>
                                                    <option value="SPO/GBM">1ºGBM/OPE/CMD</option>
                                                    </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="num_funcional" id="num_funcional" class="form-control" placeholder="{{ __('Num_funcional') }}" value="{{ old('num_funcional') }}" required>
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="Senha" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" placeholder="Confirme a Senha" class="form-control" required autofocus>
                                            </div>

                                            <div class="footer text-center">
                                                <button type="submit" class="btn btn-fill btn-neutral btn-wd">{{ __('Criar Conta') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-warning alert-dismissible fade show" >
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush