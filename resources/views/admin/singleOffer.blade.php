@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg overflow-hidden">
    <!-- Offer Header with Background Image -->
    <div class="relative h-64 bg-gray-200">
        <img src="{{ $offer->image }}" alt="{{ $offer->title }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end">
            <div class="p-6 text-white">
                <h1 class="text-3xl font-bold">{{ $offer->title }}</h1>
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
    
    <!-- Offer Details -->
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <div class="text-sm text-gray-500">
                <span class="mr-4"><i class="fas fa-map-marker-alt mr-1"></i> Address: {{ $offer->adress }}</span>
            </div>
            <div class="flex space-x-2">
                <a href="{{ url('admin/offers/' . $offer->id . '/edit') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition-colors">
                    <i class="fas fa-edit mr-1"></i> Edit
                </a>
                <form action="{{ url('admin/offers/' . $offer->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md transition-colors">
                        <i class="fas fa-trash mr-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Description -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
            <div class="text-gray-600">
                {{ $offer->description }}
            </div>
        </div>
        
        <!-- Additional Details -->
        <div class="bg-gray-50 rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Details</h2>
            <ul class="space-y-2">
                <li class="flex">
                    <span class="font-medium w-32 text-gray-500">Price:</span>
                    <span>{{ number_format($offer->price, 2) }} DH</span>
                </li>
                <li class="flex">
                    <span class="font-medium w-32 text-gray-500">Stars:</span>
                    <span>{{ $offer->stars }}</span>
                </li>
                <li class="flex">
                    <span class="font-medium w-32 text-gray-500">Address:</span>
                    <span>{{ $offer->adress }}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection