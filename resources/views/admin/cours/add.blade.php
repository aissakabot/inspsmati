@extends('admin.layouts.main')
@section('title')
إضافة درس جديد
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
       أضافة درس
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/'.auth::user()->id.'/cours')}}">التحكم في الدروس</a></li>
        <li class="active"><a href="{{url('/adminpanel/'.auth::user()->id.'/cours/create')}}">درس جديد </a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف درس جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['url'=>'/adminpanel/'.auth::user()->id.'/cours','method'=>'POST','class'=>'form-horizental','enctype'=>'multipart/form-data']) !!}
           @include('admin.cours.form')
           {!!  Form::close()!!}
            </div>
          </div>
        </div>
      </div>
</section>

@endsection   

@section('script')
<script type="text/javascript">
alert('ffdsfsd');
$('#special').on('change', function() {
var speci=$(this).val();
alert(speci);

		$.ajax({
        type: 'get',
        dataType:'html',
                 url:  '<?php echo url("adminpanel/cours/affichmod") ?>/'+speci,
        data: "speci=" + speci ,
        success: function (res) {
        
        alert('success');
             $("#module").html(res);
                       }
    });
	});

</script>
@endsection