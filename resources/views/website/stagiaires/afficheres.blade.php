@if(!empty($resu))
<p class="texteaffiche"><span class="texte">معدل الشامل:</span>{{$resu->moy_sun}}</p>
<p class="texteaffiche"><span class="texte">ملاحظة الشامل:</span>{{$resu->res_sun}}</p>
<p class="texteaffiche"><span class="texte">معدل الاستدراكي:</span>{{$resu->moy_ratt}}</p>
<p class="texteaffiche"><span class="texte">ملاحظة الاستدراكي:</span>{{$resu->res_ratt}}</p>
@else
<div class="alert alert-danger">
لا توجد نتائج لهذا السداسي
</div>
@endif


