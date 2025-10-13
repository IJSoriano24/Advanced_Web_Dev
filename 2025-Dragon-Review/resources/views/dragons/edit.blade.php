<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Create New Dragon')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-;g mb-4">Edit New Dragon:</h3>


                    {{-- Using the DragonForm component for dragon creation --}}
                    <x-dragon-form
                        :action="route('dragons.update', $dragon)"
                        :method="'PUT'"
                        :book="$dragon"
                    />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>