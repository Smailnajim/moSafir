@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold text-gray-800">users</h3>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Users</th>
                    <th class="py-3 px-6 text-center">Role</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach ($users as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <img class="w-10 h-10 rounded-md object-cover" src="{{ $user->image }}" alt="{{ $user->first_name }}">
                            </div>
                            <span>{{ $user->first_name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{ $user->role}}
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="inline-block px-2 py-1 text-xs rounded-full
                            @if($user->status == 'Activ')
                                bg-green-100 text-green-800
                            @elseif($user->status == 'Block')
                                bg-red-100 text-red-800
                            @else
                                bg-yellow-100 text-yellow-800
                            @endif
                        ">
                            {{ $user->status }}
                        </span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center space-x-2">
                            @if($user->status == 'Block')
                                <form action="{{ url('/admin/active/' . $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ url('/admin/block/' . $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fa-solid fa-hand"></i>
                                    </button>
                                </form>
                            @endif
                            <form action="{{ url('/admin/delete/' . $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection