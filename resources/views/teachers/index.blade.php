@extends('layouts.master')

@section('head-tag')
    <title>استادان</title>
@endsection

@section('content')
    <section class="container">
        <div class="d-flex my-3">
            <a href="{{ route('teachers.create') }}" class="btn btn-outline-success mx-3">اضافه نمودن استاد جدید<i
                    class="fa fa-plus mx-1"></i></a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary"><i
                    class="fa fa-arrow-alt-circle-right mx-1"></i>بازگشت</a>

            <h5 class="text-center my-2 mx-auto">لیست استادان پوهنتون کابل</h5>
        </div>
        <hr>
        @if ($teachers->count() > 0)
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>نام</th>
                        <th>تخلص</th>
                        <th>نام پدر</th>
                        <th>پوهنځی</th>
                        <th>دیپارتمنت</th>
                        <th class="text-center"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->firstname }}</td>
                            <td>{{ $teacher->lastname }}</td>
                            <td>{{ $teacher->father_name }}</td>
                            <td>{{ $teacher->faculty->name }}</td>
                            <td>{{ $teacher->department->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fa fa-edit"></i></a>
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center mt-4">
                <h4 class="p-3">استادی یافت نشد!</h4>
                <img src="{{ asset('assets/images/no-found.gif') }}" class="img-fluid" style="width: 35%">
            </div>
        @endif
    </section>
@endsection
@section('script')
    @include('alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
