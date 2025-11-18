<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Edit Ability')}}
        </h2>
    </x-slot>


    <div class="py-12">
        


        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="pt-4 font-semibold text-;g mb-4">Edit Ability:</h3>

{{-- <p>{{$ability}}</p> --}}
                    {{-- Using the DragonForm component for dragon creation to avoid redundancy --}}
                    <x-ability-form
                        :action="route('abilities.update', $ability)" {{-- Form action URL for updating the existing dragon. --}}
                        :method="'PUT'"                 {{-- HTTP method "PUT" for the form submission. --}}
                        :ability="$ability"           {{-- Pass the existing dragon data to pre-fill the form. --}}
                        :dragon="$ability->dragon"
                    />

                </div>
            </div>
        </div>
    </div>




</x-app-layout>