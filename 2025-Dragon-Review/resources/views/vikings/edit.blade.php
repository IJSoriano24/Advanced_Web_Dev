<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Edit Viking')}}
        </h2>
    </x-slot>


    <div class="py-12">
        


        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="pt-4 font-semibold text-;g mb-4">Edit New Viking:</h3>


                    {{-- Using the VikingForm component for viking creation to avoid redundancy --}}
                    <x-viking-form
                        :action="route('vikings.update', $viking)" {{-- Form action URL for updating the existing viking. --}}
                        :method="'PUT'"                 {{-- HTTP method "PUT" for the form submission. --}}
                        :viking="$viking"           {{-- Pass the existing viking data to pre-fill the form. --}}
                        
                    />

                </div>
            </div>
        </div>
    </div>




</x-app-layout>