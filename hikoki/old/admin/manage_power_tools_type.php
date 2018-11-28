<?php include ('includes/header.php'); ?>
<?php include_once ('includes/connection.php'); ?>
<?php 
	// Get all banners
	$a = new PowerToolsType;
	$types =  $a->getTypes();
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Power Tools Type <small>Add / Remove the power tools type</small></h1>
		</div>
	</div>
	</br>
	<div class="row">
		<form name="addPowerToolsType" class="form-horizontal myform" action="manage_power_tools_type_action.php" method="POST" enctype="multipart/form-data" >
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Name (EN)</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="nameEnglish" placeholder="Name in English">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Name (TH)</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="nameThai" placeholder="ชื่อภาษาไทย">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Order Number</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" name="orderNumber" placeholder="ลำดับการแสดง เช่น 1">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Image</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control" id="banner-text" disabled>
		      <label class="btn btn-default btn-file">
				  Browser <input type="file" name="bannerFile" id="banner-file" style="display: none;">
				</label>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input type='hidden' name='action_type' value='addType' />
		    	<input type='hidden' name='id' value='' />
		      <button type="submit" class="btn btn-default">Add new type</button>
		    </div>
		  </div>
		</form>
		<form style="display: none;" class="deleteform" action="manage_power_tools_type_action.php" method="POST"  >
			<input type='hidden' name='action_type' value='addType' />
			<input type='hidden' name='id' value='' />
		</form>      
			
	</div>
	<div class="row">
		<?php
			if (is_array($types) || is_object($types))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr><th>Image</th><th>Name (EN)</th><th>Name (TH)</th><th>Order Number</th><th></th></tr>";
				foreach ($types as $result) {

					echo "<tr typeid='".$result['id']."'>";
					echo "<td><img src='".$result['admin_image_dir']."'/></td>";
					echo "<td class='nameen'>".$result['type_name_en']."</td>";
					echo "<td class='nameth'>".$result['type_name_th']."</td>";
					echo "<td class='ordernum'>".$result['order_id']."</td>";
					echo "<td><input  type='button' class='btn btn-info update-btn' value='Update'/>&nbsp;&nbsp;&nbsp;";
					echo "<input type='hidden' name='typeid' value='".$result['ID']."' />";
					echo "<input type='hidden' name='imagesrc' value='".$result['admin_image_dir']."' />";
					echo "<input type='button' class='btn btn-danger delete-btn' value='Delete'/>";

					echo "</td></tr>";
				}
				echo "</table>";
			}
		?>
		
	</div>

	</hr>
</div>
<script>
	window.onload = function() {
		var index = {
			init: function() {
				var banner = document.getElementById("banner-file");
				banner.addEventListener("change", function(){
					document.getElementById("banner-text").value = banner.value;
				});
				$(".myform").submit(function() {
				   // if(confirm("Are you sure you want to do delete?"){
				   //   return true;
				   // }
				   var self = this;
				   var isError = false;
				   
				   	if($("input[name='nameEnglish']").val() == "") {
				   		swal("Error!", "จำเป็นต้องมีชื่อภาษาอังกฤษ");
				   		isError = true;
				   		return false;
				   	}

				   	if($("input[name='nameThai']").val() == "") {
				   		swal("Error!", "จำเป็นต้องมีชื่อภาษาไทย");
				   		isError = true;
				   		return false;
				   	}
				   	if($("input[name='orderNumber']").val() != "" && $("input[name='orderNumber']").val().match(/\d+/) == null) {

					   swal("Error!", "ลำดับการแสดงต้องเป็นตัวเลขเท่านั้น");
					   		
					   isError = true;
					   return false;
				   	}

				   	if(!isError) {
				   		self.submit();
				   	}
				   return false;
				});

				$(".update-btn").click(function(item){
					var typeid=$(item.target).parent().parent().attr("typeid");
					var nameth = $(item.target).parent().parent().find(".nameth").text();
					var nameen = $(item.target).parent().parent().find(".nameen").text();
					var ordernum = $(item.target).parent().parent().find(".ordernum").text();

					$("input[name='nameEnglish']").val(nameen);
					$("input[name='nameThai']").val(nameth);
					$("input[name='orderNumber']").val(ordernum);
					$("input[name='id']").val(typeid);

					$('html, body').animate({
			       scrollTop: $('[name="addPowerToolsType"]').offset().top
			    }, 500);

				});

				$(".delete-btn").click(function(item){
					

					var self = this;
				   swal({   
				   		title: "Are you sure?",   
				   		text: "You will not be able to recover this!",   
				   		type: "warning",   
				   		showCancelButton: true,   
				   		confirmButtonColor: "#DD6B55",   
				   		confirmButtonText: "Yes, delete it!",   
				   		closeOnConfirm: false 
				   	}, function(){   
				   		var typeid=$(item.target).parent().parent().attr("typeid");
							$("input[name='id']").val(typeid);
							$("input[name='action_type").val("Delete");
							$(".deleteform").submit();
				   	});
				});
			}
		}
		index.init();
	}
</script>
<?php include ('includes/footer.php'); ?>