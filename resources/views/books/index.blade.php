@extends('layouts/main')

@section('content')
    @if (Session::has('success_message'))

        <div class="alert alert-success">
            {{ Session::get('success_message') }}
        </div>

    @endif

    <h3>list of books:</h3>
    <ul>
        @foreach ($books as $book)
            <li>
                <a href="/books/{{ $book->id }}">{{ $book->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
