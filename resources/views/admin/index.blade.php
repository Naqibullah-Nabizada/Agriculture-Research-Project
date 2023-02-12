@extends('layouts.master')

@section('head-tag')
    <title>صفحه ورود</title>
@endsection

@section('content')
    <section id="main-page">
        <header id="main-page-header">
            <div>
                <h5 class="col-12 mx-auto text-center mt-3">د کابل پوهنتون ریاست</h5>
                <h5 class="col-12 mx-auto text-center"> کرنې پوهنځي </h5>
                <h5 class="col-12 mx-auto text-center"> د څیړنیز فارم آمریت</h5>
                <h5 class="col-12 mx-auto text-center"> د زده کړیالانو د څیړنو د ثبت سیستم </h5>
            </div>
        </header>
        <hr>

        <div class="d-flex justify-content-around">
            <div class="col-10 col-lg-3 d-md-flex flex-md-column my-auto" id="sidebar">

                <h5 class="text-center mb-3">صفحه ورود <i class="fa fa-user-alt mx-1"></i></h5>
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <input type="email" name="email" class="form-control mb-3" placeholder="ایمیل">
                    <input type="password" name="password" class="form-control mb-3" placeholder="رمز عبور">
                    <input type="submit" value="ورود" class="btn btn-primary">
                </form>
            </div>

            <div class="col-log-7 d-none d-lg-block">
                <img src="{{ asset('assets/images/IMG_6342.JPG') }}" class="img-thumbnail"
                    style="width: 100%; height: 70vh; object-fit: cover">
            </div>
        </div>
    </section>
@endsection
