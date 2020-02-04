<footer>


          <div class="container">
            <div class="row">
              <div class="col-md-4 marg" >
                <h5 class="white-text">خريطة الموقع</h5>
                <ul>
                  <li><a class="" href="{{url('/')}}">الرئيسية</a></li>
                  <li><a class="" href="{{url('/quinous')}}">من نحن</a></li>
                  <li><a class="" href="{{('/contact')}}"اتصل بنا</a></li>
                  <li><a class="" href="{{('/prive')}}">سياسة الخصوصية</a></li>
                  
                </ul>
              </div>

              <div class="col-md-4 marg">
                <h5 class="">العناوين:</h5>
                <span class=""><i class="fa fa-envelope"></i>  contact@insfsmati.com</span><br><br>
                <span class=""><i class="fa fa-phone"></i> {{getsetting('telephone')}}</span>
              </div>

              <div class="col-md-4 marg">
              <h5 class="">القائمة البريدية  </h5>
              <form class="">
              <div class="input-field">
              <label for="email" data-error="wrong email" >البريد الإلكتروني</label>
          <input id="email" type="email" class="validate" >
          
           
           <button class="btn btn-success" type="submit" name="action"><i class="fa fa-envelope"></i> اشترك
     
  </button>
  </form>
              </div>
            </div>
          
          <div class="row">
          
         
           <div class="col-xs-7 col-offset-xs-3">
        
                    <ul class="social-network social-circle">
                        <li><a href=#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href=""www.facebook.com/insfpmati" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="www.youtube.com/insfpmati" class="icoGoogle" title="Google +"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>       
        
      </div>
      <div class="clearfix"></div>
          <div class="col-xs-12 text-center">
          <div id="copyright">
           <p> &copy; 2017-<?php echo date("Y");?>
 كل الحقوق محفوظة</p> </div>
<p> تصميم الموقع من طرف:<a href="www.tasmimdzweb.com">تصميم واب</a></p>
            
           
          
          </div>
          </div>
</div>
          
    </footer>
