@extends('layouts.admin')
@section('content')
<div class="bg-white shadow rounded-lg overflow-hidden">
    <div class="relative h-64 bg-gray-200">
        <img src="{{ $offer->image }}" alt="{{ $offer->title }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end">
            <div class="p-6 text-white">
                <h1 class="text-3xl font-bold" id="view-title">{{ $offer->title }}</h1>
                <div id="edit-title" class="hidden">
                    <input type="text" name="title" value="{{ $offer->title }}" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none">
                </div>
                <div class="flex items-center mt-2">
                    <span class="inline-block px-2 py-1 text-xs rounded-full bg-white text-gray-800 mr-3">
                        {{ number_format($offer->price, 2) }} DH
                    </span>
                    <span class="inline-block px-2 py-1 text-xs rounded-full bg-yellow-500 text-white">
                        {{ $offer->stars }} Stars
                    </span>
                </div>
            </div>
        </div>
    </div>


    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <div class="text-sm text-gray-500">
                <span class="mr-4"><i class="fas fa-map-marker-alt mr-1"></i> Address: {{ $offer->adress }}</span>
            </div>
            <div class="flex space-x-2">
                <button id="edit-btn" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition-colors">
                    <i class="fas fa-edit mr-1"></i> Edit
                </button>
                <button id="cancel-btn" class="hidden px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md transition-colors">
                    <i class="fas fa-times mr-1"></i> Cancel
                </button>
                <button id="submit-btn" class="hidden px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md transition-colors">
                    <i class="fas fa-check mr-1"></i> Submit
                </button>
                <form action="{{ url('admin/offer/delete/' . $offer->id) }}" method="POST" class="inline" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md transition-colors">
                        <i class="fas fa-trash mr-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
            <div class="text-gray-600" id="view-description">
                {{ $offer->description }}
            </div>
            <div id="edit-description" class="hidden">
                <textarea name="description" rows="4" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none">{{ $offer->description }}</textarea>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Details</h2>
            <ul class="space-y-2">
                <li class="flex">
                    <span class="font-medium w-32 text-gray-500">Price:</span>
                    <span id="view-price-details">{{ number_format($offer->price, 2) }} DH</span>
                    <div id="edit-price-details" class="hidden">
                        <input type="number" step="0.01" name="price" value="{{ $offer->price }}" class="px-3 py-1 text-gray-700 border rounded focus:outline-none">
                    </div>
                </li>
                <li class="flex">
                    <span class="font-medium w-32 text-gray-500">Stars:</span>
                    <span >{{ $offer->stars }}</span>
                </li>
                <li class="flex">
                    <span class="font-medium w-32 text-gray-500">Address:</span>
                    <span >{{ $offer->adress }}</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<form id="update-form" action="{{ url('admin/edit/offer') }}" method="POST" class="hidden">
    @csrf
    @method('PUT')
    <input type="hidden" id="form-title" name="title">
    <input type="hidden" id="form-price" name="price">
    <input type="hidden" id="form-description" name="description">
    <input type="hidden" name="id" value="{{ $offer->id }}">
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editBtn = document.getElementById('edit-btn');
        const cancelBtn = document.getElementById('cancel-btn');
        const submitBtn = document.getElementById('submit-btn');
        const updateForm = document.getElementById('update-form');
        
        const viewElements = document.querySelectorAll('[id^="view-"]');
        const editElements = document.querySelectorAll('[id^="edit-"]');
        
        const titleInput = document.querySelector('input[name="title"]');
        const priceInput = document.querySelector('input[name="price"]');
        const descriptionInput = document.querySelector('textarea[name="description"]');
        
        
        const formTitle = document.getElementById('form-title');
        const formPrice = document.getElementById('form-price');
        const formDescription = document.getElementById('form-description');
        
        
        editBtn.addEventListener('click', function() {
            viewElements.forEach(el => el.classList.add('hidden'));
            editElements.forEach(el => el.classList.remove('hidden'));
            
            editBtn.classList.add('hidden');
            cancelBtn.classList.remove('hidden');
            submitBtn.classList.remove('hidden');
        });
        
        
        cancelBtn.addEventListener('click', function() {
            viewElements.forEach(el => el.classList.remove('hidden'));
            editElements.forEach(el => el.classList.add('hidden'));
            editBtn.classList.remove('hidden');
            cancelBtn.classList.add('hidden');
            submitBtn.classList.add('hidden');
        });
        
        
        submitBtn.addEventListener('click', function() {
            formTitle.value = titleInput.value;
            formPrice.value = priceInput.value;
            formDescription.value = descriptionInput.value;
            updateForm.submit();
        });
    });
    </script>
@endsection