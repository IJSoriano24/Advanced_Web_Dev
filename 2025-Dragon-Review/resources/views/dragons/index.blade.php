<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('All Dragons') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Dragons</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($dragons as $dragon)
                       
                        <div class="border p-4 rounded-lg shadow-md">

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
                                    class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded"> Edit
                                </a>    

                                {{-- Delete Button (You need a form to send DELETE requests) --}}
                                {{-- Delete Button route to dragons.destroy. --}}
                                <form action="{{ route('dragons.destroy', $dragon)}}" method="POST" onsumbit="return confirm('Are you sure you want to delete this dragon?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-blade py-2 px-4 rounded"> Delete
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

<x-alert-success>
    {{ session('success') }}
</x-alert-success>
