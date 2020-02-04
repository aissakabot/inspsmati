@extends('admin.layouts.main')
@section('title')
التحككم في السلايدات
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')
<section class="content-header">
      <h1>
       التحككم في النشاطات
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active"><a href="{{url('/adminpanel/slides')}}">التحككم في السلايد</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تسيير السلايدات</h3>
              <a href="{{route('slides.create')}}" class="btn btn-default"> سلايد جديــد</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @forelse($slides as $slide)
              <div class="col-sm-4">
              <div class="boxslide">
              <img src="{{asset('images/'.$slide->image)}}" style="width:80%;height:200px;" alt="{{$slide->image}}">
              <div class="texte">
               <a href="{{url('/adminpanel/slides/'.$slide->id.'/edit')}}" class="btn btn-info btn-circle"><i class="fa fa-edit"></i> تعديل</a> 
               <a href="{{url('/adminpanel/slides/'.$slide->id.'/delete')}}" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"> حذف</i></a>
              </div>
              </div>
            
              </div>
              @empty
              <div class="alert alert-warning">لا توجد سلايدات</div>
              @endforelse
              <div class="clearfix"></div>
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





	      var lastIdx = null;

  $('#data thead th').each( function () {
      if($(this).index()  < 3  ){
          var classname = $(this).index() == 6  ?  'date' : 'dateslash';
          var title = $(this).html();
          $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
      }else if($(this).index() == 3)
      {
          $(this).html( '<select>'+
             @foreach(typeActivite() as  $key => $acti)
            '<option value="{{$key}}"> {{$acti}} </option>'+
             @endforeach
              '</select>');
      }

  } );

  var table = $('#data').DataTable({
     processing: true,
      serverSide: true,
       dom: 'Bfrtip',
        buttons: [
             'excel'
        ],
      ajax: '{{ url('/adminpanel/activites/data') }}',
      columns: [
          {data: 'id', name: 'id'},
          {data: 'title', name: 'title'},
          {data: 'texte', name: 'texte'},
           {data: 'typeact', name: 'typeact'},
           
             
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
          [10,25, 50, 100, 200, -1],
          [10,25, 50, 100, 200, "All"]
      ],
      iDisplayLength: 10,
      fixedHeader: true
  });

 

  

</script>
<script type="text/javascript">
/*
  alert("reqy");
$('#data').DataTable( {
  
    
        dom: 'Bfrtip',
        buttons: [
             'excel'
        ]
    } );
  
*/
</script>
@endsection


