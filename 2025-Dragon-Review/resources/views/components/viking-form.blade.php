@props(['action', 'method', 'viking' => null, 'dragons' => []])
{{-- blade extracts the data and puts it into the variables listed above --}}


{{-- 
    This form is reused for both creating and editing a Viking.
    It accepts the following props:
    - action: The form submission URL
    - method: The HTTP method (POST for create, PUT/PATCH for update)
    - viking: The existing viking data (null when creating)
    - dragons: List of all dragons for the multi-select field
--}}

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Add hidden _method field only when updating --}}
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    {{-- VIKING NAME FIELD --}}
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>

        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $viking->name ?? ' ') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />

        {{-- Validation Error --}}
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    {{-- bio field--}}
    <div class="mb-4">
        <label for="bio" class="block text-sm text-gray-700">Bio</label>

        <input
            type="text"
            name="bio"
            id="bio"
            value="{{ old('bio', $viking->bio ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />

        {{-- Validation Error --}}
        @error('bio')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    {{-- IMAGE UPLOAD FIELD --}}
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">
            Viking Cover Image
        </label>

        {{-- 
            Optional when editing (only required when creating)
        --}}
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($viking) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />

        {{-- Validation Error --}}
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    {{-- dragon multiple select field --}}
    <div class="mb-4">
        <label for="dragons" class="block text-gray-700 text-sm font-bold mb-2">
            Assign Dragons (Hold Ctrl/Cmd to select multiple)
        </label>

        <select 
            name="dragons[]" 
            id="dragons" 
            multiple
            class="shadow border rounded w-full py-2 px-3 text-gray-700 h-32 focus:outline-none focus:shadow-outline"
        >
            {{-- Display list of all dragons --}}
            @foreach($dragons as $dragon)
                <option value="{{ $dragon->id }}">
                    {{ $dragon->type }}
                </option>
            @endforeach
        </select>

        {{-- Validation Error --}}
        @error('dragons')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>


    {{-- SUBMIT BUTTON --}}
    <div>
        <x-primary-button>
            {{ isset($viking) ? 'Update Viking' : 'Add Viking' }}
        </x-primary-button>
    </div>

</form>
