<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        return view('forums.index', [
            'forums' => Forum::latest()->get()
        ]);
    }

        public function create()
    {
        return view('forums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        Forum::create([
            'user_id'=>auth()->id(),
            'title'=>$request->title,
            'content'=>$request->content
        ]);

       return redirect()->route('forums.index');

    }

    /* ================= EDIT ================= */
    public function edit(Forum $forum)
    {
        return view('forums.edit', compact('forum'));
    }

    /* ================= UPDATE ================= */
    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required'
        ]);

        $forum->update([
            'title'   => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('forums.index')
                         ->with('success', 'Forum berhasil diperbarui');
    }

    /* ================= DELETE ================= */
    public function destroy(Forum $forum)
    {
        $forum->delete();

        return redirect()->route('forums.index')
                         ->with('success', 'Forum berhasil dihapus');
    }
}
