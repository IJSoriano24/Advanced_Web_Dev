<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('All Dragons') }}
        </h2>
    </x-slot>

    <div class="py-12">


    <img src="/images/dragons/berk.jpg" 
         class="fixed inset-0 w-full h-full object-cover blur-sm z-0" 
         alt="Background" 
    />


{{-- adds a blurred backdrop --}}
    <div class="relative bg-white/60 backdrop-blur max-w-7xl mx-auto  lg:px-8 rounded-lg shadow-sm  py-5">


        <div class="p-6 text-gray-900 ">
            <h3 class="font-semibold text-lg mb-4">Dragon Details</h3>
            <x-dragon-details
                :type="$dragon->type"
                :color="$dragon->color"
                :personality="$dragon->personality"
                :image="$dragon->image"
            />
        
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
        
    </div>



{{-- vikings --}}
<div class="mt-8 border-t pt-4">
    <h3 class="text-2xl font-bold mb-4">Vikings Assigned to this Dragon</h3>

    @if($dragon->vikings->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($dragon->vikings as $viking)
                <div class="bg-white p-4 rounded shadow flex items-center space-x-4">
                    <img src="{{ asset('images/vikings/' . $viking->image) }}" 
                         alt="{{ $viking->name }}" 
                         class="w-12 h-12 rounded-full object-cover">
                    
                    <a href="{{ route('vikings.show', $viking) }}" class="text-blue-600 hover:underline font-bold">
                        {{ $viking->name }}
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 italic">No Vikings have been assigned to this dragon yet.</p>
    @endif
</div>

        {{-- dragon abilities --}}
        <h4 class="font-semibold text-md mt-8">Abilities</h4>
        @if($dragon -> abilities->isEmpty())
            <p class="text-gray-600">No abilities yet.</p>
        @else      
            <ul class="mt-4 space-y-4">
                @foreach($dragon->abilities as $ability)
                    <li class="bg-gray-100 p-4 rounded-lg">
                        <p class="font-semibold">{{ $ability->user?->name ?? 'Anonymous'}}</p>
                        <p>Ability: {{$ability->name}}</p>
                        <p>{{$ability->description}}</p>


                        {{-- if the logged in user wrote the review or he logged in user is in an admin they can edit and delete --}}
                        {{-- you need to consider your application to determine who has permissions to edit/delete content --}}
                        @auth
                        @if (auth()->user()->role === 'admin' || ($ability->user && $ability->user->is (auth()->user())))
                            <a href="{{ route('abilities.edit', $ability) }}" class= "text-green-600 bg-green-100 font-bold py-2 px-4 rounded border border-transparent border-4 hover:border-green-600">
                                {{__('Edit Ability')}}
                            </a>
                            
                            <form action="{{ route('abilities.destroy', $ability->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this ability?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-red-500 hover:underline">
                                  Delete
                              </button>
                          </form>
                        @endif
                        @endauth
                    </li>
                @endforeach
            </ul>
        @endif



        {{-- add a new ability --}}
        @if(auth()->user()->role === 'admin')

            <h4 class="font-semibold text-md mt-8">Add New Ability</h4>
            <form action="{{ route('dragons.abilities.store', $dragon) }}" method="POST" class="mt-4">
                @csrf

                <input type="hidden" name="dragon_id" value="{{$dragon->id}}">
            <div class="mb-4">
                    <label for="description" class="block font-medium text-sm text-gray-700">Ability Name:</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 block w-full" placeholder="Write the name here..."></textarea>
            </div>

            <div class="mb-4">
                <label for="name" class="block font-medium text-sm text-gray-700">Description:</label>
                <input type="text" name="name" id="name" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm" placeholder="Write the description of the ability here..."></input>
            </div>

            <button type="submit" class="bg-blue-600 text-white hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit Ability
            </button>


            </form>
         @endif 
    </div>
           

    </div>



        </div>




    </div>
</x-app-layout>