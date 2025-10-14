 @props(['type', 'color', 'personality', 'image'])

 <!-- Book details component -->

 {{-- back button --}}
<a href="{{ route('dragons.index') }}"
class="text-[#A8412B] bg-[#5B3A29] font-bold py-2 px-4 rounded border-4 border-transparent hover:border-[#4d3022]"
    >Back</a>


    <!-- Book Title -->
  <div class="border rounded-lg sadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">

        <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;";>{{$type}}</h1>

        <!-- Book cover image -->
        <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
            <!-- Image is further restricted to a smaller size -->
            <img src="{{ asset('images/dragons/' . $image)}}" alt="{{ $type }}"
            class="w-full max-w-xs h-auto object-cover"> <!-- restricts image to a certain width -->
        </div>

        <!-- Publication Year -->
        <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;"> Color {{ $color }}</h2> 
        <!-- Emphasizing year with italics -->

        <!-- Dragon Description -->
        <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 2rem;">Description</h3> 
        <!-- Subheading for description -->
        <p class="text-gray-700 text-sm italic mb-4" style="font-size: 1rem;">{{$personality}}</p>
        <!-- Text is spaced out for readability -->

        
    </div>

    