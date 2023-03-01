@extends('layouts.master')

@section('head-tag')
    <title>تحقیق کننده گان</title>
@endsection

@section('content')
    <section>
        <div class="col-12 mt-3 d-flex justify-content-around flex-wrap">
            <a href="{{ route('researchers.create') }}" class="btn btn-outline-success mb-1 fw-bold mx-4">تحقیق کننده
                جدید<i class="fa fa-plus mx-2"></i></a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary mb-1"><i
                    class="fa fa-arrow-alt-circle-right mx-1"></i> بازگشت</a>
            <span class="h4 text-center mt-2">لیست تحقیق کننده گان</span>
            <div>
                <form action="{{ route('search') }}" class="d-flex" method="GET">
                    <select name="search_by" class="form-control">
                        <option value="teacher_id">لارښود استاد</option>
                        <option value="department_id">څانګه</option>
                        <option value="project_title">د پروژې عنوان</option>
                    </select>
                    <input type="text" name="search" class="form-control" placeholder="جستجو">
                    <button class="btn btn-outline-success mx-1"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div>

            <div class="mx-auto mb-3" style="width: 98%">

                <hr>
                @if ($researchers->count() > 0)
                    <table class="table table-sm table-bordered table-responsive table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>آی دی</th>
                                <th>نوم</th>
                                <th>تخلص</th>
                                <th>ټولګی</th>
                                <th>څانګه</th>
                                <th>ساحه</th>
                                <th>د پروژې عنوان</th>
                                <th>لارښود استاد</th>
                                <th>د پروژې پیل</th>
                                <th>د پروژې ختم</th>
                                <th>طول</th>
                                <th>عرض</th>
                                <th> پلاټونه</th>
                                <th>ټریټمینټونه</th>
                                <th>تکرار</th>
                                <th>انځور</th>
                                <th>سافت</th>
                                <th class="text-center" style="width: fit-content"><i class="fa fa-cogs mx-2"></i>تنظیمات
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($researchers as $researcher)
                                <tr>
                                    <td>{{ $researcher->kankor_id }}</td>
                                    <td>{{ $researcher->firstname }}</td>
                                    <td>{{ $researcher->lastname }}</td>
                                    <td>{{ $researcher->classes->name }}</td>
                                    <td>{{ $researcher->department->name }}</td>
                                    <td>{{ $researcher->area }}</td>
                                    <td>{{ $researcher->project_title }}</td>
                                    <td>{{ $researcher->teacher->firstname }}</td>
                                    <td>{{ $researcher->start_of_project }}</td>
                                    <td>{{ $researcher->end_of_project }}</td>
                                    <td>{{ $researcher->length }}</td>
                                    <td>{{ $researcher->width }}</td>
                                    <td>{{ $researcher->plots }}</td>
                                    <td>{{ $researcher->treatments }}</td>
                                    <td>{{ $researcher->duplicate }}</td>
                                    <td>
                                        <img src="{{ asset('files/photos/' . $researcher->photo) }}" width="30"
                                            height="40">
                                    </td>
                                    <td>{{ $researcher->soft == null ? 'ندارد' : 'دارد' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('researchers.edit', $researcher->id) }}"
                                            class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('researchers.destroy', $researcher->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete">
                                                <i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        <a href="{{ route('print') }}" class="btn btn-secondary btn-sm"><i
                                class="fa fa-print mx-1"></i>پرنت</a>
                    </div>
                @else
                    <div class="text-center mt-4">
                        <h4 class="p-3">چیزی یافت نشد!</h4>
                        <img src="{{ asset('assets/images/no-found.gif') }}" class="img-fluid" style="width: 35%">
                    </div>
                @endif
            </div>
            {{ $researchers->links() }}
        </div>
    </section>
@endsection

@section('script')
    @include('alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
