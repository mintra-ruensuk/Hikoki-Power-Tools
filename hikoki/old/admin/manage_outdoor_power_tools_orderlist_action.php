<?php
	include("includes/connection.php");

	$typeId = $_POST['typeID'];
  $orderList = $_POST['orderList'];
  $id = $_POST['id'];

	$a = new OurdoorPowerToolsOrderList;

  $result = null;
  if($id != null && $id != "") {
    // update
    $result = $a->updateOrderList(trim($orderList), $typeId, $id);
  }else {
    // add new
    $result = $a->createOrderList(trim($orderList), $typeId);
  }

	if($result == 'true')  {
		echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_outdoor_power_tools_orderlist.php';</script>");
	}else {
		echo "Error: $result";
	}

?>
