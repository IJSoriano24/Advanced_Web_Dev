<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('All vikings') }}
        </h2>

    </x-slot>


{{-- Success messages are diasplayed after interacting with the crud functions --}}
<x-alert-success>     
    {{ session('success') }}
</x-alert-success>

        <div class="py-12">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
                <div class="bg-[#abd4b1] overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">List of Vikings</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"> 
                            {{-- Loop through each viking and display using the Vikingcard component --}}
                            @foreach($vikings as $viking)

                            
                            <a href="{{ route('vikings.show', $viking) }}">
                                <x-viking-card
                                    :image="$viking->image"
                                    :name="$viking->name"
                                    :bio="$viking->bio"
                                />
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


</x-app-layout>