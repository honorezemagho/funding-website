
@extends('layouts.base')

@section('content')

<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <!-- <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600"> -->
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">ALLTOGETHER</h1>
      <p class="mb-8 leading-relaxed">A Leading Donation Platform</p>
      <!-- <div class="flex justify-center">
        <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
      </div> -->
    </div>
  </div>
</section>

    <div class="container mx-auto p-2">
        <h1 class="text-4xl mt-2 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
            Our Campaigns
        </h1>

        <div class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-wrap -m-4">
                @foreach ($campaigns as $campaign)
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                      <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="{{$campaign->name}}">
                      <div class="p-6">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{$campaign->name}}</h2>
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $campaign->name}}</h1>
                        <h4 class="title-font text-lg font-medium text-gray-900 mb-3">Percentage: {{ $campaign->percentage}}%</h4>
                        <p class="leading-relaxed mb-3">{!! Str::limit($campaign->description, 100) !!}</p>
                        <div class="flex items-center flex-wrap ">
                          <a href="/campaigns/{{ $campaign->id }}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 12h14"></path>
                              <path d="M12 5l7 7-7 7"></path>
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
        </div>
    </div>

@endsection
