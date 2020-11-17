<?php include_once __DIR__.'/head.php'; ?>
<div class="wrapper" id="app" :is="$route.meta.layout">
</div>
<!-- <link href='https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css' rel='stylesheet'> -->
<script src='https://unpkg.com/axios/dist/axios.min.js'></script>
<script>
  var databases = <?=json_encode($databases)?>;
  var dbs = <?=json_encode($dbs)?>;
  var dbsjson = <?=json_encode($dbsjson)?>;
  var dbname = <?=json_encode($dbname)?>;
  var routepath = '<?=$this->server->root.$this->viewpath?>';
</script>
<?php 
  $url = $this->server->root.'/views/'.$this->viewpath;
  $url = str_replace(['//'],'/',$url);
?>
<script type='module' src="<?=$url?>/main.js"></script>
<?php include_once __DIR__.'/footer.php'; ?>