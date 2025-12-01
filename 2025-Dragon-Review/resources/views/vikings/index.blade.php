<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Vikings') }}
        </h2>
    </x-slot>

    {{-- Success Message --}}
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- THE GREEN CARD --}}
            <div class="bg-[#abd4b1] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
            
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                        
                        <h3 class="font-semibold text-lg text-gray-800 mb-4 sm:mb-0">
                            List of Vikings
                        </h3>

                        <form action="{{ route('vikings.index') }}" method="GET" class="flex items-center space-x-2 w-full sm:w-auto">
                            <input 
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search Vikings..."
                                class="w-full sm:w-64 border border-green-600 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-green-800 shadow-sm" 
                            >

                            <button 
                                type="submit"
                                class="bg-green-800 hover:bg-green-900 text-white px-4 py-2 rounded-md text-sm font-bold transition shadow-md tracking-wide"
                            > 
                                Search
                            </button>
                            
                            {{-- Clear Button (Only shows if searching) --}}
                            @if(request('search'))
                                <a href="{{ route('vikings.index') }}" class="text-green-900 hover:text-red-600 text-sm underline font-semibold ml-2">
                                    Clear
                                </a>
                            @endif
                        </form>

                    </div>

                    {{-- GRID SECTION --}}
                    @if($vikings->isEmpty())
                        <div class="text-center py-10">
                            <p class="text-gray-700 text-lg">No vikings found matching "<span class="font-bold">{{ request('search') }}</span>".</p>
                            <a href="{{ route('vikings.index') }}" class="text-green-800 underline mt-2 block">View all Vikings</a>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"> 
                            @foreach($vikings as $viking)
                                <a href="{{ route('vikings.show', $viking) }}" class="transform hover:scale-105 transition duration-300">
                                    <x-viking-card
                                        :image="$viking->image"
                                        :name="$viking->name"
                                        :bio="$viking->bio"
                                    />
                                </a>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>