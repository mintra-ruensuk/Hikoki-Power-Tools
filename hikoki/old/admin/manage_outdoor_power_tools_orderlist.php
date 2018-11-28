<?php include ('includes/header.php'); ?>
<?php include_once ('includes/connection.php'); ?>
<?php
	// Get all banners
	$a = new OutdoorPowerType;
	$types =  $a->getTypes();
  $powerToolsType = $_GET['ourdoor_power_tools_type'];
  $orderListDataDB = null;
  if($powerToolsType != null && $powerToolsType != "") {
    $b = new OurdoorPowerToolsOrderList;
    $orderListDataDB = $b->getOrdeListByTypeId($powerToolsType);
  }
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Ourdoor Power Tools Type <small>จัดเรียงสินค้า</small></h1>
		</div>
	</div>
	</br>
	<div class="row">
		<form class="form-horizontal myform" action="manage_outdoor_power_tools_orderlist_action.php" method="POST" enctype="multipart/form-data" >
      <div class="form-group">
		    <label for="" class="col-sm-2 control-label">เลือกหมวดหมู่สินค้า</label>
		    <div class="col-sm-10">
		    	<?php
		    		$types = $a->getTypes();
		    		if (is_array($types) || is_object($types)){
  		    			foreach ($types as $type) {
  			    			echo "<div class='radio'>";
  	  						echo "<label><input type='radio' name='typeID' value='".$type['id']."'";
  	  						if($type['id'] == $powerToolsType) {
  	  							echo " checked ";
  	  						}
  	  						echo ">".$type["type_name_en"].": ".$type["type_name_th"]."</label>";
  								echo "</div>"	;
  							}
						}
		    	?>
          <input type="hidden" name="selectType" id="selectType" />

				</label>
		    </div>
		  </div>

      <div class="form-group">
		    <label for="" class="col-sm-2 control-label">การจัดเรียง</label>
		    <div class="col-sm-10">
          กรุณาจัดเรียงโดยระบุชื่อสินค้า ตามด้วยเครื่องหมาย , ตัวอย่างเช่น <br/>
          DS9DVC,DS7DF,DS12DVC,DS14DSFL,DV14DL2,DV18DBL,WH18DSAL<br/>
          <textarea name="orderList" rows="10" cols="80">
            <?php
              echo $orderListDataDB["order_list"];
            ?>
          </textarea>
        </div>
      </div>
      <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input type='hidden' name='id' value="<?php echo $orderListDataDB["id"]?>"    />
		      <button type="submit" class="btn btn-default">บันทึกการจัดเรียง</button>
		    </div>
		  </div>
		</form>
	</div>
	</hr>
</div>
<script>
  $("input:radio").change(function(e) {

      window.location.href = "http://"+window.location.hostname+window.location.pathname+"?ourdoor_power_tools_type=" + e.target.value ;
    });
</script>
<?php include ('includes/footer.php'); ?>
