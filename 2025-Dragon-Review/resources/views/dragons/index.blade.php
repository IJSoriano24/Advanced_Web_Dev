

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('All Dragons') }}
        </h2>

    </x-slot>

    <x-alert-success>
    {{ session('success') }}
</x-alert-success>

@if(!empty($search))
    <p class="text-sm text-gray-600 mb-3">
        Showing results for: <strong>{{ $search }}</strong>
    </p>
@endif

@if($dragons->isEmpty())
    <p class="text-gray-500">No dragons found matching "{{ $search }}".</p>
@endif



    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#abd4b1] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Dragons</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($dragons as $dragon)
                       
                        <div class="bg-[#D9C9B4]  border p-4 rounded-lg shadow-md" >
                            
                            

                        <a href="{{ route('dragons.show', $dragon) }}">
                                <x-dragon-card
                                    :type="$dragon->type"
                                    :image="$dragon->image"
                                />
                            </a>

                            <!-- edit and delete buttons -->
                            <div class="mt-4 flex space-x-2">
                                {{--Edit Button route to dragons.edit and receives $dragon for editing  --}}
                                <a href="{{ route('dragons.edit', $dragon)}}" 
                                    class="text-green-600 bg-green-100 font-bold py-2 px-4 rounded border border-transparent border-4 hover:border-green-600"> Edit
                                </a>    

                                {{-- Delete Button (You need a form to send DELETE requests) --}}
                                {{-- Delete Button route to dragons.destroy. --}}
                                <form action="{{ route('dragons.destroy', $dragon)}}" method="POST" onsumbit="return confirm('Are you sure you want to delete this dragon?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[#A8412B] bg-[#F9EDEB] font-bold py-2 px-4 rounded border-4 border-transparent hover:border-[#A8412B]"> Delete
                                    </button>
                                </form>
                            </div>

                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

<!--success alert-->


