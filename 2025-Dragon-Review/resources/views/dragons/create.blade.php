<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Dragon')}}
        </h2>
    </x-slot>


    
    <div class="pt-6 py-12">

        <div class="pt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            <div class="bg-[#FDF8F8] overflow -hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Add a New Dragon</h3>


                     {{-- Include the dragon form component for creating a new dragon. --}}
                    <x-dragon-form
                        :action="route('dragons.store')" {{-- Form action URL for storing the new dragon. --}}
                        :method="'POST'"               {{-- HTTP method "POST" for the form submission. --}}
                    />

            </div>
        </div>
    </div>
</div>
</x-app-layout>  