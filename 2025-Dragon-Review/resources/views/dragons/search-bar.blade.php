
{{-- Search form
     - Submits with GET to the dragons index route so the query appears in the URL:
       /dragons?search=...
     - Using GET makes the search bookmarkable and works well with pagination.
--}}
<form action="{{route('dragons.index')}}" method="GET" class="flex items-center space-x-2">
        <input 
            type="text"
            name="search" {{--so the dragoncontroller can read it via $request->input('search')--}}
            value="{{request('search')}}" {{--keeps the user's query after submit or when paginating--}}
            placeholder="Search..."
            class="border border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-48 transition" 
            id="search"
        >

        {{-- Submit button: Pressing Enter in the input also submits the form--}}
        <button 
            type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1.5 rounded-md text-sm transition"> 
            Search
        </button>
    </form>