<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addUserRequestAdmin;
use App\User;
use Yajra\Datatables\DataTables;
class UserController extends Controller
{
    //
    public function  index(){
    	
    	return view('admin.users.index');
    }
    
    public function  affiche(){
      
      return view('admin.users.index2');
    }

    public function  create(){
    	return view('admin.users.add');
    }

   public function store(addUserRequestAdmin $request,User $user) {

    
   	 $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
             'admin' => $request['admin'],
            'password' => bcrypt($request['password']),
        ]);
   	 return redirect('/adminpanel/users')->withFlashMessage('تمت إضافة عضو بنجاح');
   }

   public function edit($id){
   	$user=User::findOrFail($id);
   	return view('admin.users.edit',compact('user'));

   }

   public function update(Request $request,$id){
   	$user=User::findOrFail($id);
   	$user->fill($request->all())->save();
   	return back()->withFlashMessage('نم تعديل العضو بنجاح');

   }
   public function updatepassword(Request $request){
   	$user=User::findOrFail($request->user_id);

   	$pass=bcrypt($request->password);
   	$user->fill(['password'=>$pass])->save();
  
   	return back()->withFlashMessage('تم تعديل كلمة المرور بنجاح');
   }
   
   public function delete($id){

   	$user=User::findOrFail($id);
    if ($user->id != 1){
   	$user->delete();
   	return back()->withFlashMessage('تم حذف العضو بنجاح');
   }
   else{
    return back()->withFlashMessage('لا يمكن حذف العضو');
   }
   }

   public function anyData(){
     $users=User::all();
     return DataTables::of($users)
    
     ->editColumn('name',function($model){
      return \Html::Link('/adminpanel/users/'.$model->id.'/edit',$model->name);
     })

     ->editColumn('admin',function($model){
      return $model->admin == 0 ? '<span class="badge badge-info">عضو</span>' : '<span class="badge badge-warning">مدير الموقع</span>';
    
     })

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/users/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      if($model->id != 1){
      $all .='<a href="'.url('/adminpanel/users/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      }
      return $all;
   })
     ->make(true);
}


 public function anyData1(){
     $users=User::all();
     return DataTables::of($users)
     
     /*
     ->editColumn('admin',function($user){
      return $user->admin == 0 ? '<span class="badge badge-info">عضو</span>' : '<span class="badge badge-warning">مدير الموقع</span>';
    
     })*/
     ->addColumn('control',function($user){
      $all='<a href="'.url('/adminpanel/users/'.$user->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      if($user->id != 1){
      $all .='<a href="'.url('/adminpanel/users/'.$user->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      }
      return $all;
   })
     
     ->make(true);
}
}