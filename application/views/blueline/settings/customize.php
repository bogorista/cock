<div id="row">
	
		<div class="col-md-3">
			<div class="list-group">
				<?php foreach ($submenu as $name=>$value):
				$badge = "";
				$active = "";
				if($value == "settings/updates"){ $badge = '<span class="badge badge-success">'.$update_count.'</span>';}
				if($name == $breadcrumb){ $active = 'active';}?>
	               <a class="list-group-item <?=$active;?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$badge?> <?=$name?></a>
	            <?php endforeach;?>
			</div>
		</div>


<div class="col-md-9">
		<div class="alert alert-warning">You need to refresh your broswer after you have saved in order to apply your changes.</div>
        <?php 
        if(!$writable){ ?>
        <div class="alert alert-danger">The css file in './assets/blueline/css/user.css' is not writable. Please give this file 755 or 777 permissions.</div>
        <?php }
        ?>
		<style type="text/css" media="screen">
    #editor { 
        position:relative;
        height:550px;
        width:auto;
        margin:0;
        border-left:1px solid #DDD;
        border-right:1px solid #DDD;
        border-bottom:1px solid #DDD;
        padding: 12px;
background: #FFF;
    }
    .ace_scroller{
        left:53px !important;
    }
</style>

<div class="table-head"><?=$this->lang->line('application_customize');?> CSS <span class="pull-right"><button class="btn btn-primary btn-primary" id="saveeditor"><?=$this->lang->line('application_save');?></button></span></div>

<div id="editor"><?=$css;?></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.5/ace.js" type="text/javascript" charset="utf-8"></script>
       
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
    editor.getSession().setMode("ace/mode/css");

    $('#saveeditor').bind('click',function(e) {
    	$('#css-area').val(editor.getSession().getValue());
    	$('#css_form').submit();
    });

</script>
<?php   
$attributes = array('class' => '', 'id' => 'css_form');
echo form_open_multipart($form_action, $attributes); 
?>	
<textarea style="display:none;" id="css-area" name="css-area"></textarea>
<?php echo form_close(); ?>
	</div></div>  <br clear="both">