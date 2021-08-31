@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        @auth
        @if (Auth::user()->username == 'fayez.s')
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <div class="table w-full p-2">
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-50 border-b">

                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Name
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Username
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Email
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-50 text-center">
                                <td class="p-2 border-r">

                                </td>
                            </tr>

                            @foreach ($users as $user)
                                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                    <td class="p-2 border-r">{{ $user->name }}</td>
                                    <td class="p-2 border-r">{{ $user->username }}</td>
                                    <td class="p-2 border-r">{{ $user->email }}</td>
                                    <td class="flex justify-center">
                                        <a href="{{ route('user.edit', $user) }}" class="w-20 bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin rounded-lg">Edit</a>
                                        <form action="{{ route('user.delete', $user) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="w-20 bg-red-500 p-2 ml-3 text-white hover:shadow-lg text-xs font-thin rounded-lg">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="w-8/12 bg-white p-6 rounded-lg">
                Home
            </div>
        @endif
        @endauth
    </div>
@endsection
