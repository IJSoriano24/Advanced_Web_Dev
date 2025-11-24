@props(['name', 'image', 'bio'])

<!-- Viking details component -->

{{-- back button --}}
<a href="{{ route('vikings.index') }}"
class="text-[#A8412B] bg-[#5B3A29] font-bold py-2 px-4 rounded border-4 border-transparent hover:border-[#4d3022] "
   >Back</a>


   <!-- viking name -->
 <div class="border rounded-lg sadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">

       <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;";>{{$name}}</h1>

       <!-- Viking image -->
       <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
           <!-- Image is further restricted to a smaller size -->
           <img src="{{ asset('images/vikings/' . $image)}}" alt="{{ $image }}"
           class="w-full max-w-xs h-auto object-cover"> <!-- restricts image to a certain width -->
       </div>

       <!-- Viking bio -->
       <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 2rem;">Bio</h3> 
       <!-- Subheading for description -->
       <p class="text-gray-700 text-sm italic mb-4" style="font-size: 1rem;">{{$bio}}</p>
       <!-- Text is spaced out for readability -->

       
   </div>

   