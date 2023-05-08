@extends('layouts/app', ['activePage' => 'welcome', 'title' => 'Relator 1.0'])

@section('content')
    <div class="full-page section-image" data-color="black" data-image="{{asset('light-bootstrap/img/barroquinha.png')}}">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-8">
                        <img src="{{ asset('light-bootstrap/img/cbmba.png') }}" style="width:40%" class="center">
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