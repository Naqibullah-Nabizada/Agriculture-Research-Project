@extends('layouts.master')

@section('head-tag')
    <title>پرنت کارت تحقیق کننده گان</title>
@endsection

@section('content')
    <section>
        <h4 class="text-center mt-3">پرنت کارت تحقیق کننده گان</h4>
        <hr>
        <section class="container-fluid d-flex flex-wrap" id="card-container">

            <section class="id-card mx-auto" id="printable">
                <header>
                    <img src="{{ asset('assets/images/ku-logo1.jpg') }}" class="rounded-circle img-fluid mx-2">
                    <div class="text-center">
                        <h6 class="mx-2">د کابل پوهنتون</h6>
                        <h6 class="mx-2">کرنې پوهنځي</h6>
                        <h6 class="mx-2">د څیړنیز فارم آمریت</h6>
                    </div>
                    <img src="{{ asset('assets/images/Picture1.jpg') }}" class="rounded-circle img-fluid mx-2">
                </header>
                <section class="card-body">
                    <main>
                        {{-- <img src="{{ asset('files/banners/'.$logo->image) }}"> --}}
                        <p id="fullname">آی دی: {{'ARF- 0000'. $researcher->id }}</p>
                        <p id="job_name">نوم او تخلص: {{ $researcher->firstname . ' ' . $researcher->lastname }}</p>
                        <p id="job_location">ټولګی: {{ $researcher->classes->name }}</p>
                        <p id="start_of_job">څانګه: {{ $researcher->department->name }}</p>
                    </main>
                    <aside>
                        <img src="{{ asset('files/photos/' . $researcher->photo) }}" class="img-thumbnail">
                    </aside>
                </section>
                <footer>
                    <p class="mx-2 my-1">نمبر شناسایی: {{ $researcher->id }}</p>
                </footer>
            </section>

        </section>

        <div class="col-2 mx-auto d-flex justify-center mt-3">

            <a href="{{ route('researchers.index') }}" class="btn btn-sm btn-outline-secondary mx-auto"><i
                    class="fa fa-arrow-alt-circle-right mx-1"></i>بازگشت</a>

            <a class="btn btn-sm btn-dark mx-auto" id="print">پرنت<i class="fa fa-print mx-1"></i></a>

        </div>
    </section>
@endsection

@section('script')
    <script>
        let btnPrint = document.getElementById('print');
        btnPrint.addEventListener('click', function() {
            printContent('printable');
        })

        function printContent(element) {
            let restorePage = $('body').html();
            let printContent = $('#' + element).clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').html(restorePage);
        }
    </script>
@endsection
