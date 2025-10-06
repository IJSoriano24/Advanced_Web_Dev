@props(['type', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$type}} </h4>
    <img src="{{asset( 'images/dragons/' . $image)}}" alt="{{$type}}">
</div>