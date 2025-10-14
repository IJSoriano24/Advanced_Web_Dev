@props(['action', 'method', 'dragon'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="type" class="block text-sm text-gray-700">Type</label>
        <input
            type="text"
            name="type"
            id="type"
            value="{{ old('type', $dragon->type??'')}}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('type')
                <p class="text-sm text-red-600">{{$message}}</p>
            @enderror
    </div>

    <div class="mb-4">
        <label for="color" class="block text-sm text-gray-700">Color</label>
        <input
            type="text"
            name="color"
            id="color"
            value="{{ old('color', $dragon->color??'')}}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('color')
                <p class="text-sm text-red-600">{{$message}}</p>
            @enderror
    </div>

    <div class="mb-4">
        <label for="personality" class="block text-sm text-gray-700">Personality</label>
        <input
            type="text"
            name="personality"
            id="personality"
            value="{{ old('personality', $dragon->personality??'')}}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('personality')
                <p class="text-sm text-red-600">{{$message}}</p>
            @enderror
    </div>


    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Dragon Cover Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{isset($dragon)? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
            <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>


    @isset($dragon->image)
        <div class="mb-4">
            <img src="{{asset('images/dragons/' . $dragon->image) }}" alt="Dragon cover" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($dragon)?'Update Dragon':'Add Dragon'}}
        </x-primary-button>

                                                                                            <a href="{{ route('dragons.index') }}"
class="text-[#e36e32]  bg-[#5B3A29] font-bold py-2 px-4 rounded border-4 border-transparent hover:border-[#4d3022]"
    >Back</a>

    </div>

</form>