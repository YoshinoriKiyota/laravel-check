@extends('layouts.app')
@section('content')

@if (session('flash_message'))
    <p>{{ session('flash_message') }}</p>
@endif

<div class="card mx-auto w-75 mt-3 mb-3">
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
            <td class="py-3">
                <form action="{{ route('posts.destroy', $memo) }}" method="POST" onsubmit="return confirm('本当に削除してもよろしいでしょうか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection