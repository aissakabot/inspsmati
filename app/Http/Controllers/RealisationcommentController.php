<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realisation;
use App\Realisationcomment;
use Yajra\Datatables\DataTables;

class RealisationcommentController extends Controller
{
    public function addComment($id , Request $request,Realisationcomment $newcom){
       
        $array = [
            'comment' => $request->comment,
            'user_id' => auth()->user()->id,
            'realisation_id' => $id
        ];
        $newcom->create($array);
        return redirect('realisations/'.$id);
    }

    public function updateComment($id , Request $request){
        $item =  Realisationcomment::findOrFail($id);
        if($item->user_id != auth()->user()->id)
            return redirect('news/'.$item->realisation_id);
        $array = [
            'comment' => $request->comment
        ];
        $item->update($array);
        return redirect('realisations/'.$item->realisation_id);
    }

    public function deleteComment($id){
        $item =  Realisationcomment::findOrFail($id);
        if($item->user_id != auth()->user()->id)
            return redirect('realisations/'.$item->realisation_id);
        $item->delete();
        return redirect('realisations/'.$item->realisation_id);
    }


public function index($id){
	
	$num=Realisation::findOrFail($id);
    	return view('admin.realisations.comments.index',compact('num'));

}
    public function anyData($id){
     $realisationcomms=Realisationcomment::where('realisation_id',$id);
     dd($realisationcomms);
     return DataTables::of($realisationcomms)
    
     ->editColumn('id',function($model){
      return \Html::Link('/adminpanel/realisations/comments/'.$model->id.'/edit',$model->id);
     })
/*
     ->editColumn('special',function($realisation){
     	$special=realisSpecial();
      return  '<span class="badge badge-info">'.$realisation->special.'</span>' ;
    
     })*/
     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/realisations/comments/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/realisations/comments/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}
}
