@extends('layouts.app')
@section('content')

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<a href="{{ route('posts.index') }}" class="btn btn-primary ms-5">戻る</a>
<form action="{{ route('posts.store') }}" method="POST" class="w-75 mx-auto">
    @csrf
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <textarea class="form-control" id="content" name="content" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-success">追加</button>
</form>
@endsection