@extends('layouts.master')

@section('head-tag')
    <title>تحقیق کننده گان</title>
@endsection

@section('content')
    <section>
        <div class="col-12 mt-3">
            <a href="{{ route('researchers.create') }}" class="btn btn-outline-success mb-1 fw-bold col-2 mx-4">تحقیق کننده
                جدید<i class="fa fa-plus mx-2"></i></a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary mb-1 col-1"><i
                    class="fa fa-arrow-alt-circle-right mx-1"></i> بازگشت</a>
            <span class="h4 text-center mt-3 col-5" style="margin: 0 13rem">لیست تحقیق کننده گان</span>
        </div>

        <div>

            <div class="mx-auto mb-3" style="width: 98%">

                <hr>
                @if ($researchers->count() > 0)
                    <table class="table table-sm table-bordered table-responsive table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>نوم</th>
                                <th>تخلص</th>
                                <th>ټولګی</th>
                                <th>پوهنځی</th>
                                <th>څانګه</th>
                                <th>ساحه</th>
                                <th>د پروژې عنوان</th>
                                <th>لارښود استاد</th>
                                <th>د پروژې پیل</th>
                                <th>د پروژې ختم</th>
                                <th>د پلاټ اندازه/ m2</th>
                                <th> پلاټونه</th>
                                <th>ټریټمینټونه</th>
                                <th>تکرار</th>
                                <th>انځور</th>
                                <th>د پروژې سافت</th>
                                <th class="text-center" style="width: fit-content"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($researchers as $researcher)
                                <tr>
                                    <td>{{ $researcher->firstname }}</td>
                                    <td>{{ $researcher->lastname }}</td>
                                    <td>{{ $researcher->classes->name }}</td>
                                    <td>{{ $researcher->faculty->name }}</td>
                                    <td>{{ $researcher->department->name }}</td>
                                    <td>{{ $researcher->area }}</td>
                                    <td>{{ $researcher->project_title }}</td>
                                    <td>{{ $researcher->teacher->firstname }}</td>
                                    <td>{{ $researcher->start_of_project }}</td>
                                    <td>{{ $researcher->end_of_project }}</td>
                                    <td>{{ $researcher->plot_size }}</td>
                                    <td>{{ $researcher->plots }}</td>
                                    <td>{{ $researcher->treatments }}</td>
                                    <td>{{ $researcher->dublocate == 0 ? 'تائید شده' : 'تائید نشده' }}</td>
                                    <td>
                                        <img src="{{ asset('files/photos/' . $researcher->photo) }}" width="30" height="40">
                                    </td>
                                    <td>{{ $researcher->soft == null ? 'ندارد' : 'دارد' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('researchers.show', $researcher->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-print"></i></a>
                                        <a href="{{ route('researchers.edit', $researcher->id) }}"
                                            class="btn btn-sm btn-warning"><i class="fa fa-edit mx-1"></i></a>
                                        <form action="{{ route('researchers.destroy', $researcher->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete">
                                                <i class="fa fa-trash mx-1"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
