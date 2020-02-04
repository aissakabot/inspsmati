<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activite;
use App\Activitecomment;

class ActivitecommentController extends Controller
{
    //
    public function addComment($id , Request $request, Activitecomment $actcom){
       
        $array = [
            'comment' => $request->comment,
            'user_id' => auth()->user()->id,
            'activite_id' => $id
        ];
        $actcom->create($array);
        return redirect('activites/'.$id);
    }

    public function updateComment($id , Request $request){
        $item =  Activitecomment::findOrFail($id);
        if($item->user_id != auth()->user()->id)
            return redirect('activites/'.$item->activite_id);
        $array = [
            'comment' => $request->comment
        ];
        $item->update($array);
        return redirect('activites/'.$item->activite_id);
    }

    public function deleteComment($id){
        $item =  Activitecomment::findOrFail($id);
        if($item->user_id != auth()->user()->id)
            return redirect('activites/'.$item->activite_id);
        $item->delete();
        return redirect('activites/'.$item->activite_id);
    }
}
