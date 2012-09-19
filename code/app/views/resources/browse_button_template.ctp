<div id = "div_key1">render img tag here</div>

<input type="text" id = "txt_key1" value="" size="100" /> 
<input type="button" id = "btnBrowse1" value="Browse" />

<input type="text" id = "txt_key2" value="" size="100" /> 
<input type="button" id = "btnBrowse2" value="Browse" />
  
<?php 
    $rootUrl = str_replace('/'.$this->params['url']['url'],'',Helper::url(null,true));    
    
    $browseUrl = $rootUrl."/admin/resources/browse"; // Browse image only
    $browseUrl = $rootUrl."/admin/resources/adv_browse"; // Browse image and flash
?>
<script>    
  jq(document).ready(function(){
   jq("#btnBrowse1").click(function(event)
   {            
       window.open ("<?php echo $browseUrl."/key1" ?>", "mywindow", "toolbar=no,menubar=no,scrollbars=yes");
   });
   jq("#btnBrowse2").click(function(event)
   {            
       window.open ("<?php echo $browseUrl."/key2" ?>", "mywindow", "toolbar=no,menubar=no,scrollbars=yes");
   });
 });
</script>