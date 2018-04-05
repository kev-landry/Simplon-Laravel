@extends('layouts.default')


@section('content')

    @foreach ($articles as $article)
        {{$article->title}}
    @endforeach

@endsection
