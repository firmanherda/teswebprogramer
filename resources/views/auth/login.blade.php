
@extends('layouts.auth')
@section('content')

    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center h-custom-2 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                        <div class="col-6 mx-auto">
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <h2 class="text-center mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag me-2" viewBox="0 0 16 16" style="color: red">
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>
                                    SIMS Web App
                                </h2>

                                <h2 class="text-center mb-6">Masuk atau buat akun <br>untuk memulai</h2>
                                @error('error')
                                <div class="form text-center" style="font-size: 12px; color: red">{{ $message }}</div>
                                @enderror
                                <div class="form mb-4 w-100">
                                    <input type="email" name="email" class="form-control form-control-lg w-100" placeholder="masukkan email anda"/>
                                    @error('email')
                                    <div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form mb-4 w-100">
                                    <input type="password" name="password" class="form-control form-control-lg w-100" placeholder="masukkan password anda"/>
                                    @error('password')
                                    <div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form mb-4 w-100">
                                    <button class="form-control btn btn-danger" style="background-color: red" type="submit">Masuk</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{asset('assets/img/login.png')}}"
                         alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>


@endsection
