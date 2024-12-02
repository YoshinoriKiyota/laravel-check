<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::all();
        return view('index', compact('memos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $memo = new Memo();
        $memo->title = $request->input('title');
        $memo->content = $request->input('content');
        $memo->id = Auth::id();
        
        return redirect()->route('home.index');
    }

    public function edit(Memo $memo)
    {
        if($memo->id !== Auth::id()) {
            return redirect()->route('index');
        }

        return view('edit', compact('memo'));
    }

    public function update(Request $request, Memo $memo)
    {
        if($memo->id !== Auth::id()) {
            return redirect()->route('index');
        }

        $memo->title = $request->input('title');
        $memo->content = $request->input('content');
        $memo->save();

        return redirect()->route('index', $memo);
    }

    public function destroy($id)
    {
        Memo::destroy($id);
        return redirect()->route('home');
    }
}
