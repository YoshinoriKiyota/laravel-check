@extends('layouts.app')

@section('content')
<a href="{{ route('posts.index') }}" class="btn btn-primary ms-5">戻る</a>
<div class="w-75 mx-auto">
    <h2>{{ $memos->title }}</h2>
    <p>{{ $memos->content }}</p>
</div>
@endsection