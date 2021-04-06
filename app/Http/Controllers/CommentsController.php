<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Products;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request,$product_id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:1000',
        ]);

        $product = Products::find($product_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->products()->associate($product);
        $comment->save();
        return back();
    }

    
}
