<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>后台管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="">

<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<style type="text/css">
.input-xxlarge{ margin-bottom: 0px;}
.long{ width: 530px;}
.input-xxlarge1 {margin-bottom: 0px;}
</style>
<script type="text/javascript" src="__PUB__js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUB__js/jquery.min.js"></script>
<script type="text/javascript" src="__PUB__js/globe.js"></script>
<link rel="stylesheet" href="__ROOTPUB__kindeditor/themes/default/default.css" />
<script charset="utf-8" src="__ROOTPUB__kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="__ROOTPUB__kindeditor/lang/zh_CN.js"></script>
<script>
KindEditor.ready(function(K){
		var editor1 = K.editor({
			uploadJson : "<?php echo U('Kind/upload_json');?>",
			fileManagerJson : "<?php echo U('Kind/file_manager_json');?>",
			allowFileManager : true
		});
		K(".edit_image").click(function(){
			var img_id=jQuery(this).attr("varid");
			editor1.loadPlugin("image", function(){
				editor1.plugin.imageDialog({
					imageUrl : K("#"+img_id).val(),
					clickFn : function(url, title, width, height, border, align) {
						K("#"+img_id).val(url);
						jQuery("."+img_id).attr('src',url);
						editor1.hideDialog();
					}
				});
			});
		});

});


</script>
</head>
<body style="margin: 10px 0px;">
<div style="margin:0 auto; width:98%;">

	<table class="table table-condensed table-bordered table-hover">
	<tbody>
		<tr>
			<th colspan="3" style="text-align:center;">系统设置</th>
			<th  width="10%" style="text-align:center;">
				<button class="btn btn-mini url" type="button" style="cursor:pointer;" url="<?php echo U('system',array('add'=>1));?>"><i class="icon-plus"></i> 添加</button>
			</th>
		</tr>
<?php if(($_GET['add']) == "1"): ?><tr>
			<td colspan="4" align="center" style="padding:0">
			<form action="<?php echo U('systemadd');?>" name="configadd" method="post" style="margin:0">
<table cellspacing="0" cellpadding="0" style="width:100%; background-color:#f0f0f0;">
	<tr>
		<td width="100" align="center" valign="middle" style="text-align:center;"><span class='red'>*</span>名称</td>
		<td><input type="text" name="name" style='width:80%' /></td>
		<td width="100" align="center" valign="middle" style="text-align:center;"><span class='red'>*</span>变量名称</td>
		<td><input type="text" name="cfg" style='width:80%' /></td>  
		<td width="100" align="center" valign="middle" style="text-align:center;">参数值</td>
		<td><input type="text" name="content" style='width:80%' /></td>
		<td align="center" valign="middle" style="text-align:center;">参数类型</td>
		<td style="text-align:center;">
			<input type="radio" name="input" value="text" checked/>&nbsp;单行文本&nbsp;&nbsp;
			<input type="radio" name="input" value="textarea"/>&nbsp;多行文本&nbsp;&nbsp;
			<input type="radio" name="input" value="bool"/>&nbsp;布尔(Y/N) &nbsp;&nbsp;
			<input type="radio" name="input" value="image"/>&nbsp;图片
		</td>
	</tr>
	<tr>
		<td width="100" align="center" valign="middle" style="text-align:center;">参数说明</td>
		<td colspan="4"><input type="text" name="description" style='width:80%' /></td>
		<td align="center" valign="middle" style="text-align:center;">排序</td>
		<td style="text-align:center;"><input type="text" name="sort" style='width:30%' /></td>
		<td style="text-align:center;"><input type="submit" name="submit" value=" 保存变量 " class="coolbg np" /></td>
	</tr>
</table>
			</form>
			</td>
		</tr><?php endif; ?>
		
			
		
		
	<form action="" method="post" name="form1">
		<tr>
			<td width="14%" style="text-align:center;">名称</th>
			<td width="30%" style="text-align:center;">参数值</th>
			<td style="text-align:center;">说明</th>
			<td width="10%" style="text-align:center;">排序</th>
		</tr>
		<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td style="text-align:right;"><?php echo ($vo["name"]); ?>：</td>
			<td><?php echo ($vo["form"]); ?></td>
			<td><?php echo ($vo["description"]); ?></td>
			<td><input type="text" name="sort_<?php echo ($vo["sort"]); ?>" value="<?php echo ($vo["sort"]); ?>" style="width:100px"></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>    
  
		<tr>
			<td></td>
			<td colspan="3"><button class="btn btn-large btn-info" type="submit">提交</button></td>
		</tr>
	</form>
	</tbody>
	</table>
</div>

</body>
</html>