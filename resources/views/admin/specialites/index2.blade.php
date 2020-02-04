@extends('admin.layouts.main')
@section('title')
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/jquery.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')
<section class="content-header">
      <h1>
        التحكم في الأعضاء
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active"><a href="{{url('/adminpanel/users')}}">التحكم في الأعضاء</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>البريد الإلكتروني</th>
                  <th>تاريخ الإضافة</th>
                  
                  <th>control</th>
                </tr>
                </thead>

                <tbody>
                
                </tbody>

                <tfoot>
                <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>البريد الإلكتروني</th>
                  <th>تاريخ الإضافة</th>
                   
                 <th>control</th>
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

     $('#data thead th').each( function () {
      if($(this).index()  < 4 ){
          var classname = $(this).index() == 6  ?  'date' : 'dateslash';
          var title = $(this).html();
          $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
      }else if($(this).index() == 4){
          $(this).html( '<select><option value="0"> عضو </option><option value="1"> مدير الموقع </option></select>' );
      }

  } );

	     $('#data').DataTable({
     processing:true,
      serverSide: true,
      ajax: '{{ url('/adminpanel/users/ajax') }}',
      columns: [
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'created_at', name: 'created_at'},
          /* {data:'admin',name:'admin'},*/
          {data:'control',name:''}          
         
          
      ],
      "language": {
          "url": "{{ Request::root()  }}/admin/custom/Arabic.json"
      },
      "stateSave": false,
      "responsive": true,
      "order": [[0, 'desc']],
      "pagingType": "full_numbers",
      aLengthMenu: [
          [10,25, 50, 100, 200, -1],
          [10,25, 50, 100, 200, "All"]
      ],
      iDisplayLength: 10,
      fixedHeader: true,
      initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    column.search($(this).val(), false, false, true).draw();
                });
            });
        }

    });

</script>
@endsection


