<?php
$connect = mysqli_connect("localhost","root","","account_db");
$query = "select * from account";
$result = mysqli_query($connect,$query);
$chart_data = '';
while ($row = mysqli_fetch_array($result)) {
	$chart_data .= "{year:'".$row["year"]."',profit:".$row["profit"].",purchase:".$row["purchase"].",sale:".$row["sale"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

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
<div id="donut-example"></div>
<div id="area-example"></div>
<div id="line-example"></div>
 <label class="label label-success">Bar stacked</label>
 <div id="bar-example"></div>
</body>
<script type="text/javascript">
Morris.Bar({
  element: 'bar-example',
   data: [<?php echo $chart_data; ?>],
  xkey: 'year',
  ykeys:['profit','purchase','sale'],
  labels:['profit','purchase','sale'],
  hideHover:'auto'
});
Morris.Line({
  element: 'line-example',
  data: [<?php echo $chart_data; ?>],
  xkey: 'year',
  ykeys:['profit','purchase','sale'],
  labels:['profit','purchase','sale'],
  hideHover:'auto'
});
Morris.Area({
  element: 'area-example',
  data: [<?php echo $chart_data; ?>],
  xkey: 'year',
  ykeys:['profit','purchase','sale'],
  labels:['profit','purchase','sale'],
  hideHover:'auto'
});
  Morris.Donut({
  element: 'donut-example',
  data: [
    {label: "Download Sales", value: 12},
    {label: "In-Store Sales", value: 30},
    {label: "Mail-Order Sales", value: 20}
  ]
});
</script>
</html>