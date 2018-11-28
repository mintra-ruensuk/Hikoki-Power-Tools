<?php include ('includes/header.php'); ?>
<?php include_once ('includes/connection.php'); ?>
<?php 
	// Get all items
	$a = new SocialItemForm;
	$items =  $a->getSocialItems();
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Social items <small>Add / Remove the items</small></h1>
		</div>
	</div>
	</br>
	<div class="row">
		<form action="manage_social_middle_controller.php" method="POST"  enctype="multipart/form-data">
		  <div class="form-inline">
		    <label for="exampleInputEmail1">Add new item</label>
		    <input type="text" class="form-control input-xlarge" name="imageLink" placeHolder="e.g. http://hitachi.com">
		    <input type="text" class="form-control" id="item-text" disabled>
		    <label class="btn btn-default btn-file">
				  Browser <input type="file" name="itemFile" id="item-file" style="display: none;">
				</label>
				<input type="hidden" name="action_type" value="addNewItem" />
				<input type="submit" name="submit" class="btn btn-primary" value="Upload">
		  </div>
		</form>
			
	</div>
	<div class="row">
		<?php
			if (is_array($items) || is_object($items))
			{
				echo "<table class='table table-bordered'>";
				foreach ($items as $result) {
					echo "<tr><td>
							<form  action='manage_social_middle_controller.php' method='post'>
							<input type='hidden' name='action_type' value='updateItem' />
							<img  src='".$result["image_admin_path"]."' class='img-responsive' alt='Responsive image'><br/>
							<div class='form-inline'><input type='text' name='image-link' width='150%' class='form-control' placeHolder='Image Link' value='".$result["image_link"]."' />
							<input type=\"submit\" class=\"btn btn-danger item-delete\" value=\"Update\"><div>
							</td>
							<td>
							<input type='hidden' name='imageid' value='".$result['ID']."' />
							</form>
							<form class='myform' action='manage_social_middle_controller.php' method='post'>
							<input type='hidden' name='action_type' value='deleteItem' />
							<input type=\"submit\" class=\"btn btn-danger item-delete\" value=\"Delete\"/>
							<input type='hidden' name='imageid' value='".$result['ID']."' />
							<input type='hidden' name='imagesrc' value='".$result['image_admin_path']."' />
							</form></td></tr>";
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
				var item = document.getElementById("item-file");
				item.addEventListener("change", function(){
					document.getElementById("item-text").value = item.value;
				});
				$(".myform").submit(function() {
				   // if(confirm("Are you sure you want to do delete?"){
				   //   return true;
				   // }
				   var self = this;
				   swal({   
				   		title: "Are you sure?",   
				   		text: "You will not be able to recover this imaginary file!",   
				   		type: "warning",   
				   		showCancelButton: true,   
				   		confirmButtonColor: "#DD6B55",   
				   		confirmButtonText: "Yes, delete it!",   
				   		closeOnConfirm: false 
				   	}, function(){   
				   		self.submit();

				   	});
				   return false;
				});
			}
		}
		index.init();
	}
</script>
<?php include ('includes/footer.php'); ?>