<div class="container">
	<row>
		<div class="col-12"><h4 style="color: green; text-align: center;"><?=$msg?></h4></div>
	</row>
</div>



<script language = 'javascript'>
  var delay = 1500;
  setTimeout("document.location.href='<?=$_SERVER['HTTP_REFERER']?>'", delay);
</script>