

   
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #bb2150;color:#fff">
       
        <h4 class="modal-title" id="myModalLabel">بيانات العامل </h4>
      </div>
      <div class="modal-body">
      <form action="{{url('/adminpanel/inscriptions/'.$num.'/confirm')}}" method="post">
     {{ csrf_field()}}
       <input type="text" class="form-control" placeholder="أضف رقم تسجيل" name="confirmnum">
     
       
      </div>
      <div class="modal-footer" style="background-color: #bb2150;color:#fff">
        <button type="submit"  class="btn btn-info" >تأكيد رقم التسجيل</a>
        
    </div>
    </form>
  </div>
</div>

