



@extends('layouts.admin')






@section('content')
<div class="bg-white rounded-lg shadow mb-4 overflow-hidden">
    <div class="flex items-center p-3">
        <div class="w-10 h-10 rounded-full overflow-hidden mr-3">
            <img src="{{ $post->userImage }}" alt="User avatar" class="w-full h-full object-cover">
        </div>
        <div class="flex-grow">
            <div class="font-semibold text-gray-900">{{ $post->fullName }}</div>
            {{-- <div class="text-xs text-gray-500">{{ $post->time }}</div> --}}
        </div>
        @if(auth()->user()->isAdmin())
        <div class="flex space-x-2">
            <a href="{{ route('posts.edit', $post->id) }}" class="text-gray-500 hover:text-blue-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </a>
            <button 
                type="button" 
                class="text-gray-500 hover:text-red-600 transition-colors" 
                onclick="confirmDelete('{{ $post->id }}')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
            <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
        @endif
    </div>
    <div class="px-3 pb-3">
        <div class="text-gray-800 mb-2">{{ $post->description }}</div>
        @if($post->image)
        <div class="mt-2">
            <img src="{{ $post->image }}" alt="Post image" class="w-full rounded-md object-cover">
        </div>
        @endif
    </div>
    <div class="border-t border-gray-200">
        <button
            type="button"
            data-post-id="{{ $post->id }}"
            class="like-btn w-full py-2 px-4 text-center font-medium text-gray-500 hover:bg-gray-100 transition-colors focus:outline-none {{ $post->liked ? 'text-blue-600' : '' }}"
        >
            <span class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="{{ $post->liked ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                </svg>
                Like
            </span>
        </button>
    </div>
</div>

<script>
    function confirmDelete(postId) {
        if (confirm('Are you sure you want to delete this post?')) {
            document.getElementById('delete-form-' + postId).submit();
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const likeButtons = document.querySelectorAll('.like-btn');
        
        likeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.getAttribute('data-post-id');
                
                fetch(`/posts/${postId}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    credentials: 'same-origin'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.liked) {
                        this.classList.add('text-blue-600');
                        this.querySelector('svg').setAttribute('fill', 'currentColor');
                    } else {
                        this.classList.remove('text-blue-600');
                        this.querySelector('svg').setAttribute('fill', 'none');
                    }
                });
            });
        });
    });
</script>

@endsection