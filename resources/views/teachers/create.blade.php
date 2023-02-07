@extends('layouts.master')

@section('head-tag')
    <title>اضافه نمودن استاد جدید</title>
    <link rel="stylesheet" href="{{ asset('assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <section>
        <div>
            <h5 class="text-center pt-2">اضافه نمودن استاد جدید <i class="fa fa-user mx-2"></i></h5>
            <hr>
            <form action="{{ route('teachers.store') }}" method="POST" class="employees-form" id="researcher-form"
                enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-6 col-lg-4 my-1">
                    <label class="form-label">نام: </label>
                    <input type="text" name="firstname"
                        class="form-control mb-2 @error('firstname') is-invalid @enderror" placeholder="نام"
                        value="{{ old('firstname') }}" autofocus required>
                    @error('firstname')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12 col-md-6 col-lg-4 my-1">
                    <label class="form-label">تخلص: </label>
                    <input type="text" name="lastname" class="form-control mb-2 @error('lastname') is-invalid @enderror"
                        placeholder="تخلص" value="{{ old('lastname') }}" required>
                    @error('lastname')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12 col-md-6 col-lg-4 my-1">
                    <label class="form-label">نام پدر: </label>
                    <input type="text" name="father_name"
                        class="form-control mb-2 @error('father_name') is-invalid @enderror" placeholder="نام پدر"
                        value="{{ old('father_name') }}" required>
                    @error('father_name')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="col-12 col-md-6 col-lg-4 my-1">
                    <label class="form-label">پوهنځی</label>
                    <select name="faculty_id" class="form-control mb-2" id="faculty">
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}" data-url="{{ route('getDepartment', $faculty->id) }}">
                                {{ $faculty->name }}</option>
                        @endforeach
                    </select>
                    @error('faculty_id')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12 col-md-6 col-lg-4 my-1">
                    <label class="form-label">دیپارتمنت</label>
                    <select name="department_id" class="form-control mb-2" id="department">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">
                            {{ $department->name }}</option>
                    @endforeach
                    </select>
                    @error('department_id')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mx-auto my-2">
                    <button type="submit" class="btn btn-outline-success">اضافه<i
                            class="fa fa-user-plus mx-1"></i></button>
                    <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary"><i
                            class="fa fa-arrow-alt-circle-right mx-1"></i>بازگشت</a>
                </div>

            </form>
        </div>

    </section>
@endsection
