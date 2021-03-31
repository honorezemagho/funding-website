<x-app-layout>
    @section('body')
        <h2 class="text-gray-700 text-3xl font-medium">Campaigns</h2>

        <div class="mt-8">
        <x-display-messages class="mb-4"/>
        </div>

        <div class="flex flex-col mt-8">

            <div class='text-right'>
                <div class="my-6">
                    <a href="{{ route('campaigns.create') }}" type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4  rounded">
                        Add A Campaign
                    </a>
                </div>
            </div>

            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="p-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="p-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="p-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="p-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Owner</th>
                                <th class="p-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Days</th>
                                <th class="p-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Percentage</th>
                                <th class="p-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                        @if($campaigns)
                            @foreach ($campaigns as $campaign)
                                <tr>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{$campaign->name}}</div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{!!$campaign->description!!}</div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{$campaign->amount}}</div>
                                        </div>
                                    </td>

                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{$campaign->owner->name}}</div>
                                        </div>
                                    </td>


                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{$campaign->days}}</div>
                                        </div>
                                    </td>

                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{$campaign->percentage}}%</div>
                                        </div>
                                    </td>


                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                                    @csrf
                                                <a type="submit"  target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded" href="{{route('show-campaing', $campaign->id)}}">
                                                  Show
                                                </a>

                                            <form method="post" action="{{route('campaigns.destroy', $campaign->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                                        Delete
                                                    </button>
                                            </form>
                                        </div>
                                    </td>

                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>
