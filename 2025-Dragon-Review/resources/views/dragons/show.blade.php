<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Dragons') }}
        </h2>
    </x-slot>

    <div class="py-12">

        {{-- Background Image --}}
        <img src="/images/dragons/berk.jpg"
            class="fixed inset-0 w-full h-full object-cover blur-sm z-0"
            alt="Background" />


        {{-- Main Container: adds a blurred backdrop --}}
        <div class="relative bg-white/60 backdrop-blur max-w-7xl mx-auto lg:px-8 rounded-lg shadow-sm py-5">

            <div class="p-6 text-gray-900">
                
                {{-- Dragon Details Component --}}
                <h3 class="font-semibold text-lg mb-4">Dragon Details</h3>
                <x-dragon-details
                    :type="$dragon->type"
                    :color="$dragon->color"
                    :personality="$dragon->personality"
                    :image="$dragon->image" 
                />

                {{-- YouTube Video --}}
                <iframe
                    class="relative z-10 mx-auto block rounded-xl shadow-lg mt-6"
                    width="560"
                    height="315"
                    src="https://www.youtube.com/embed/{{$dragon->video_id}}"
                    title="{{$dragon->type}}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>

                {{-- Vikings assigned to a dragon Section --}}
                <div class="mt-8 border-t pt-4">

                    <h3 class="text-2xl font-bold mb-4">Vikings Assigned to this Dragon</h3>

                    {{-- Check if the 'vikings' relationship collection is not empty --}}
                    @if($dragon->vikings->isNotEmpty())

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            {{-- Loop through each viking in the collection --}}
                            @foreach($dragon->vikings as $viking)

                                <div class="bg-white p-4 rounded shadow flex items-center space-x-4">

                                    {{-- Uses the asset() helper to link to public/images/vikings/ --}}
                                    <img src="{{ asset('images/vikings/' . $viking->image) }}"
                                        alt="{{ $viking->name }}"
                                        class="w-12 h-12 rounded-full object-cover">
                                    
                                    {{-- viking name links to vinking show page --}}
                                    {{-- Uses the route helper to generate a URL to the viking's show page --}}
                                    <a href="{{ route('vikings.show', $viking) }}" class="text-blue-600 hover:underline font-bold">
                                        {{ $viking->name }}
                                    </a>

                                </div>
                    @endforeach

                 </div>

    {{-- else If the collection is empty (count is 0) --}}
    @else
        <p class="text-gray-500 italic">No Vikings have been assigned to this dragon yet.</p>
    @endif

</div>

                {{-- Dragon Abilities Section --}}
                <div class="mt-8 border-t pt-8">
                    <h4 class="font-bold text-2xl text-gray-800 mb-6">Abilities</h4>

   
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

      
                    <div class="lg:col-span-2">
                    
                    @if($dragon->abilities->isEmpty())
                        <div class="bg-gray-50 p-4 rounded-lg border border-dashed border-gray-300 text-center">
                            <p class="text-gray-500">No abilities recorded yet.</p>
                        </div>
                    @else
                
                    <ul class="space-y-4">
                        @foreach($dragon->abilities as $ability)
                            <li class="bg-gray-100 p-5 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-bold text-gray-800 text-lg">{{$ability->name}}</p>
                                        <p class="text-xs text-gray-500 mb-2">Recorded by: {{ $ability->user?->name ?? 'Anonymous'}}</p>
                                        <p class="text-gray-700 leading-relaxed">{{$ability->description}}</p>
                                    </div>
                                </div>

                                {{-- Edit/Delete Buttons --}}
                                @auth
                                    @if (auth()->user()->role === 'admin' || ($ability->user && $ability->user->is(auth()->user())))
                                        <div class="flex items-center gap-3 mt-4 pt-4 border-t border-gray-200">
                                            <a href="{{ route('abilities.edit', $ability) }}"
                                                class="text-green-600 bg-green-100 font-bold py-2 px-4 rounded border border-transparent border-4 hover:border-green-600">
                                                Edit
                                            </a>

                                            <form action="{{ route('abilities.destroy', $ability->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this ability?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-[#A8412B] bg-[#F9EDEB] font-bold py-2 px-4 rounded border-4 border-transparent hover:border-[#A8412B]">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </li>
                        @endforeach
                    </ul>
            @endif
        </div>

        <div class="lg:col-span-1">
            @if(auth()->user()->role === 'admin')
                <div class="bg-white p-5 rounded-xl shadow-lg border border-blue-100 sticky top-24">
                    <h5 class="font-bold text-lg text-gray-800 mb-1">Add New Ability</h5>
                    <p class="text-xs text-gray-500 mb-4">Record a new ability for this dragon.</p>

                    <form action="{{ route('dragons.abilities.store', $dragon) }}" method="POST">
                        @csrf
                        <input type="hidden" name="dragon_id" value="{{$dragon->id}}">

                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block font-semibold text-xs text-gray-700 uppercase tracking-wide mb-1">Ability Name</label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2"
                                    placeholder="e.g. invisibility cloak"
                                >
                            </div>

                            <div>
                                <label for="description" class="block font-semibold text-xs text-gray-700 uppercase tracking-wide mb-1">Description</label>
                                <textarea
                                    name="description"
                                    id="description"
                                    rows="4"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                    placeholder="Describe the effect..."
                                ></textarea>
                            </div>

                            <button type="submit" class="w-full bg-blue-600 text-white hover:bg-blue-700 font-bold py-2 px-4 rounded shadow transition duration-200">
                                Save Ability
                            </button>
                        </div>
                    </form>
                </div>
            @else
                {{-- displayed on users page --}}
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                    <p class="text-blue-800 text-sm">Only admins can record new abilities.</p>
                </div>
            @endif

            </div>
        </div>
    </div>
</x-app-layout>