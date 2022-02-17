@extends('layouts/main')

@section('content')
    <h3>Detail of book:</h3>

    <h2>{{ $book->title }}</h2>

    <p>
        author(s):
        @foreach($book->authors as $author)
            <a href="/authors/{{ $author->id }}">{{ $author->name }}</a>,
        @endforeach
    </p>
{{--    <p>--}}
{{--        category:--}}
{{--        <a href="/categories/{{ $book->category->id }}">{{ $book->category->name }}</a>--}}
{{--    </p>--}}
    <p>published at: {{ $book->publishedAt }}</p>
    <p>description: {{ $book->description }}</p>
    
    <img src="/images/{{ $book->image }}">

    <form action="/books/{{ $book->id }}" method="post">
        @csrf
        @method('delete')

        <input type="submit" value="Delete"/>
    </form>
    <a href="/books/{{ $book->id }}/edit">Edit</a>


    @if(Auth::check())
        <form
                action="/books/{{ $book->id }}/review"
                method="post"
        >
            @csrf
            <textarea
                    name="text"
                    id="text"></textarea>
            <input type="number" name="rating">
            <input type="submit">
        </form>
    @endif

        @foreach($book->reviews as $review)
            <div>
                <p>{{ $review->text }}</p>
                <p>{{ $review->rating }}</p>

                @can('admin')

                    <form
                            action="/books/{{ $book->id }}/reviews/{{ $review->id }}"
                            method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>

                @endcan
            </div>
        @endforeach



@endsection
