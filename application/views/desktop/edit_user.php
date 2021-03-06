<?php if (validation_errors()) {
    ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
<?php } ?>

<?php
if ($resultstatus) {
    echo "<div class='alert alert-success'>" . $resultstatus . "</div>";
}
?>

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
                        <form method="post" action="<?php echo site_url('user_data/update_user/' . $user_id); ?>">

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" name="username"
                                       value="<?php echo $user['username']; ?>" value="<?php echo $user['username']; ?>"
                                       value="<?php echo $user['username']; ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="first_name"
                                       value="<?php echo $user['first_name']; ?>"
                                       value="<?php echo $user['username']; ?>" value="<?php echo $user['username']; ?>"
                                       autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="last_name"
                                       value="<?php echo $user['last_name']; ?>"
                                       value="<?php echo $user['username']; ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="user_email"
                                       value="<?php echo $user['email']; ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Password (Optional) </label>
                                <input class="form-control" type="password" name="user_password" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Confirm Password (Optional)</label>
                                <input class="form-control" type="password" name="confirm_password" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Credit</label>
                                <input class="form-control" value="0" readonly='readonly' type="text" name="user_credit"
                                       autocomplete="off">
                            </div>

                            <!--	<div class="form-group">
                                            <label>Center </label>
                                          	<select class="form-control"  id="centerName" name="centers">
                                                     	<option value=>Please Select Center</option>
											
											<?php foreach ($allcenters as $key => $center) { ?>
											<option value="<?php echo $center['su_institute_id']; ?>"><?php echo $center['organization_name']; ?></option>
											<?php } ?>
											</select>
										 </div>
             			 				
										
										<div class="form-group">
                                            <label>Subject </label>
                                          	<select class="form-control" id="subjectName" name="subject">
											<?php foreach ($selected_question_subject as $key => $selected_subject) { ?>
											<option value= "<?php echo $selected_subject['cid']; ?>">
											<?php echo $selected_subject['subject_name']; ?></option>	
											<?php } ?>
											</select>
										 </div>
             			 														
										<div class="form-group">
                                            <label>Batch </label>
                                          	<select class="form-control" id="batchName" name="user_batch">
											<?php foreach ($selected_batch as $key => $batch) { ?>
											<option value="<?php echo $batch['gid']; ?>"><?php echo $batch['batch_name']; ?></option>
											<?php } ?>
											</select>
										 </div>		-->

                            <div class="form-group">
                                <label>Center </label>
                                <select class="form-control" id="centerName" name="centers">

                                    <?php foreach ($allcenters as $key => $center) { ?>
                                        <option value="<?php echo $center['su_institute_id']; ?>"
                                            <?php if ($user['institute_id'] == $center['su_institute_id']) {
                                                echo "selected";
                                            } ?>> <?php echo $center['organization_name']; ?></option>
                                    <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Subject </label>
                                <select class="form-control" id="subjectName" name="subject">
                                    <?php foreach ($allsubject as $key => $subject) { ?>
                                        <option value="<?php echo $subject['cid']; ?>"
                                            <?php if ($user['cid'] == $subject['cid']) {
                                                echo "selected";
                                            } ?>> <?php echo $subject['subject_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Batch </label>
                                <select class="form-control" id="batchName" name="user_batch">
                                    <?php if ($batches != NULL) { ?>
                                        <?php foreach ($batches as $key => $batch) { ?>
                                            <option value="<?php echo $batch['gid']; ?>" <?php if ($user['gid'] == $batch['gid']) {
                                                echo "selected";
                                            } ?>><?php echo $batch['batch_name']; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option>No batch created for this subject</option> <?php } ?>
                                </select>


                            </div>
                            <!--
										 <div class="form-group">
                                            <label>Batch </label>
                                          	<select class="form-control" id="batchName" name="user_batch">
											<?php foreach ($allbatches as $key => $batch) { ?>
											<option value="<?php echo $batch['gid']; ?>"  <?php if ($user['gid'] == $batch['gid']) {
                                echo "selected";
                            } ?> ><?php echo $batch['batch_name']; ?></option>
											<?php } ?>
											</select>
										 </div> 
  -->
                            <div class="form-group">
                                <label>Account type </label>
                                <select class="form-control" name="account_type">
                                    <option value="0" <?php if ($user['su'] == "0") {
                                        echo "selected";
                                    } ?> >User
                                    </option>
                                    <option value="1" <?php if ($user['su'] == "1") {
                                        echo "selected";
                                    } ?> >Administrator
                                    </option>
                                </select>
                            </div>

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
    $(document).ready(function () {
//Get subjects
        $('#centerName').on('change', function () {
            console.log(1);
            var selectedValue = $("#centerName").val();
            var url = "<?php echo site_url('user_data/selected_subject');?>";
            var url = url + "/" + selectedValue;
            console.log(url);
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data) {
                    console.log(data);

                    var select = $("#subjectName"), options = '';
                    select.empty();
                    options = "<option> Please select Subject </option>";
                    for (var i = 0; i < data.length; i++) {
                        options += "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                    }

                    select.append(options);
                }
            });

            /*$('#centerName').on('load', function() {
             console.log(1);
             var selectedValue = $("#centerName").val();
             var url = "<?php echo site_url('user_data/selected_subject');?>";
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
             });*/

        })
//get batches EDITING

        $('#subjectName').on('change', function () {
            console.log(1);
            <?php $switch = 1 ?>
            var subjectValue = $("#subjectName").val();
            var centerValue = $("#centerName").val();
            var url = "<?php echo site_url('user_data/selected_batch');?>";
            var url = url + "/" + subjectValue + "/" + centerValue;
            console.log(url);
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data) {
                    console.log(data);

                    var select = $("#batchName"), options = '';
                    select.empty();
                    options = "<option> Please select Batch </option>";
                    console.log(data);
                    if (data) {
                        console.log('hi');
                        for (var i = 0; i < data.length; i++) {
                            options += "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                        }
                    }
                    else {
                        options = "<option> No batch created for " + $("#subjectName option:selected").text() + " </option>"; //editing
                    }
                    select.append(options);
                }
            });
        })

    });
</script>



















 







