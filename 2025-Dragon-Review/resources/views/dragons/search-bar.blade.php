<form action="{{route('dragons.index')}}" method="GET" class="flex items-center space-x-2">
        <input 
            type="text"
            name="search"
            value="{{request('search')}}"
            placeholder="Search..."
            class="border border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-48 transition" 
            id="search"
        >
        <button 
            type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1.5 rounded-md text-sm transition"> 
            Search
        </button>
    </form>