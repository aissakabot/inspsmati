<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function index(){
    	$slides=Slide::all();
    	return view('admin.slides.index',compact('slides'));

}
  
 public function create(){
 	return view('admin.slides.add');
 }  

public function store(Request $request){

$rules = [
            'titre'=>'required|min:5|max:150',
            
            'texte'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            
           

          

        ];
        $messages=[
           'titre.required'=>'يجب ادخال قيمة لهذا الحقل',
           'texte.required'=>'يجب ادخال قيمة لهذا الحقل',
           'titre.min'=>'ادخل على الأقل 25 حرفا',
           'image.required'=>'يجب ادخال قيمة لهذا الحقل',
           'image.image'=>'يجب اختيار ملف صورة(jpg,jpeg,png)',
           'image.max'=>'حجم الملف لا يتجاوز 2m',
           
        ];

        $this->validate($request, $rules, $messages);

  	$titre=$request->titre;
        
        $texte=$request->texte; 
        $button=$request->button;
       
        $destPathIm='images';
        
        
        if ($request->hasFile('image')){
            
        
        $photo=$request->file('image');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
        }
        $slide=new Slide;
        $slide->titre=$titre;
         $slide->button=$button;
         $slide->texte=$texte;
          
           
            
        $slide->image=$fileim;
        $slide->save();
  	return redirect('/adminpanel/slides')->withFlashMessage('تمت عملية  النشاط بنجاح');

  }


public function edit($id){
   	$slide=Slide::findOrFail($id);
   	return view('admin.slides.edit',compact('slide'));

   }
   public function changeimage(Request $request){
   	$id=$request->slide_id;

   	$slide=Slide::findOrFail($id);
   	$destPathIm='images';
        $photo=$request->file('image2');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
       

        $slide->fill(['image'=>$fileim])->save();
        return back()->withFlashMessage('تم تعديل الصورة بنجاح');
   }

   public function update(Request $request,$id){
   	$slide=Slide::findOrFail($id);
   	$slide->fill($request->all())->save();
   	return back()->withFlashMessage('نم تعديل اسلايد بنجاح');

   }

   public function delete($id){

   	$slide=Slide::findOrFail($id);
  
   	$slide->delete();
   	return back()->withFlashMessage('تم حذف السلايد بنجاح');
   }


}
