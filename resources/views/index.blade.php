@extends('layouts.master')

@section('head-tag')
    <title>صفحه اصلی</title>
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
            <div class="col-10 col-lg-2 d-md-flex flex-md-column my-auto" id="sidebar">

                <a href="{{ route('researchers.index') }}" class="btn btn-outline-dark mb-2" id="main-page-links"><i
                        class="fa fa-user-graduate mx-1"></i>لیست تحقیق کننده گان</a>

                <a href="{{ route('teachers.index') }}" class="btn btn-outline-dark mb-2" id="main-page-links"><i
                        class="fa fa-user-tie mx-1"></i>لیست استادان</a>

                <a href="{{ route('classes.index') }}" class="btn btn-outline-dark mb-2" id="main-page-links"><i
                        class="fa fa-address-book fa mx-1"></i>لیست صنف ها</a>

                <a href="{{ route('faculties.index') }}" class="btn btn-outline-dark mb-2" id="main-page-links"><i
                        class="fa fa-home mx-1"></i>لیست
                    پوهنځی ها</a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger mb-2"><i
                            class="fa fa-arrow-alt-circle-right mx-1"></i>خروج</button>
                </form>
            </div>

            <div class="col-log-7 d-none d-lg-block">
                <img src="{{ asset('assets/images/IMG_6342.JPG') }}" class="img-thumbnail"
                    style="width: 100%; height: 70vh; object-fit: cover">
            </div>
        </div>
    </section>
@endsection
