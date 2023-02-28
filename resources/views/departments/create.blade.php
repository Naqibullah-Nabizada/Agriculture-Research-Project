@extends('layouts.master')

@section('head-tag')
    <title>اضافه نمودن دیپارتمنت جدید</title>
@endsection

@section('content')
    <section>

        <div class="d-flex mx-auto my-5">
            <div class="col-3 mx-auto mb-3">
                <h5 class="text-center pt-5 pb-3">اضافه نمودن دیپارتمنت جدید</h5>
                <hr>
                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf
                    <div>
                        <label class="form-label">څانګه</label>
                        <input type="text" name="name" class="form-control mb-3 @error('name') is-invalid @enderror"
                            placeholder="څانګه" autofocus required>
                        @error('name')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">پوهنځی</label>
                        <select name="faculty_id" class="form-control mb-2">
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="form-label">د زده کړې حالت</label>
                        <select name="shift" class="form-control mb-2">
                            <option value="0">روزانه</option>
                            <option value="1">شبانه</option>
                        </select>
                    </div>

                    <div>
                        <label class="form-label">د زده کړې درجه</label>
                        <select name="education_degree" class="form-control mb-2">
                            <option value="0">لیسانس</option>
                            <option value="0">ماستری</option>
                            <option value="0">دکتورا</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-outline-success my-2">اضافه<i
                            class="fa fa-plus mx-1"></i></button>
                    <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary"><i
                            class="fa fa-arrow-circle-right mx-1"></i> بازگشت</a>
                </form>
            </div>

            <div class="col-6 mt-5" style="margin: 0 5rem">
                <img src="{{ asset('assets/images/IMG_6250.JPG') }}" class="img-thumbnail w-100">
            </div>
        </div>
    </section>
@endsection
