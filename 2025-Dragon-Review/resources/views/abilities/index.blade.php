{{-- <x-app-layout> --}}
    {{-- <x-slot name="header"> --}}
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight"> --}}
            {{-- {{__('All abilities') }} --}}
        {{-- </h2> --}}

    {{-- </x-slot> --}}

        {{-- <div class="py-12"> --}}
            {{-- <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8"> --}}
                {{-- <div class="bg-[#abd4b1] overflow-hidden shadow-sm sm:rounded-lg"> --}}
                    {{-- <div class="p-6 text-gray-900"> --}}
                        {{-- <h3 class="font-semibold text-lg mb-4">List of Abilities</h3> --}}
                        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">  --}}
                            {{-- Loop through each dragon and display using the DragonCard component --}}
                            {{-- @foreach($abilities as $ability) --}}
                            {{-- <a href="{{ route('abilities.show', $ability) }}"> --}}
                                {{-- <x-dragon-card --}}
                                    {{-- :name="$ability->name" --}}
                                    {{-- :description="$ability->description" --}}
                                {{-- /> --}}
                            {{-- </a> --}}
                            {{-- @endforeach --}}
                        {{-- </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}
        {{-- </div> --}}


{{-- </x-app-layout> --}}