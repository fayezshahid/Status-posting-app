@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and recieved {{ $user->recievedLikes->count() }} likes</p>
            </div>
            <div class="bg-white p-6 rounded-lg">
                @if($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post"/>
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500 mb-2">Show</a>
                @endforeach

                {{ $posts->links() }}

                @else
                    <p>{{ $user->name }} does not have any posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection
