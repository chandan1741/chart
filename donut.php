<?php
$connection = mysqli_connect("localhost","root","","account_db");
$query = "SELECT framework, count(*) as no_of_like FROM php_framework GROUP BY framework ORDER BY id ASC";
//echo $query;die;
$result = mysqli_query($connection,$query);
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
 // echo $data;die;
?>
<!DOCTYPE html>
<html>
<head>
<title>chart</title>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
 <!-- <label class="label label-success">Donut chart</label> -->
 <div class="container" style="width: 900px;">
   <h2 align="center">Donut Chart</h2>
   
   <form method="post" id="like_form">
     <div class="form-group">
       <label>Like any one framework</label>
       <div class="radio">
        <label><input type="radio" name="framework" value="Codeigniter">Codeigniter</label>
       </div>
       <div class="radio">
        <label><input type="radio" name="framework" value="Symfony">Symfony</label>
       </div>
       <div class="radio">
        <label><input type="radio" name="framework" value="Laravel">Laravel</label>
       </div>
       <div class="radio">
        <label><input type="radio" name="framework" value="CakePHP">CakePHP</label>
       </div>
       <div class="radio">
        <label><input type="radio" name="framework" value="Yii">Yii</label>
       </div>
     </div>
     <div class="form-group">
       <input type="submit" name="like" id="like" class="btn btn-info" value="Like">
     </div>
   </form>
   <div id="chart"></div>
 </div>
 
</body>
<script type="text/javascript">
  $(document).ready(function(){
    var donut_chart = Morris.Donut({
      element: 'chart',
      data: <?php echo $data; ?>
    });
    $('#like_form').on("submit",function(e){
      e.preventDefault();
      
      var checked = $('input[name = framework]:checked','#like_form').val();
      if(checked == undefined){
        alert('Please Like any framework');
        //result false;
      }
      else{
        var form_data = $(this).serialize();
        $.ajax({
          url:'action.php',
          method:'POST',
          data:form_data,
          dataType:'JSON',
          success:function(data){
            $('#like_form')[0].reset();
            donut_chart.setData(data);
          }
        });
      }
    });
  });
</script>
</html>