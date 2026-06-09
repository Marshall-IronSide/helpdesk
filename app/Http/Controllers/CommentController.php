<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Ticket $ticket)
    {
        $request->validate([
            'content' => 'required|min:2|max:1000',
        ]);

        Comment::create([
            'ticket_id' => $ticket->id,
            'user_id'   => Auth::id(),
            'content'   => $request->content,
        ]);

        return back()->with('success', 'Commentaire ajouté.');
    }

    public function destroy(Comment $comment)
    {
        // Seul l'auteur ou l'admin peut supprimer
        if (Auth::id() !== $comment->user_id && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $comment->delete();
        return back()->with('success', 'Commentaire supprimé.');
    }
}
