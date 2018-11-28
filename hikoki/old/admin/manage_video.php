<?php include ('includes/header.php'); ?>
<?php include_once ('includes/connection.php'); ?>
<?php 
	
	$a = new Video;
	$videos =  $a->getVideos();
	if (isset($_GET['video_id'])) {
		$video = $a->getVideoById($_GET['video_id']);
	}
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Video <small>Add / Remove video</small></h1>
		</div>
	</div>
	</br>
	<div class="row">
		<form name="addVideo" class="form-horizontal myform" action="manage_video_action.php" method="POST" enctype="multipart/form-data" >
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Video Link (Youtube)</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="videoURL" placeholder="e.g. https://www.youtube.com/watch?v=3AtDnEC4zak" value=<?php echo $video['url']; ?> >
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input type='hidden' name='action_type' value='addVideo' />
		    	<input type='hidden' name='id' value=<?php echo $video['id']; ?>    />
		      <button type="submit" class="btn btn-default">Add new video</button>
		    </div>
		  </div>
		</form>
		<form style="display: none;" class="deleteform" action="manage_video_action.php" method="POST"  >
			<input type='hidden' name='action_type' value='addVideo' />
			<input type='hidden' name='id' value=''/>
		</form>      
			
	</div>
	<div class="row">
		<?php
			if (is_array($videos) || is_object($videos))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr><th>Link</th><th></th></tr>";
				foreach ($videos as $result) {

					echo "<tr typeid='".$result['id']."'>";
					echo "<td class=''>".$result['url']."</td>";
					
					echo "<td><a href='manage_video.php?video_id=".$result["id"]."' class='btn btn-info update-btn' value=''>View & Update</a>&nbsp;&nbsp;&nbsp;";
					echo "<input type='hidden' name='product-id' value='".$result['id']."' />";
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