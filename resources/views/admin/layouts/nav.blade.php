@if(auth::user()->admin == 1)
<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard pull-right"></i> 
            <span style="margin-right: 12px;">الإعدادات</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/sitesettings')}}"><i class="fa fa-circle-o"></i> تعديل إعدادات الموقع</a></li>
            <li><a href="{{url('adminpanel/slides')}}"><i class="fa fa-circle-o"></i> السلايد</a></li>
          </ul>
        </li>
{{-- users--}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 12px;">الأعضاء</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/users/create')}}"><i class="fa fa-circle-o"></i> إضافة عضو جديد</a></li>
            <li><a href="{{url('adminpanel/users')}}"><i class="fa fa-circle-o"></i> عرض الأعضاء</a></li>
          </ul>
        </li>
{{-- معلومات المؤسسة--}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 12px;">معلومات المؤسسة</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/entreprise/cadres')}}"><i class="fa fa-circle-o"></i> التحكم في الإطارات</a></li>
            <li class="active"><a href="{{url('adminpanel/entreprise/cadres/create')}}"><i class="fa fa-circle-o"></i> إضافة إطار جديد</a></li>
            <li><a href="{{url('adminpanel/entreprise/motdirecteur')}}"><i class="fa fa-circle-o"></i>كلمة المدير</a></li>
            <li><a href="{{url('adminpanel/entreprise/comites')}}"><i class="fa fa-circle-o"></i>لجان الؤسسة</a></li>
            <li><a href="{{url('adminpanel/entreprise/renseign')}}"><i class="fa fa-circle-o"></i>الإعلام والتوجيه</a></li>
          </ul>
        </li>

        {{-- activites--}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 12px;">النشاطات</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/activites/create')}}"><i class="fa fa-circle-o"></i> إضافة نشاط  جديد</a></li>
            <li><a href="{{url('adminpanel/activites')}}"><i class="fa fa-circle-o"></i> عرض النشاطات</a></li>
          </ul>
        </li>
        {{-- realisations--}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 12px;">الإنجازات</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/realisations/create')}}"><i class="fa fa-circle-o"></i> إضافة إنجاز جديد</a></li>
            <li><a href="{{url('adminpanel/realisations')}}"><i class="fa fa-circle-o"></i> عرض الإنجازات</a></li>
          </ul>
          
        </li>
        {{-- contacts --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope pull-right"></i> 
            <span style="margin-right: 12px;">رسائل الموقع</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{url('adminpanel/contacts')}}"><i class="fa fa-circle-o"></i> كل الرسائل</a></li>
          </ul>
          
        </li>

        {{-- news --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit pull-right"></i> 
            <span style="margin-right: 12px;">التحكم في الاخبار</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/news/create')}}"><i class="fa fa-circle-o"></i> إضافة خبر جديد</a></li>
            <li><a href="{{url('adminpanel/news')}}"><i class="fa fa-circle-o"></i> كل ألاخبار</a></li>
          </ul>
          
        </li>


        {{-- specialites --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 12px;">التحكم في التخصصات</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="active"><a href="{{url('adminpanel/specialites/create')}}"><i class="fa fa-circle-o"></i> إضافة تخصص جديد </a></li>
            <li><a href="{{url('adminpanel/specialites')}}"><i class="fa fa-circle-o"></i> كل التخصصات</a></li>
            <li class="active"><a href="{{url('adminpanel/actuelspecialites/create')}}"><i class="fa fa-circle-o"></i> إضافة تخصص حالي </a></li>
            <li><a href="{{url('adminpanel/actuelspecialites')}}"><i class="fa fa-circle-o"></i> كل التخصصات الحالية</a></li>
          </ul>
          
        </li>
        {{-- offres et sessions --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 12px;">التحكم في الدورات و عروض التكوين</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/sessions/create')}}"><i class="fa fa-circle-o"></i> إضافة دورة جديدة</a></li>
            <li><a href="{{url('adminpanel/sessions')}}"><i class="fa fa-circle-o"></i> كل الدورات</a></li>
            <li class="active"><a href="{{url('adminpanel/offres/create')}}"><i class="fa fa-circle-o"></i> إضافة عرض جديد</a></li>
            <li><a href="{{url('adminpanel/offres')}}"><i class="fa fa-circle-o"></i> كل العروض</a></li>
          </ul>
          
        </li>
         {{-- inscriptions --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 12px;">التحكم في التسجيلات الأولية</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/inscriptions/create')}}"><i class="fa fa-circle-o"></i> إضافة تسجيل أولي جديد</a></li>
            <li><a href="{{url('adminpanel/inscriptions')}}"><i class="fa fa-circle-o"></i> كل التسجيلات</a></li>
          </ul>
          
        </li>
        {{-- resultats --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 25px;">التحكم في نتائج المتربصين</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{url('adminpanel/results')}}"><i class="fa fa-circle-o"></i> إظهار النتائج</a></li>
          </ul>
          
        </li>
        {{-- modules inscriptions --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 12px;">التحكم في المقاييس حسب التخصص</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class="active"><a href="{{url('adminpanel/modulespecialites/create')}}"><i class="fa fa-circle-o"></i> إضافة الأحجام الساعية والمعاملات</a></li>
            <li><a href="{{url('adminpanel/modulespecialites')}}"><i class="fa fa-circle-o"></i> معلومات المقاييس حسب السداسي</a></li>
          </ul>
          
        </li>
        {{-- documents adminstratif --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book pull-right"></i> 
            <span style="margin-right: 25px;">التحكم في الوثائق الإدارية</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/documents/create')}}"><i class="fa fa-circle-o"></i> إضافة وثيقة إدارية</a></li>
            <li><a href="{{url('adminpanel/documents')}}"><i class="fa fa-circle-o"></i> عرض الوثائق</a></li>
          </ul>
          
        </li>
        @endif
        @if(auth::user()->admin == 1)
        
        {{-- documents professeur --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user pull-right"></i> 
            <span style="margin-right: 12px;">التحكم في الدروس</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
              <div class="clearfix"></div>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('adminpanel/'.auth::user()->id.'/cours/create')}}"><i class="fa fa-circle-o"></i> إضافة درس جديد</a></li>
            <li><a href="{{url('adminpanel/'.auth::user()->id.'/cours')}}"><i class="fa fa-circle-o"></i> كل الدروس</a></li>
          </ul>
          
        </li>
        @endif
