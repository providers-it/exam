<script type="text/javascript" src="<?php echo base_url(); ?>/js/basic.js"></script>
<br>
<?php
if ($resultstatus) {
    echo "<div class='alert alert-success'>" . $resultstatus . "</div>";
}
?>
<form method="post" action="<?php echo site_url('batch/insert_batch/'); ?>">
    <a href="<?php echo site_url('batch'); ?>" class="btn btn-danger">Back</a>
    <div class="row" style="margin-top:10px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if ($title) {
                        echo $title;
                    } ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label>Center </label>
                                <select class="form-control" id="centerName" name="centers">
                                    <option>Please Select Center</option>

                                    <?php foreach ($allcenters as $key => $center) { ?>
                                        <option value="<?php echo $center['su_institute_id']; ?>"><?php echo $center['organization_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Subject </label>
                                <select class="form-control" id="subjectName" name="subject">
                                    <option>Please Select Subject</option>

                                    <?php foreach ($allsubject as $key => $center) { ?>
                                        <option value="<?php echo $center['cid']; ?>"><?php echo $center['subject_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!--<div class="form-group">
                                            <label>Subject </label>
                                          	<select class="form-control" id="subjectName" name="subject">
											<?php foreach ($selected_question_subject as $key => $selected_subject) { ?>
											<option value= "<?php echo $selected_subject['cid']; ?>">
											<?php echo $selected_subject['subject_name']; ?></option>
											<?php } ?>
											</select>
										 </div>-->

                            <div class="form-group">
                                <label>Batch Name</label>
                                <input type='text' class="form-control" name='batchname'>

                            </div>

                            <div class="form-group">

                                <input type="submit" value="Submit" class="btn btn-default">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<!--
<script>




$( document ).ready(function() {
//Get subjects
$('#centerName').on('change', function() {
  console.log(1);
  var selectedValue = $("#centerName").val();
  var url = "<?php echo site_url('user_data/selected_subject'); ?>";
  var url = url+"/"+selectedValue;
  console.log(url);
$.ajax({
  type: "GET",
  url: url,
   dataType:'json',
      success: function(data) {
      console.log(data);

          var select = $("#subjectName"), options = '';
       select.empty();
		options = "<option> Please select Subject </option>";
       for(var i=0;i<data.length; i++)
       {
        options += "<option value='"+data[i].id+"'>"+ data[i].name +"</option>";
       }

       select.append(options);
    }
});
})
//get batches EDITING

$('#subjectName').on('change', function() {
  console.log(1);
  var subjectValue = $("#subjectName").val();
  var centerValue = $("#centerName").val();
  var url = "<?php echo site_url('user_data/selected_batch'); ?>";
  var url = url+"/"+subjectValue+"/"+centerValue;
  console.log(url);
$.ajax({
  type: "GET",
  url: url,
   dataType:'json',
      success: function(data) {
      console.log(data);

          var select = $("#batchName"), options = '';
       select.empty();
		options = "<option> Please select Batch </option>";
       for(var i=0;i<data.length; i++)
       {
        options += "<option value='"+data[i].id+"'>"+ data[i].name +"</option>";
       }

       select.append(options);
    }
});
})

});
</script>

	-->








