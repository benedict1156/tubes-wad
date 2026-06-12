<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return view('notes.index', [
            'notes' => Note::where('user_id', auth()->id())->get()
        ]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required'
        ]);

        Note::create([
            'user_id' => auth()->id(),
            'title'   => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('notes.index');
    }

    /* ================= EDIT ================= */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    /* ================= UPDATE ================= */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required'
        ]);

        $note->update([
            'title'   => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('notes.index')
                         ->with('success', 'Catatan berhasil diperbarui');
    }

    /* ================= DELETE ================= */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
                         ->with('success', 'Catatan berhasil dihapus');
    }
}
