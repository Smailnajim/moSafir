@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/styleIndex.css') }}">
@endsection


@section('content')
<div class="content">
    <h3 class="section-title">Users</h3>
    @foreach ($users as $user)
        <div class="activity-item">
            <div class="activity-avatar"><img src="{{$user->image}}" alt="{{$user->first_name}}"></div>
            <div class="activity-content">
                <p class="activity-text">{{$user->first_name .' '. $user->last_name}}</p>
                <p class="activity-time">{{$user->role}}</p>
                <p class="activity-time">{{$user->status}}</p>
            </div>
            <form action="/admin/active/{{$user->id}}" method="post">
                @csrf
                <button type="submit" class="activity-btn">Activ</button>
            </form>
            <form action="/admin/block/{{$user->id}}" method="post">
                @csrf
                <button type="submit" class="activity-btn">Block</button>
            </form>
            <form action="/admin/delete/{{$user->id}}" method="post">
                @csrf
                <button type="submit" class="activity-btn">Delete</button>
            </form>
            
            
        </div>
    @endforeach
</div>
@endsection