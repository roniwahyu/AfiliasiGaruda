 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

<script type="text/javascript">
  google.load('visualization', '1', {'packages':['corechart']});

  google.setOnLoadCallback(drawChart);

  function drawChart(){
var jsonData=$.ajax({
  url:'<?php echo base_url(); ?>chart/getData',
  mtype:"post",
  dataType:"json",
  async:false
}).responseText;

var data=new google.visualization.DataTable(jsonData);

var chart=new google.visualization.PieChart(document.getElementById('tryChart'));
chart.draw(data, {width:400, height:240});
  }
</script>


    <div id="tryChart"></div>
    
