<?php
$connection = mysqli_connect("localhost","root","","account_db");
$query = "SELECT framework, count(*) as no_of_like FROM php_framework GROUP BY framework ORDER BY id ASC";
//echo $query;die;
$result = mysqli_query($connection,$query);
//print_r($result);die;
$data = array();
while ($row = mysqli_fetch_array($result)){
  $data[] = array(
    'label' => $row['framework'],
    'value' => $row['no_of_like']
  );
}
$data = json_encode($data);
?>
<!DOCTYPE html>
<html>
<head>
<title>chart</title>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
 <label class="label label-success">Bar stacked</label>
 <div id="chart"></div>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    var donut_chart = Morris.Donut({
      element: 'chart',
      data: <?php echo $data; ?>
    });
  });
//   Morris.Donut({
//   element: 'donut-example',
//   data: [
//     {label: "Download Sales", value: 12},
//     {label: "In-Store Sales", value: 30},
//     {label: "Mail-Order Sales", value: 20}
//   ]
// });
</script>
</html>
