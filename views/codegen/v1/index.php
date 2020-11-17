<?php include_once __DIR__.'/head.php'; ?>
<div class="wrapper" id="app" :is="$route.meta.layout">
</div>
<!-- <link href='https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css' rel='stylesheet'> -->
<script src='https://unpkg.com/axios/dist/axios.min.js'></script>
<?php 
  $url = $this->server->root.'/views/'.$this->viewpath;
  $viewpath = $this->server->root.$this->viewpath;
  $url = replaceslag($url);
  $viewpath = replaceslag($viewpath);
?>
<script>
  var databases = <?=json_encode($databases)?>;
  var dbs = <?=json_encode($dbs)?>;
  var dbname = <?=json_encode($dbname)?>;
  var routepath = '<?=$viewpath?>';
</script>
<script type='module' src="<?=$url?>/main.js"></script>
<?php include_once __DIR__.'/footer.php'; ?>