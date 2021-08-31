@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        @auth
        @if (Auth::user()->username == 'fayez.s')
            <div class="w-3/12 bg-white p-6 rounded-lg">
                <form action="{{ route('user.update', $user) }}" method="post">
                    @csrf
                    @method('PUT')
                    @if (session('status'))
                        <div class="text-center bg-green-200 relative text-black-600 py-3 px-3 rounded-lg mb-2">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-4">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" placeholder="Enter name" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                        @error('username')
                            <div class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="sr-only">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror">
                        @error('password')
                            <div class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="sr-only">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter password again" class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                    </div>

                    <div>
                        <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full" type="submit">
                            Edit User
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="w-8/12 bg-white p-6 rounded-lg">
                You have to be the admin to access this page!
            </div>
        @endif
        @endauth
    </div>
@endsection
