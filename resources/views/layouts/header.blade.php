

<div class="header">
  
     
    <div  class="tophead">

      
       <span><?php 
   date_default_timezone_set('Africa/Algiers');
   echo date("Y-m-d");
       ?></span>
     
        <span>
          @if (Auth::guest())
                            <a href="{{ url('/login') }}">تسجيل الدخول </a>
                            <a href="{{ url('/register') }}">عضو جديد</a>
                        @else
                            
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
             مرحبا {{ Auth::user()->name }} 
          </a>

         
                  <a href="{{ url('/wel') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      تسجيل الخروج
                  </a>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              
                        @endif
      </span>
     
      <span  style="margin-right:10px"><i class="fa fa-phone"></i> {{getsetting('telephone')}}</span>
      <span ><i class="fa fa-send"></i> {{getsetting('email')}}</span>
      
    </div>
   <!-- video back -->
   <div class="backtop">
   <div class="parag">
   <p class="p1" style="color: #fff">المعهد الوطني المتخصص في التكوين المهني <span style="color: #fff"> سماتي محمد بن العابد</span></p>
    <p class="p2" style="color: orange"> مستقبل واعد لشباب واعد</p>
   </div>
   </div>
  
  </div>
  
  </div>

<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>   
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{URL :: to('/')}}" >الرئيسية</a></li>
        <li class="dropdown" >
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">التعريف بالمؤسسة <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL :: to('/entreprises/motdirect')}}">كلمة السيد المدير</a></li>
            <li><a href="{{URL :: to('/entreprises/historique')}}" >نبذة عن المؤسسة</a></li>
            <li><a href="{{URL :: to('/entreprises/organ/')}}">المخطط التنظيمي للمؤسسة</a></li>
            <li><a href="{{URL :: to('/cadres')}}">إطارات المؤسسة</a></li>
            <li><a href="{{URL :: to('/entreprises/comites/')}}">لجان المؤسسة</a></li>
            <li><a href="{{URL :: to('/entreprises/reception/')}}">الإعلام والتوجيه</a></li>

          </ul>
        </li>


       <li class="dropdown" >
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">التخصصات وعروض التكوين <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL :: to('/actualspecialites')}}">التخصصات الحالية</a></li>
            <li><a href="{{URL :: to('/offres')}}" >عروض التكوين الجديدة</a></li>
            
          </ul>
        </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> التسجيل  الإلكتروني<span class="caret"></span></a>
       <ul class="dropdown-menu">
       <li>
          <a href="{{ URL :: to('/inscriptions')}} " data-visit="inscriptions"> تسجيل جديد</a></li>
          <li>
          <a href="{{ URL :: to('/inscriptions/login')}} " data-visit="inscriptions">تعديل بيانات التسجيل</a></li>
  </ul>
          </li>



         <li class="dropdown" >
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">أعمال المعهد <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL :: to('/activites')}}">النشاطات</a></li>
            <li><a href="{{URL :: to('/realisations')}}" >إنجازات المتربصين</a></li>
            
          </ul>
        </li>

        <li class="dropdown" >
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">فضاء المعهد <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL ::to('/coursprof')}}">دروس الأستاذ</a></li>


           <li class="dropdown-submenu" >
          <a href="#" class="test" tabindex="-1"> فضاء المتربص<span class="caret"></span></a>
          <ul class="dropdown-menu">
           
            <li><a  tabindex="-1" href="{{URL :: to('/stagiaires/emplois-temps')}}" >التوزريع الزمني الدراسي
      </a></li>
            <li><a tabindex="-1" href="{{URL :: to('/stagiaires/login')}}" >نتائج المتلربصين
      </a></li>
          </ul>
        </li>

          


            <li><a href="{{URL :: to('/documents')}}" >الوثائق والقوانين التنظيمية
      </a></li>
          </ul>
        </li>
             <li><a href="{{ URL :: to('/news')}} <?php   ?>">الاخبار</a></li>
             
              
        <li><a href="{{url('/contact')}}" >اتصل بنا</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-left" style="list-style-type: none">

      
                        <!-- Authentication Links -->
                        
                  

        
      </ul>
    </div>
  </div>
</nav>
