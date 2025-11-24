<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Vikings') }}
        </h2>
    </x-slot>

    <div class="py-12 relative">

        {{-- Background Image --}}
        <img src="/images/dragons/berk.jpg" 
             class="fixed inset-0 w-full h-full object-cover blur-sm z-0" 
             alt="Background" 
        />

        {{-- Main Content Card --}}
        <div class="relative bg-white/60 backdrop-blur max-w-7xl mx-auto lg:px-8 rounded-lg shadow-sm py-5 z-10">
            <div class="p-6 text-gray-900">
                <h3 class="font-semibold text-lg mb-4">Viking Details</h3>
                
                {{-- Viking Component --}}
                <x-viking-details
                    :name="$viking->name"
                    :image="$viking->image"
                    :bio="$viking->bio"
                />
                
                {{-- Edit and Delete Buttons --}}
                @auth
                    @if (auth()->user()->role === 'admin' || ($viking->user && $viking->user->is(auth()->user())))
                        
                        <div class="mt-6 flex items-center gap-4">
                            {{-- Edit Button --}}
                            <a href="{{ route('vikings.edit', $viking) }}" class="text-green-600 bg-green-100 font-bold py-2 px-4 rounded border-4 border-transparent hover:border-green-600">
                                {{ __('Edit Viking') }}
                            </a>
                        
                            {{-- Delete Button (Fixed: Added the form tag back) --}}
                            <form action="{{ route('vikings.destroy', $viking) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this viking?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 font-bold hover:underline py-2 px-4">
                                    Delete
                                </button>
                            </form>
                        </div>

                    @endif
                @endauth
            
            </div>
        </div>
    </div>
</x-app-layout>