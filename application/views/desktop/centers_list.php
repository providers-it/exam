<br><a href="<?php echo site_url('centers/add_new');?>" class="btn btn-success">Add new</a>
 
 	<?php 
$logged_in=$this->session->userdata('logged_in');

if($resultstatus){ echo "<div class='alert alert-success'>".$resultstatus."</div>"; }
 ?> 
<?php 
function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
 }
?> 
<div class="row" style="margin-top:10px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <?php if($title){ echo $title; } ?>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <table class="table table-hover">
                                    <thead>
                                   
                               
							   <tr><th>Id</th><th>Center name</th><th>Action</th></tr><thead><tbody>
<?php
if($result==false){
?>
<tr>
<td colspan="5">
No records found!
</td>
</tr>
<?php

}else{
foreach($result as $row){
?> 
<tr>
<td data-th="Id"><?php echo $row->su_institute_id;?></td>
<td data-th="Group Name"><?php echo $row->organization_name;?></td>
<td data-th="Action"><a href="javascript: if(confirm('Do you really want to remove this center?')){ window.location='<?php echo site_url('centers/remove_center/'.$row->su_institute_id );?>'; }"  class="btn btn-danger btn-xs">Remove</a>  
&nbsp;&nbsp;
<?php console_log($row->su_institute_id); ?>
<a href="<?php echo site_url('centers/edit_center/'.$row->su_institute_id );?>"  class="btn btn-info btn-xs">Edit</a></td>
</tr>
<?php
}
}
?>
		   
							    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			
			
			

<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('centers/index/'.$back);?>"  class="btn btn-primary">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('centers/index/'.$next);?>"  class="btn btn-primary">Next</a>
 
