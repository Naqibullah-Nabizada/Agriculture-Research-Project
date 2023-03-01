@extends('layouts.master')

@section('head-tag')
    <title>پرنت کارت تحقیق کننده گان</title>
@endsection

@section('content')
    <section>
        <h4 class="text-center mt-3">پرنت کارت تحقیق کننده گان</h4>
        <hr>
        <section class="container-fluid d-flex flex-wrap" id="card-container">

            <section id="printable" class="d-flex flex-wrap">
                @foreach ($researchers as $researcher)
                    <section class="id-card mx-auto">
                        <header>
                            <div class="text-center mx-2">
                                <h6 class="mx-2">کرنې پوهنځي</h6>
                                <h6 class="mx-2">د څیړنیز فارم آمریت</h6>
                                <h6 class="mx-2">د څیړونکی پیژند کارت</h6>
                            </div>
                            <img src="{{ asset('assets/images/Picture1.jpg') }}" class="rounded-circle img-fluid mx-2">
                            <div class="text-center mx-2">
                                <h6 class="mx-2">پوهنځی زراعت</h6>
                                <h6 class="mx-2">آمریت فارم تحقیقاتی</h6>
                                <h6 class="mx-2">کارت شناسایی محقق</h6>
                            </div>
                        </header>
                        <section class="card-body">
                            <main>
                                {{-- <img src="{{ asset('files/banners/'.$logo->image) }}"> --}}
                                <p id="fullname">آی دی: {{ 'ARF- '.$researcher->jalali() .'-'. $researcher->id }}</p>
                                <p id="job_name">نوم او تخلص: {{ $researcher->firstname . ' ' . $researcher->lastname }}
                                </p>
                                <p id="job_location">ټولګی: {{ $researcher->classes->name }}</p>
                                <p id="start_of_job">څانګه: {{ $researcher->department->name }}</p>
                            </main>
                            <aside>
                                <img src="{{ asset('files/photos/' . $researcher->photo) }}" class="img-thumbnail">
                            </aside>
                        </section>
                        <footer>
                            <p class="mx-2 my-2">د اعتبار موده: {{ $researcher->FarsiDate($researcher->created_at) }}</p>
                            <p class="mx-2 my-2">د کانکور آی دی: {{ $researcher->kankor_id }}</p>
                        </footer>
                    </section>
                @endforeach

            </section>
        </section>
        <div class="col-2 mx-auto d-flex justify-center mt-3">

            <a href="{{ route('researchers.index') }}" class="btn btn-sm btn-outline-secondary mx-auto"><i
                    class="fa fa-arrow-alt-circle-right mx-1"></i>بازگشت</a>

            <a class="btn btn-sm btn-dark mx-auto" id="print">پرنت<i class="fa fa-print mx-1"></i></a>

        </div>
    </section>
    {{ $researchers->links() }}
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
