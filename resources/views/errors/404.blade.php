<x-error-layout>
<div class="row">
    <div class="col-lg-12">
        <div class="text-center mb-5">
            <h1 class="display-2 fw-medium">404</h1>
            <h4 class="text-uppercase">Sorry, page not found</h4>
            <div class="mt-5 text-center">
                <a class="btn btn-primary waves-effect waves-light"  href="{{ route('dashboard') }}">Go Back</a>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8 col-xl-6">
        <div>
            <img src="{{ asset('error-img.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</div>
</x-error-layout>