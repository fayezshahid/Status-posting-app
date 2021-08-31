@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <x-post :post="$post"/>
            @can('delete', $post)
                <div class="flex">
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">Delete</button>
                    </form>
                    <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 ml-2">Edit</a>
                </div>
            @endcan
        </div>
    </div>
@endsection
