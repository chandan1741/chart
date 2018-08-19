<?php
$connection = mysqli_connect("localhost","root","","account_db");
if(isset($_POST["framework"])){
	$query = "INSERT INTO php_framework (framework) VALUES('".$_POST['framework']."')";
	mysqli_query($connection,$query);
	$sub_query = "SELECT framework, count(*) as no_of_like FROM php_framework GROUP BY framework ORDER BY id ASC";
//echo $query;die;
$result = mysqli_query($connection,$sub_query);
//print_r($result);die;
$data = array();
while ($row = mysqli_fetch_array($result)){
  // $data .= "{label:'".$row["framework"]."',value:".$row["no_of_like"].",}, ";
  $data[] = array(
    'label' => $row['framework'],
    'value' => $row['no_of_like']
  );
}
 $data = json_encode($data);
 echo $data;
}
?>