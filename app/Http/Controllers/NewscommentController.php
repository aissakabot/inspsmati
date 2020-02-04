<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Neww;
use App\Newscomment;

class NewscommentController extends Controller
{
    public function addComment($id , Request $request, Newscomment $newcom){
       
        $array = [
            'comment' => $request->comment,
            'user_id' => auth()->user()->id,
            'new_id' => $id
        ];
        $newcom->create($array);
        return redirect('news/'.$id);
    }

    public function updateComment($id , Request $request){
        $item =  Newscomment::findOrFail($id);
        if($item->user_id != auth()->user()->id)
            return redirect('news/'.$item->new_id);
        $array = [
            'comment' => $request->comment
        ];
        $item->update($array);
        return redirect('news/'.$item->new_id);
    }

    public function deleteComment($id){
        $item =  Newscomment::findOrFail($id);
        if($item->user_id != auth()->user()->id)
            return redirect('news/'.$item->new_id);
        $item->delete();
        return redirect('news/'.$item->new_id);
    }
}
