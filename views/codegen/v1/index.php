<?php include_once __DIR__.'/head.php'; ?>
<div class="wrapper" id="app" :is="$route.meta.layout">
</div>
<link href="/dist/css/tailwind.min.css" rel="stylesheet">
<script src='https://unpkg.com/axios/dist/axios.min.js'></script>
<!-- <script src='https://unpkg.com/vue2-datepicker@3.8.1/index.min.js'></script> -->

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-quill-editor@3.0.6/dist/vue-quill-editor.js"></script>
<link href="https://cdn.quilljs.com/1.3.4/quill.core.css" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.4/quill.bubble.css" rel="stylesheet">

<?php 
  $url = $this->server->root.'/views/'.$this->viewpath;
  $viewpath = $this->server->root.$this->viewpath;
  $url = replaceslag($url);
  $viewpath = replaceslag($viewpath);
?>
<script>
  var databases = <?=json_encode($databases)?>;
  var dbs = <?=json_encode($dbs)?>;
  var dbsjson = <?=json_encode($dbsjson)?>;
  var dbname = <?=json_encode($dbname)?>;
  var routepath = '<?=$viewpath?>';
</script>
<script type='module' src="<?=$url?>/main.js"></script>
<?php include_once __DIR__.'/footer.php'; ?>
<script>
    // window.addEventListener('devtoolschange', function(e) {
    //     console.log('is DevTools open?', e.detail.open);
    //     alert('console.is.open');
    // });
</script>
<style>
  
  tr.hide-table-padding td {
   padding: 0;
  }

  .expand-button {
    position: relative;
  }
  
  .accordion-toggle .expand-button:after
  {
    position: absolute;
    left:.0px;
    top: 12px;
    transform: translate(0, -50%);
    content: '-';
    }
  .accordion-toggle.collapsed .expand-button:after
  {
    content: '+';
  }

  input[type=checkbox] {
         position: relative;
	       cursor: pointer;
  }
  input[type=checkbox]:before {
         content: "";
         display: block;
         position: absolute;
         width: 25px;
         height: 25px;
         top: 0;
         left: 0;
         border: 2px solid #555555;
         border-radius: 3px;
         background-color: white;
  }
  input[type=checkbox]:checked:after {
          content: "";
          display: block;
          width: 10px;
          height: 20px;
          border: solid black;
          border-width: 0 2px 2px 0;
          -webkit-transform: rotate(45deg);
          -ms-transform: rotate(45deg);
          transform: rotate(45deg);
          position: absolute;
          top: 0px;
          left: 8px;
  }

  .dropdown-item.active, .dropdown-item:active {
      color: #fff;
      text-decoration: none;
      background-color: #007bff;
      height: 45px;
  }


  .dropdown-item:focus, .dropdown-item:hover {
      color: #16181b;
      text-decoration: none;
      background-color: #d0dce8;
      height: 45px;
  }

  td {
      white-space: nowrap;
  }
  
  input[type="text"] {

element.style {
    height: 62px;
    width:min-content;
    min-width:40px;
    box-sizing: border-box;
    -webkit-box-sizing:border-box;
    -moz-box-sizing: border-box;
  }

</style>