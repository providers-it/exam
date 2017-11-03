                     <?php if(validation_errors()){ 
                        ?>
                        <div class="alert alert-danger">
                      <?php echo validation_errors(); ?>
                     </div>
                     <?php } ?>

<?php 
if($resultstatus){ echo "<div class='alert alert-success'>".$resultstatus."</div>"; }
 ?> 

<div class="row" style="margin-top:10px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php if($title){ echo $title; } ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                   <form method="post" action="<?php echo site_url('user_data/insert_user');?>">

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type="text" name="username"  autocomplete="off">
										 </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" name="first_name"  autocomplete="off">
										 </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="last_name"  autocomplete="off">
										 </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="user_email"  autocomplete="off">
										 </div>
                                    
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="user_password"  autocomplete="off">
										 </div>
                                    
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type="password" name="confirm_password"  autocomplete="off">
										 </div>
                                    
                                       <!-- <div class="form-group">
                                            <label>Credit</label>
                                            <input class="form-control" value="0" type="text" name="user_credit"  value="0" readonly=readonly  autocomplete="off" >
										 </div> -->
 										
										
										<div class="form-group">
                                            <label>Center </label>
                                          	<select class="form-control"  id="centerName" name="centers">
                                                     	<option>Please Select Center</option>
											
											<?php foreach($allcenters as $key => $center){ ?>
											<option value="<?php echo $center['su_institute_id']; ?>"><?php echo $center['organization_name']; ?></option>
											<?php } ?>
											</select>
										 </div>
             			 				
										
										<div class="form-group">
                                            <label>Subject </label>
                                          	<select class="form-control" id="subjectName" name="subject">
											<?php foreach($selected_question_subject as $key => $selected_subject){ ?>
											<option value= "<?php echo $selected_subject['cid']; ?>">
											<?php echo $selected_subject['subject_name']; ?></option>	
											<?php } ?>
											</select>
										 </div>
             			 														
										<div class="form-group">
                                            <label>Batch </label>
                                          	<select class="form-control" id="batchName" name="user_group">
											<?php foreach($selected_group as $key => $group){ ?>
											<option value="<?php echo $group['gid']; ?>"><?php echo $group['group_name']; ?></option>
											<?php } ?>
											</select>
										 </div>
                         
        								 <!--<div class="form-group">
                                            <label>Account type </label>
                                         <select class="form-control" name="account_type">
										<option value="0">User</option>
										<option value="1">Administrator</option>
										</select>
									    </div>-->
                         
                                       <div class="form-group">
                                            <label> </label>
                             				<input type="submit" value="Submit" class="btn btn-default">
										 </div>
 

                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
 
 
<script>           
$( document ).ready(function() {
//Get subjects
$('#centerName').on('change', function() {
 // console.log(2);
  var selectedValue = $("#centerName").val();
  var url = "<?php echo site_url('user_data/selected_subject');?>";
  var url = url+"/"+selectedValue;
  // console.log(selectedValue);
 // console.log(url);
$.ajax({
  type: "GET",
  url: url,
   dataType:'json',
      success: function(data) {
     // console.log(data);
		
          var select = $("#subjectName"), options = '';
       select.empty();      
		options = "<option> Please select Subject </option>";  
		//console.log(options);
       for(var i=0;i<data.length; i++)
       {
        options += "<option value='"+data[i].id+"'>"+ data[i].name +"</option>";              
       }

       select.append(options);
    }
});
})
//get batches 

$('#subjectName').on('change', function() {
 // console.log(1);
  var subjectValue = $("#subjectName").val();
  var centerValue = $("#centerName").val();
  var url = "<?php echo site_url('user_data/selected_group');?>";
  var url = url+"/"+subjectValue+"/"+centerValue;
  //console.log(url);
$.ajax({
  type: "GET",
  url: url,
   dataType:'json',
      success: function(data) {
      //console.log(data);
	  //console.log(data);

	//console.log(data);
          var select = $("#batchName"), options = '';
       select.empty();      
		options = "<option> Please select Batch </option>";  
		if(data)
{
       for(var i=0;i<data.length; i++)
       {
        options += "<option value='"+data[i].id+"'>"+ data[i].name +"</option>";              
       }

       select.append(options);
    }
	else
	{
		 options = "<option> No batch created for " + $("#subjectName option:selected").text() + " </option>";
		select.append(options);
	}
}
});
})

});
</script>