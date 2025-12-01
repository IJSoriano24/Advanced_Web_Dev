<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Dragons') }}
        </h2>
    </x-slot>

    {{-- Success messages --}}
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- THE GREEN CONTAINER --}}
            <div class="bg-[#abd4b1] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                        
                        <h3 class="font-semibold text-lg text-gray-800 mb-4 sm:mb-0">
                            List of Dragons
                        </h3>

                        {{-- search form --}}
                        <form action="{{ route('dragons.index') }}" method="GET" class="flex items-center space-x-2 w-full sm:w-auto">
                            <input 
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search Dragons..."
                                class="w-full sm:w-64 border border-green-600 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-green-800 shadow-sm" 
                            >

                            <button 
                                type="submit"
                                class="bg-green-800 hover:bg-green-900 text-white px-4 py-2 rounded-md text-sm font-bold transition shadow-md tracking-wide"
                            > 
                                Search
                            </button>
                            
                            {{-- Clear Button --}}
                            @if(request('search'))
                                <a href="{{ route('dragons.index') }}" class="text-green-900 hover:text-red-600 text-sm underline font-semibold ml-2">
                                    Clear
                                </a>
                            @endif
                        </form>

                    </div>

                   
                    @if(!empty($search) && $dragons->isNotEmpty())
                        <p class="text-sm text-green-900 mb-4 italic">
                            Showing results for: <strong>"{{ $search }}"</strong>
                        </p>
                    @endif

                    {{-- GRID SECTION --}}
                    @if($dragons->isEmpty())
                        <div class="text-center py-10">
                            <p class="text-gray-700 text-lg">No dragons found matching "<span class="font-bold">{{ request('search') }}</span>".</p>
                            <a href="{{ route('dragons.index') }}" class="text-green-800 underline mt-2 block">View all Dragons</a>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"> 
                            @foreach($dragons as $dragon)
                                
                                {{-- DRAGON CARD CONTAINER --}}
                                <div class="bg-[#D9C9B4] border p-4 rounded-lg shadow-md flex flex-col h-full justify-between">
                                    
                                    {{-- Card Content --}}
                                    <a href="{{ route('dragons.show', $dragon) }}" class="transform hover:scale-105 transition duration-300 block">
                                        <x-dragon-card
                                            :type="$dragon->type"
                                            :image="$dragon->image"
                                        />
                                    </a>

                                    {{-- Admin Controls --}}
                                    @if(auth()->user()->role === 'admin')
                                        <div class="mt-4 flex space-x-2">
                                            
                                          {{-- edit --}}
                                            <a href="{{ route('dragons.edit', $dragon)}}" 
                                               class="text-green-600 bg-green-100 font-bold py-2 px-4 rounded border border-transparent border-4 hover:border-green-600"> 
                                                Edit
                                            </a>    

                                            {{-- delete --}}
                                            <form action="{{ route('dragons.destroy', $dragon)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this dragon?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-[#A8412B] bg-[#F9EDEB] font-bold py-2 px-4 rounded border-4 border-transparent hover:border-[#A8412B]"> 
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif

                                </div>

                            @endforeach
                        </div>
                    @endif
  
                </div>
            </div>
        </div>
    </div>

</x-app-layout>