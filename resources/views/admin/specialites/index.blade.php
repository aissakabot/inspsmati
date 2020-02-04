@extends('admin.layouts.main')
@section('title')
التحككم في التخصصات
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')
<section class="content-header">
      <h1>
       التحككم في التخصصات
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active"><a href="{{url('/adminpanel/specialites')}}">التحككم في التخصصات</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تسيير التخصصات</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>رمز التخصص</th>
                  <th>اسم التخصص</th>
                  <th>الشهادة</th>
                  <th>شروط الالتحاق</th>
                  <th>مدة التكوين</th>
                  <th>تاريخ الضافة</th>
                  <th>التحكم</th>
                </tr>
                </thead>

                <tbody>
                
                </tbody>

                <tfoot>
                <tr>
                 <th>#</th>
                  <th>رمز التخصص</th>
                  <th>اسم التخصص</th>
                  <th>الشهادة</th>
                  <th>شروط الالتحاق</th>
                  <th>مدة التكوين</th>
                  <th>تاريخ الضافة</th>
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
      ajax: '{{ url('/adminpanel/specialites/data') }}',
      columns: [
          {data: 'id', name: 'id'},
          {data: 'code', name: 'code'},
          {data: 'intitule', name: 'intitule'},
           {data: 'diplome', name: 'diplome'},
            {data: 'conditionacc', name: 'conditionacc'},
            {data: 'duree', name: 'duree'},
             
          {data: 'created_at', name: 'created_at'},
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


