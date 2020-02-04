@extends('layouts.main')
@section('title')
قائمة عمال المعهد
@endsection
@section('style')
<style type="text/css">
	

	.histo{
font-weight: 700;

}
.histo h2{
	text-transform: uppercase;
	padding-top:40px;
	padding-bottom: 50px;
	color:#333;
	font-weight: bolder;
}
	.titre{
		color:green;
		font-size: 16px;
		font-weight: bold;
	}
	.titre1{
		color:red;
		font-size: 16px;
		font-weight: bold;
	}
	.entrep{
  margin-top:120px;
  font-family: 'Changa', sans-serif;
 
  
}
aside{
	margin-top:50px;
	background-color: #fff;
	padding-bottom: 40px;
	padding-top: 40px;

	
}
aside ul{
list-style: none;


}
aside ul li{
	list-style-type: none;
	display: block;
	width:80%;
	height: 50px;
	background-color: #11b7e6;
	color: #fff;
	font-size: 15px;
	font-weight: bold;
	margin-bottom: 15px

}
aside ul li a{
	text-decoration: none;
	color: #fff;
}
aside ul li:hover a{
	background-color: #ccc
	color: #fff;
}

</style>
@endsection


@section('content')
<div class="container">
<div class="row">
<div class="col-sm-3">
<aside>
<ul>
<li class="wow rotateInDownRight" data-wow-delay="1s"><a href="{{url('entreprises/motdirect')}}">كلمة السيد المدير </a></li>
<li class="wow rotateInDownRight" data-wow-delay="1.2s"><a href="{{url('cadres')}}">إطارات المؤسسة </a></li>
<li class="wow rotateInDownRight" data-wow-delay="1.4s"><a href="{{url('entreprises/histo')}}"> نبذة عن المؤسسة</a></li>
<li class="wow rotateInDownRight" data-wow-delay="1.6s"><a href="{{url('entreprises/comites')}}"> لجان المؤسسة</a></li>
<li class="wow rotateInDownRight" data-wow-delay="1.8s"><a href="{{url('entreprises/reception')}}">الاستقبال والتوجيه </a></li>
<li class="wow rotateInDownRight" data-wow-delay="2s"><a href="{{url('news')}}"> أخبار المؤسسة</li>

</ul>
</aside>
</div>
<div class="col-sm-9">
<div class="histo">
<div class="container">
<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s"> <h2 class="text-center" >بطـــــاقة تقنيــــة للمؤسسة</h2></div>

<p>
<span class="titre">التسمية:</span> مركز التكوين المهني والتمهين مزروع الطاهر بن محمد سيدي خالد ولاية بسكرة</p>
<p><span class="titre">مرجع الإنشاء :</span> مرسوم رقم 97/160 بتاريخ 10/05/1997  م</p>
<p><span class="titre">العنوان :</span> شارع خليفة أحمد سيدي خالد</p>
<p><span class="titre">الهاتف والفاكس :</span> 04 94 67 033</p>
<p><span class="titre">البريد الإلكتروني :</span> cfpasidikhaled@mefp.gov.dz</p>
<p><span class="titre">تاريخ أول دفعة :</span> 19/09/1998 م</p>
<p><span class="titre">المساحة : </span> 12831  م2 المساحة المغطاة :3597 م2 </p>
<p><span class="titre">قدرة الاستيعاب النظرية : </span> 250 متربص +150 طاقة إستعاب في التوسعة الجديدة </p> 
<p><span class="titre">الهياكل البيداغوجية </span></p>
<p><span class="titre1">1-	الهياكل البيداغوجية القديمة :</span> </p>
<p><span class="titre">عدد الورشات :</span> 05 (الطلاء،التركيب الصحي ،السيراميك، التبريد، الطبخ )</p>
<p><span class="titre">عدد قاعات التدريس المتخصصة :</span> 03( البلاط والفسيفساء، الخياطة، حلاقة السيدات )</p>
<p><span class="titre">عدد قاعات التدريس : </span> 04 (منهم حجرتين للتمهين )</p>
<p><span class="titre1">2-	التوسعة الجديدة : </span></p>
<p><span class="titre">الطابق السفلي : </span> * ورشتان ( الخياطة، كهرباء السيارات )</p>
                   * حجرة للتدريس  
                   * قاعة للأساتذة  
<p><span class="titre">الطابق العلوي :</span> * قاعتين متخصصتين (إعلام الآلي)</p>
           * حجرتي التدريس
           * مكتبة وميدياتيك 
<p><span class="titre">النادي </span> 01</p>
<p><span class="titre">قاعة النشاطات الثقافية والرياضية:</span> 01</p>
<p><span class="titre">ملعب رياضي :</span> 01</p>
<p><span class="titre">قدرة إستيعال المطعم :</span> 120 نصف داخلي، عدد المستفادين يصل حوالي 160</p>
<p><span class="titre">قدرة إستعاب الداخلية : </span> 60 عدد المستفادين : حسب الطلب ودراسة الملف </p>
<p><span class="titre1">تعداد المواطرين والمستخدمين :</p>
<p><span class="titre">مدير :</span> 01</p>
<p><span class="titre">مقتصد مسير :</span> 01</p>
<p><span class="titre">النواب التقنيين والبيداغوجين :</span> 03</p>
<p><span class="titre">مستشار التوجيه : </span>01</p>
<p><span class="titre">مستخدمي الإدارة :</span> 08</p>
<p><span class="titre">عمال مهنيين : </span> 29 متقاعدين، دائمون:05</p> 
<p><span class="titre">•	أساتذة التكوين المهني :</span> 10</p>
<p><span class="titre">•	أساتذة التكوين المهني درجة 07:</span> 01</p>
<p><span class="titre">•	أساتذة التكوين المهني درجة 02 :</span> 03</p>
<p><span class="titre">العدد الإجمالي لمستخدمي المؤسسة : </span> 70 عامل </p>



</div>

</div>
</div>
</div>

</div>

@endsection


