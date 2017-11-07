<div id="content" class="copy"  >
<h1> </h1><br>


<div class="row">

<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_users;?></div>
                                    <div>Number of User Registered</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('user_data');?>">
                            <div class="panel-footer">
                                <span class="pull-left">User List</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>

<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-question-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_qbank;?></div>
                                    <div>Questions  in Question Bank</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('qbank');?>">
                            <div class="panel-footer">Question Bank</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>


<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-line-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_result;?></div>
                                    <div>Quiz Attempted </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('result');?>">
                            <div class="panel-footer">Results</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>


</div>
 

<div style="clear:both;"></div><br><br>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["columnchart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($user_batch);?>);

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 400, height: 240, is3D: true, colors:[{color:'#261887', darker:'#1a0989'}], title: 'Users registered in batches'});
      }
    </script>
	
	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["columnchart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $value;?>);

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart.draw(data, {width: 400, height: 240, is3D: true, colors:[{color:'#ff911c', darker:'#ff8300'}],axisFontSize:12,title: 'Last 10 Results'});
      }
    </script>
	<div id="chart_div2" style="float:left;width:700px;height:300px;margin-right:20px;">

	</div>
	
	<div id="chart_div" style="float:left;"></div>
	
		 
<div style="clear:both;"></div><br><br>
		 <br>
<h2 style="color:#666666">Steps for Quick Start</h2>

1) Go to Settings -> Create Center, Subject, Batches<br>
2) Users -> Add user -> You can add user manually.<br>
3) Go to question Bank and add questions, or import questions from a excel sheet <br>
4) Go to Exam and create new exam, add questions from question bank. <br> 
5) Go to Result and view/delete/publish results. <br>  

</div>
