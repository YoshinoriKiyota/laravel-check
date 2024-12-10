<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    // 一覧ページ
    public function index()
    {
        $memos = Auth::user()->memos;

        return view('posts.index', compact('memos'));
    }

    // 作成ページ
    public function create()
    {
        return view('posts.create');
    }

    // 作成機能
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:80',
            'content' => 'required'
        ]);

        $memo = new Memo();
        $memo->title = $request->input('title');
        $memo->content = $request->input('content');
        $memo->user_id = Auth::id();
        $memo->save();

        return redirect()->route('posts.index')->with('flash_message', '投稿が完了しました。');
    }

    // 詳細ページ
    public function show($id)
    {
        $memos = Memo::find($id);

        return view('posts.show', compact('memos'));
    }

    // 編集ページ
    public function edit(Memo $memo)
    {
        if ($memo->user_id !== Auth::id()) {
            return redirect()->route('posts.index');
        }

        return view('posts.edit', compact('memo'));
    }

    // 更新機能
    public function update(Request $request, Memo $memo)
    {
        if ($memo->user_id !== Auth::id()) {
            return redirect()->route('posts.index');
        }

        $memo->title = $request->input('title');
        $memo->content = $request->input('content');
        $memo->save();
        
        return redirect()->route('posts.show', $memo);
        
    }

    // 削除機能
    public function destroy(Memo $memo)
    {
        if ($memo->user_id !== Auth::id()) {
            return redirect()->route('posts.index');
        }

        $memo->delete();

        return redirect()->route('posts.index');
    }
}
