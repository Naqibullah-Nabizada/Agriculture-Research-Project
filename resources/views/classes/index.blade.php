@extends('layouts.master')

@section('head-tag')
    <title>صنف ها</title>
@endsection

@section('content')
    <section class="col-12">

        <div class="col-5" style="margin: 0 15rem">
            <div class="mb-2">
                <h5 class="text-center pt-5 pb-3">لیست صنف</h5>
                <hr>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>شناسه</th>
                            <th>نام صنف</th>
                            <th class="col-4 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-bold">{{ $class->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit mx-1"></i>ویرایش</a>
                                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete">
                                            <i class="fa fa-trash mx-1"></i>حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $classes->links() }}
            </div>
        </div>

        <div class="col-2 my-auto mx-auto">
            <div class="col-12" id="position-absolute">
                <a href="{{ route('classes.create') }}" class="btn btn-outline-success w-100 mb-1 fw-bold">صنف
                    جدید<i class="fa fa-plus mx-2"></i></a>

                <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100 mb-2"><i
                        class="fa fa-arrow-alt-circle-right mx-1"></i> بازگشت</a>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @include('alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
