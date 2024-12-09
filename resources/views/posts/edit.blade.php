@extends('layouts.app')

@section('content')
<a href="{{ route('posts.index') }}" class="btn btn-primary ms-5">戻る</a>
<form action="{{ route('posts.update', ['id' => $memo->id]) }}" method="POST" class="w-75 mx-auto">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title value=" {{ old('title', $memo->title) }}">
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <textarea class="form-control" id="content" name="content">{{ old('content', $memo->content) }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">更新</button>
</form>
@endsection