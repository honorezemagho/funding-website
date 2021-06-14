@extends('layouts.base')

@section('content')

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-col">
      <div class="lg:w-4/6 mx-auto">
        <div class="flex flex-col sm:flex-row mt-10">
          <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
          </div>
          <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
            @if($_GET['transaction_status'] == 'FAILED')
                <h1 class="leading-relaxed text-lg mb-4">We are sorry but the payment was not successfull</h1>
            @else 
                <h1 class="leading-relaxed text-lg mb-4">Payment Made Successfully</h1> 
            @endif

            @php 
                return redirect(route('my-donations'));
            @endphp
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
