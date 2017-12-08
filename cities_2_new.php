<?php

require_once("initvars.inc.php");
require_once("config.inc.php");

?>


<?php
 
 $state = isset($_GET['state']) ? $_GET['state'] : 0;
 
  $cities = array ();
  if ($state> 0) {

 
    $sql = "SELECT * FROM $t_cities WHERE countryid = ".$state." ORDER BY cityname AND enabled = '1'";
 $result = $conn->query($sql);
   if ($result->num_rows > 0) {
      while ($record =  $result->fetch_assoc()){
		   $city_url = "index.php?view=selectcity&targetview=post&lang=en&cityid=".$record['cityid']."";
        $cities[] = array ('cityid' => $record['cityid'], 'cityname' => $record['cityname'],'city_url'=> $city_url);
	  }
    }
   
  }
  echo json_encode($cities);
 
?>