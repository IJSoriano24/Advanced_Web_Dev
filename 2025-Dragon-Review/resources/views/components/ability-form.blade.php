@props(['action', 'method', 'dragon','ability'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif



    <!--Name-->  
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name:</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $ability->name??'')}}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('name')
                <p class="text-sm text-red-600">{{$message}}</p>
            @enderror
    </div>

    <p>{{$ability->name}}</p>

    <!--Description-->  
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <input
            type="text"
            name="description"
            id="description"
            value="{{ old('description', $ability->description??'')}}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('description')
                <p class="text-sm text-red-600">{{$message}}</p>
            @enderror
    </div>

<input type="hidden" name="dragon_id" value="{{$dragon->id}}">

    <!--Update button-->  
    <div>
        <x-primary-button>
            {{ isset($ability)?'Update Ability':'save Ability'}}
        </x-primary-button>

           <!--Back button-->                                                                                 <a href="{{ route('dragons.index') }}"
class="text-[#e36e32]  bg-[#5B3A29] font-bold py-2 px-4 rounded border-4 border-transparent hover:border-[#4d3022]"
    >Back</a>

    </div>

</form>