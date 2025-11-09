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
        <div class="p-6 text-gray-900">
            <h3 class="font-semibold text-lg mb-4">Dragon Details</h3>
            <x-dragon-details
                :type="$dragon->type"
                :color="$dragon->color"
                :personality="$dragon->personality"
                :image="$dragon->image"
            />
        </div>

        {{-- dragon abilities --}}
        <h4 class="font-semibold text-md mt-8">Abilities</h4>
        @if($dragon -> abilities->isEmpty())
            <p class="text-gray-600">No abilities yet.</p>
        @else      
            <ul class="mt-4 space-y-4">
                @foreach($dragon->abilities as $ability)
                    <li class="bg-gray-100 p-4 rounded-lg">
                        <p class="font-semibold">{{ $ability->user->name}} ({ $ability->created_at->format('M d, Y')})</p>
                        <p>Ability: {{$ability->name}}</p>
                        <p>{{$ability->description}}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- add a new ability --}}
        <h4 class="font-semibold text-md mt-8">Add New Ability</h4>
        <form action="{{ route('abilities.store', $dragon) }}" method="POST" class="mt-4">
            @csrf
           <div class="mb-4">
                <label for="name" class="block font-medium text-sm text-gray-700">Description:</label>
                <input type="text" name="name" id="name" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm" placeholder="Write the ability here..."></input>
           </div>

           <div class="mb-4">
                <label for="description" class="block font-medium text-sm text-gray-700">Ability Name:</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full" placeholder="Write the description here..."></textarea>
           </div>

           <button type="submit" class="bg-blue-600 text-white hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Submit Ability
           </button>
        </form>    

            {{-- displays a youtube video for the dragon based on the "video_id" --}}
        <iframe 
            class="relative z-10 mx-auto block rounded-xl shadow-lg"
            width="560" 
            height="315" 
            src="https://www.youtube.com/embed/{{$dragon->video_id}}"
            title="{{$dragon->type}}"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>



        </div>




    </div>
</x-app-layout>