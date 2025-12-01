<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Viking')}}
        </h2>
    </x-slot>


    
    <div class="pt-6 py-12">

        <div class="pt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            <div class="bg-[#abd4b1] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Add a New Viking</h3>


                     {{-- Include the dragon form component for creating a new viking. --}}
                    <x-viking-form
                        :action="route('vikings.store')" {{-- Form action URL for storing the new viking. --}}
                        :method="'POST'"               {{-- HTTP method "POST" for the form submission. --}}
                        :dragons="$dragons"
                    />

            </div>
        </div>
    </div>
</div>
</x-app-layout>  