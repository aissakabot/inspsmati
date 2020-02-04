<div class="menu menumat">
@foreach($mats as $module )
<li class="module">{{$module->module}}</li>

@endforeach
</div>
<div id="listemodule">
</div>

<script type="text/javascript">
	$(".module").click(function(){
var mod=$(this).text();

		$.ajax({
        type: 'get',
        dataType:'html',
                 url:  '<?php echo url("coursprof/affiche/module") ?>/'+mod,
        data: "mod=" + mod ,
        success: function (res) {
        
        
             $("#listemodule").html(res);
                       }
    });
	})
</script>