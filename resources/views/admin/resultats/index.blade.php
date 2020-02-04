@extends('admin.layouts.main')
@section('title')
التحككم في نتائج المتربصينة
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')
<section class="content-header">
      <h1>
       التحككم في نتائج المتربصين
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active"><a href="{{url('/adminpanel/results')}}">التحككم في النتائج</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تسيير التسجيلات الأولية</h3>
              <span><a href="{{url('adminpanel/resus/import')}}" class="btn btn-info">استيراد نتائج المتربصين</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>رقم التسجيل</th>
                  <th>الاسم</th>
                  <th>اللقب</th>
                  
                  <th>السداسي</th>
                  <th>التخصص</th>
                  <th>معدل الشامل</th>
                  <th>نتيجة الشامل</th>
                  <th>معدل الاستدراكي</th>
                  <th>نتيجة الاستدراكي</th>
                  
                  <th>التحكم</th>
                </tr>
                </thead>

                <tbody>
                
                </tbody>

                <tfoot>
                <tr>
                  <th>#</th>
                  <th>رقم التسجيل</th>
                  <th>الاسم</th>
                  <th>اللقب</th>
                  
                  <th>السداسي</th>
                  <th>التخصص</th>
                  <th>معدل الشامل</th>
                  <th>نتيجة الشامل</th>
                  <th>معدل الاستدراكي</th>
                  <th>نتيجة الاستدراكي</th>
                 
                  <th>التحكم</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection



@section('script')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">


 

  var table = $('#data').DataTable({
    
      serverSide: true,
      ajax: '{{ url('/adminpanel/results/data') }}',
      columns: [
          {data: 'id', name: 'id'},
          {data: 'numinscrit', name: 'numinscrit'},
          {data: 'nom', name: 'nom'},
          {data: 'prenom', name: 'prenom'},
           {data: 'soum', name: 'soum'},
            {data: 'specialite', name: 'specialite'},
            {data: 'moy_sun', name: 'moy_sun'},
            {data: 'res_sun', name: 'res_sun'},
            {data: 'moy_ratt', name: 'moy_ratt'},
            {data: 'res_ratt', name: 'res_ratt'},
             
          
        /*  {data:'admin',name:'admin'},*/
         
          {data: 'control', name:'control',serachable:false,orderable:false}
      ],
      "language": {
          "url": "{{ Request::root()  }}/admin/custom/Arabic.json"
      },
      "stateSave": false,
      "responsive": true,
      "order": [[0, 'desc']],
      "pagingType": "full_numbers",
      aLengthMenu: [
          [25, 50, 100, 200, -1],
          [25, 50, 100, 200, "All"]
      ],
      iDisplayLength: 25,
      fixedHeader: true
  });

 

  

</script>
@endsection


