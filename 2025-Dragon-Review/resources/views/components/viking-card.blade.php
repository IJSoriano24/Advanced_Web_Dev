@props(['image', 'name', 'bio'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$name}} </h4>
    <img src="{{asset( 'images/vikings/' . $image)}}" alt="{{$name}}">
    <h4 class="font-bold text-lg">{{$bio}} </h4>
</div>