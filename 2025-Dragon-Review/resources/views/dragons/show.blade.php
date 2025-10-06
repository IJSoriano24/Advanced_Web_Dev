<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('All Dragons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm;px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Dragon Details</h3>
                        <x-dragon-details
                            :type="$dragon->type"
                            :color="$dragon->color"
                            :personality="$dragon->personalitiy"
                            :image="$dragon->image"
                        />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>