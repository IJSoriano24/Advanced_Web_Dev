<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('All Dragons') }}
        </h2>
    </x-slot>

    <div class="py-12">


    <img src="/images/dragons/berk.jpg" 
         class="absolute inset-0 w-full h-full object-cover blur-sm z-0" 
         alt="Background" 
    />

    <div class="relative bg-white/60 backdrop-blur max-w-7xl mx-auto  lg:px-8 rounded-lg shadow-sm">
        <div class="p-6 text-gray-900">
            <h3 class="font-semibold text-lg mb-4">Dragon Details</h3>
            <x-dragon-details
                :type="$dragon->type"
                :color="$dragon->color"
                :personality="$dragon->personality"
                :image="$dragon->image"
            />
        </div>
    </div>
        </div>
    </div>
</x-app-layout>