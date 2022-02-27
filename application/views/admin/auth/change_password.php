<div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
        <h2>Change Password</h2>    
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <?php
        $attributes = ['name' => 'formChangePassword', 'id' => 'formChangePassword']; 
        echo form_open('', $attributes);
      ?>
        <div class="col-md-14">
              <div class="grid simple">                
                <div class="grid-body no-border">
                  <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
            </div>
            <div class="grid-body no-border">
              <div class="row column-seperation">
                <div class="col-md-6">
                  <h4>Basic Information</h4>          
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="old_password" id="old_password" type="password" value="<?php echo set_value('old_password'); ?>" class="form-control password-field <?php echo (form_error('old_password')) ? 'error' : null; ?>" placeholder="Old Password" style="padding: 10px;">
                        <?php echo form_error('old_password','<div class="alert alert-danger">','</div>'); ?>
                      </div>
                    </div>  

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="new_password" id="new_password"  type="password" value="<?php echo set_value('new_password'); ?>"  class="form-control <?php echo (form_error('new_password')) ? 'error' : null; ?>"  placeholder="New Password">
                        <?php echo form_error('new_password','<div class="alert alert-danger">','</div>'); ?>                        
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="retype_password" id="retype_password" value="<?php echo set_value('retype_password'); ?>" type="password"  class="form-control <?php echo (form_error('retype_password')) ? 'error' : null; ?>" placeholder="Re Type Password">
                        <?php echo form_error('retype_password','<div class="alert alert-danger">','</div>'); ?>

                      </div>
                    </div>
                </div>
              </div>
       
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/home/change_password" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
                </div>
              </div>
        </div>
        <?php echo form_close(); ?>
      <!-- END PLACE PAGE CONTENT HERE -->
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function () {
        $("#old_password").jqxPasswordInput();
        $("#new_password").jqxPasswordInput();
        $("#retype_password").jqxPasswordInput();

    });
</script>




