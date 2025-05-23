    @extends('layouts.admin')

    @section('content')
    <div class="flex flex-wrap">
        
@foreach ($posts as $post)
    {{-- @dd($post) --}}


    <!-- resources/views/components/post-card.blade.php -->
<div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
    <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
        <img src="{{ $post->image }}" alt="image" class="w-full h-full object-cover" />
    </div>  
    <div class="p-4">
        <h6 class="mb-2 text-slate-800 text-xl font-semibold">
            {{ $post->time }}
        </h6>
        <p class="text-slate-600 leading-normal font-light">
            {{ $post->description }}
        </p>
    </div>
    <div class="flex items-center justify-between p-4">
        <div class="flex items-center">
            <img
                alt="{{ $post->fullName }}"
                src="{{ $post->userImage }}"
                class="relative inline-block h-8 w-8 rounded-full object-cover"
            />
            <div class="flex flex-col ml-3 text-sm">
                <span class="text-slate-800 font-semibold">{{ $post->fullName }}</span>
            </div>
        </div>
    </div>
    <div class="flex item-center justify-center space-x-2 pb-4">
        @if($post->status == 'Block')
            <form action="{{ url('/admin/active/' . $post->user_id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Active User
                </button>
            </form>
        @else
            <form action="{{ url('/admin/block/' . $post->user_id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                    Block User
                </button>
            </form>
        @endif
        <form action="{{ url('admin/delete/post/' . $post->id) }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                Delete Post
            </button>
        </form>
    </div>
</div>

@endforeach
</div>

    @endsection