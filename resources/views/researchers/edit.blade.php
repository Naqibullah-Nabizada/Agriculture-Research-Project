@extends('layouts.master')

@section('head-tag')
    <title>ویرایش تحقیق کننده</title>
@endsection

@section('content')
    <section>

        <div class="d-flex mx-auto">

            <div>

                <h5 class="text-center pt-3">ویرایش تحقیق کننده</h5>
                <hr>
                <form action="{{ route('researchers.update', $researcher->id) }}" method="POST"
                    class="d-flex flex-wrap col-11 mx-auto" id="researcher-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-4">
                        <label class="form-label">نوم</label>
                        <input type="text" name="firstname"
                            class="form-control mb-2 @error('firstname') is-invalid @enderror" placeholder="نام"
                            value="{{ old('firstname', $researcher->firstname) }}" required>
                        @error('firstname')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">تخلص</label>
                        <input type="text" name="lastname"
                            class="form-control mb-2 @error('lastname') is-invalid @enderror" placeholder="تخلص"
                            value="{{ old('lastname', $researcher->lastname) }}" required>
                        @error('lastname')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">د پلار نوم</label>
                        <input type="text" name="father_name"
                            class="form-control mb-2 @error('father_name') is-invalid @enderror" placeholder="د پلار نوم"
                            value="{{ old('father_name', $researcher->father_name) }}" required>
                        @error('father_name')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">ټولګی</label>
                        <select name="class_id" class="form-control mb-2">
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" @if (old('class_id', $class->id) == $researcher->class_id) selected @endif>
                                    {{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="form-label">لارښود استاد</label>
                        <select name="teacher_id" class="form-control mb-2">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" @if (old('teacher_id', $teacher->id) == $researcher->teacher_id) selected @endif>
                                    {{ $teacher->firstname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="form-label">پوهنځی</label>
                        <select name="faculty_id" class="form-control mb-2" id="faculty">
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}" @if (old('faculty_id', $faculty->id) == $researcher->faculty_id) selected @endif>
                                    {{ $faculty->name }}</option>
                            @endforeach
                        </select>
                        @error('faculty_id')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">څانګه</label>
                        <select name="department_id" class="form-control mb-2" id="department">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @if (old('department_id', $department->id) == $researcher->department_id) selected @endif>
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">ساحه</label>
                        <input type="text" name="area" value="{{ old('area', $researcher->area) }}"
                            class="form-control mb-2" placeholder="ساحه">
                    </div>

                    <div class="col-4">
                        <label class="form-label">د پروژې عنوان</label>
                        <input type="text" name="project_title" value="{{ old('project_title', $researcher->project_title) }}"
                            class="form-control mb-2" placeholder="د پروژې عنوان">
                    </div>

                    <div class="col-4">
                        <label class="form-label">د پروژې پیل</label>
                        <input type="date" name="start_of_project"
                            value="{{ old('start_of_project', $researcher->start_of_project) }}" class="form-control mb-2">
                    </div>

                    <div class="col-4">
                        <label class="form-label">د پروژې ختم</label>
                        <input type="date" name="end_of_project" value="{{ old('end_of_project', $researcher->end_of_project) }}"
                            class="form-control mb-2">
                    </div>

                    <div class="col-4">
                        <label class="form-label">پلاټونه</label>
                        <input type="text" name="plots" value="{{ old('plots', $researcher->plots) }}"
                            class="form-control mb-2" placeholder="پلاټونه">
                    </div>

                    <div class="col-4">
                        <label class="form-label">طول</label>
                        <input type="text" name="length" class="form-control mb-2" placeholder="طول"
                            value="{{ old('length', $researcher->length) }}">
                    </div>

                    <div class="col-4">
                        <label class="form-label">عرض</label>
                        <input type="text" name="width" class="form-control mb-2" placeholder="عرض"
                            value="{{ old('width', $researcher->width) }}">
                    </div>

                    <div class="col-4">
                        <label class="form-label">ټریټمینټونه</label>
                        <input type="text" name="treatments" value="{{ old('treatments', $researcher->treatments) }}"
                            class="form-control mb-2" placeholder="ټریټمینټونه">
                    </div>


                    <div class="col-4">
                        <label class="form-label">تکرار</label>
                        <input type="number" name="duplicate" value="{{ old('dublicate', $researcher->duplicate) }}" class="form-control mb-2" placeholder="تکرار">
                    </div>

                    <div class="col-4">
                        <label class="form-label">انځور</label>
                        <input type="file" name="photo" class="form-control mb-2">
                        @error('photo')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">د پروژې سافت</label>
                        <input type="file" name="soft" class="form-control mb-2">
                        @error('soft')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mx-auto my-2">
                        <button type="submit" class="btn btn-warning">ویرایش<i
                                class="fa fa-user-plus mx-1"></i></button>
                        <a href="{{ route('researchers.index') }}" class="btn btn-outline-secondary"><i
                                class="fa fa-arrow-alt-circle-right mx-1"></i>بازگشت</a>
                    </div>

                </form>
            </div>

        </div>
    </section>
@endsection
