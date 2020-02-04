@extends('admin.layouts.main')
@section('title')
قائمة اللجان
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/buttons.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/jquery.dataTables.min')}}">
@endsection

@section('content')
<section class="content-header">
      <h1>
        التحكم في لجان المؤسسة
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active"><a href="{{url('/adminpanel/entreprise/comites')}}">التحكم في لجان المؤسسة</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{route('comites.create')}}" class="btn btn-default"> لجنة ةجديــد</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>الوصف</th>
                  
                  <th>تاريخ البداية</th>
                  <th>تاريخ النهاية</th>
                  <th>تاريخ الإضافة</th>
                  <th>التحكم</th>
                </tr>
                </thead>

                <tbody>
                
                </tbody>

                <tfoot>
                <tr>
                 <th>#</th>
                  <th>الإسم</th>
                  <th>الوصف</th>
                  
                  <th>تاريخ البداية</th>
                  <th>تاريخ النهاية</th>
                  <th>تاريخ الإضافة</th>
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

<script src="{{asset('admin/plugins/datatables/datatables.buttons.min.js')}}"></script>

<script src="{{asset('admin/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/buttons.flash.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/plugins/datatables/vfs_fonts.js')}}"></script>
   <script type="text/javascript" src="{{asset('admin/plugins/datatables/jszip.min.js')}}"></script>




<script type="text/javascript">
/*
	      var lastIdx = null;

  $('#data thead th').each( function () {
      if($(this).index()  < 4 ){
          var classname = $(this).index() == 6  ?  'date' : 'dateslash';
          var title = $(this).html();
          $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
      }else if($(this).index() == 4)
      {
          $(this).html( '<select><option value="0"> عضو </option><option value="1"> مدير الموقع </option></select>' );
      }

  } );*/

  var table = $('#data').DataTable({
      processing: true,
      serverSide: true,
      
         
      ajax: '{{ url('/adminpanel/entreprise/comites/data') }}',
      columns: [
          {data: 'id', name: 'id'},
          {data: 'libelle', name: 'libelle'},
          {data: 'descrip', name: 'descrip'},
          {data: 'datedebut', name: 'datedebut'},
          {data: 'datefin', name: 'datefin'},
          {data: 'created_at', name: 'created_at'},
        /*  {data:'admin',name:'admin'},*/
         
          {data: 'control', name:'control'}
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

      "oTableTools": {
          "aButtons": [


              {
                  "sExtends": "csv",
                  "sButtonText": "ملف اكسل",
                  "sCharSet": "utf16le"
              },
              {
                  "sExtends": "copy",
                  "sButtonText": "نسخ المعلومات",
              },
              {
                  "sExtends": "print",
                  "sButtonText": "طباعة",
                  "mColumns": "visible",


              }
          ],

          "sSwfPath": "{{ Request::root()  }}/admin/custom/swf/copy_csv_xls_pdf.swf"
      },

      "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
      ,initComplete: function ()
      {

          var r = $('#data tfoot tr');
          r.find('th').each(function(){
              $(this).css('padding', 8);
          });
          $('#data thead').append(r);
          $('#search_0').css('text-align', 'center');
      },
      dom: 'Bfrtip',
        buttons: [
            'print','excel','pdf','copy'
        ]

  });



  

</script>
@endsection


