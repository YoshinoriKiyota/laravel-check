@extends('layouts.app')

@section('content')
<div class="card mx-auto w-75 mt-3">
    <div class="card-header d-flex justify-content-between">
        <div class="fs-5">メモ一覧</div>
        <a href="{{ route('posts.create') }}" class="fs-5 pe-3">メモを追加</a>
    </div>

    <table>
        @foreach ($memos as $memo)
        <tr>
            <td class="py-3 ps-3 w-75">{{ $memo->title }}</td>
            <td class="py-3"><a href="{{ route('posts.show', $memo) }}">詳細</a></td>
            <td class="py-3"><a href="{{ route('posts.edit', $memo) }}">編集</a></td>
            <td class="py-3"><a href="">削除</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection