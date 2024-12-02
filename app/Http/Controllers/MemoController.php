<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    // home.blade.phpを表示
    public function index()
    {
        $memos = Memo::all();
        return view('home', compact('memos'));
    }

    // submit.blade.phpを表示
    public function create($id = 0)
    {
        if ($id != 0) {
            $memo = Memo::where('id', $id)->get()->first();
        } else {
            $memo = (object) ["id" => 0, "title" => "", "content" => ""];
        }
        return view('submit', compact('memo'));
    }

    public function store(Request $request, $id = 0)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        if ($id == 0) {
            Memo::create([
                'title' => $title,
                'content' => $content
            ]);
        } else {
            $memo = Memo::find($id);
            $memo->update([
                'title' => $title,
                'content' => $content
            ]);
        }
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        Memo::destroy($id);
        return redirect()->route('home');
    }
}
