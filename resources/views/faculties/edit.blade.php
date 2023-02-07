@extends('layouts.master')

@section('head-tag')
    <title>ویرایش نمودن پوهنځی جدید</title>
@endsection

@section('content')
    <section>

        <div class="d-flex mx-auto my-5">
            <div class="col-3 mx-auto mb-3">
                <h5 class="text-center pt-5 pb-3">ویرایش نمودن پوهنځی جدید</h5>
                <hr>
                <form action="{{ route('faculties.update', $faculty->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="form-label">نام پوهنځی</label>
                        <input type="text" name="name" class="form-control mb-3" placeholder="نام پوهنځی"
                            value="{{ old('name', $faculty->name) }}" autofocus required>
                        @error('name')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">ویرایش<i class="fa fa-edit mx-1"></i></button>
                    <a href="{{ route('faculties.index') }}" class="btn btn-outline-secondary"> <i
                            class="fa fa-arrow-alt-circle-right mx-1"></i> بازگشت</a>
                </form>
            </div>

            <div class="col-6 mt-5" style="margin: 0 5rem">
                <img src="{{ asset('assets/images/IMG_6250.JPG') }}" class="img-thumbnail w-100">
            </div>
        </div>
    </section>
@endsection
