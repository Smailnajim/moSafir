@extends('layouts.admin')

@section('title', 'Content Form')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md my-8">
    <div class="mb-6 border-b pb-4">
        <h1 class="text-2xl font-bold text-gray-800">Add New Content</h1>
        <p class="text-gray-600 mt-1">Fill in the details to create new content.</p>
    </div>
    
    <form action="" method="POST">
        @csrf
        <div class="mb-6">
            <h3 class="text-gray-700 font-medium mb-2">Title</h3>
            <input
                type="text"
                placeholder="Enter title"
                name="title"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required
            >
        </div>
        <div class="mb-6">
            <h3 class="text-gray-700 font-medium mb-2">Price</h3>
            <div class="relative">
                <input
                    type="number"
                    placeholder="price"
                    name="price"
                    step="0.1"
                    min="0"
                    class="w-full pl-8 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required
                >
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-gray-700 font-medium mb-2">Description</h3>
            <textarea
                id="description"
                name="description"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent h-32"
                placeholder="Enter description"
                required
            ></textarea>
        </div>
        
        <div class="mb-6">
            <h3 class="text-gray-700 font-medium mb-3">Address</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country: </label>
                    <select
                        id="country"
                        name="country_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
                    >
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City: </label>
                    <select 
                        id="city" 
                        name="city"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
                        value=''
                    >
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-6">
            <label for="imageInput" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            <input 
                type="text" 
                name="image" 
                id="imageInput" 
                placeholder="Image URL" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-3"
            >
            <div class="mt-2 border border-dashed border-gray-300 rounded-md p-2 bg-gray-50">
                <img
                    class="w-2/5 h-auto mx-auto"
                    id="imageVue"
                    src="https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png"
                    alt="Preview will appear here"
                >
            </div>
        </div>
        
        <div class="flex justify-end">
            <button
                type="submit"
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
            >
                Submit
            </button>
        </div>
    </form>
</div>


<script>
    // display image if fuond it or display difault image
    document.getElementById('imageInput').addEventListener('input', function () {
        let image_vue = document.getElementById('imageVue');
        let image_url = this.value;

        if(image_url == '' )
        image_vue.src =  'https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png';
        else
        image_vue.src =  image_url;
    });


    
    document.getElementById('country').addEventListener('change', function () {
        let country_id = this.value;
        let cities = document.getElementById('city');


        fetch('http://127.0.0.1:8000/api/admin/country/cities/' + country_id)
        .then(response => response.json())
        .then(data => {
            cities.innerHTML="";
            for (let index = 0; index < data.length; index++) {
                let element = document.createElement('option');
                element.innerText = data[index];
                element.value =  data[index];
                cities.appendChild(element);
            }
        });
    });

</script>
@endsection