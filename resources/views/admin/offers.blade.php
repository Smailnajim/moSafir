@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/styleOffer.css') }}">
@endsection

@section('content')
<div class="content">
    <h3 class="section-title">Offers</h3>
    <form class="cardPlus">
        <button class="circle-button" aria-label="Add item"></button>
    </form>
    @foreach ($voyages as $voyage)
        <div class="card">
            <img class="card-img" src="{{ $voyage->image }}" alt="{{ $voyage->name}}">
            <div class="card-content">
                <div class="card-header">
                    <div class="rating">
                        <i class="star">@for ($i = 0; $i < $voyage->stars; $i++) ★ @endfor</i>
                    </div>
                    <button class="btn-demand">SUR DEMANDE</button>
                </div>
                <p class="location">
                    <i class="fa-map-marker">📍</i> {{ $voyage->location }}
                </p>
                <h2 class="card-title">{{ $voyage->title }}</h2>
                <p class="card-description">{{ $voyage->description }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection