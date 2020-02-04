@foreach(\App\Realisation::orderby('created_at')->limit(10)->get() as $reali)
<div class="media">
  <div class="media-body">
  <div class="media-left">
    <img src="images/{{$reali->imagerealis}}" alt="{{$reali->imagerealis}}" class="media-object" style="width:60px">
  </div>
    <h4 class="media-heading">{{$reali->titre}}</h4>
    <p>{{str_limit($reali->descrip,50)}}...</p>
  </div>
  
</div>
@endforeach