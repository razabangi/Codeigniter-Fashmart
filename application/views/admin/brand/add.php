<div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
        <h2>Add Brand</h2>    
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <div class="col-md-14">
        <?php echo form_open_multipart('',['id'=>'formAdd','name'=>'formAdd']); ?>
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
                        <input name="create_date" autocomplete="off" id="create_date" type="date"  class="form-control" placeholder="Date" value="<?php echo set_value('create_date'); ?>">
                      </div>
                    </div>  

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="title" id="title" autocomplete="off" type="text"  class="form-control <?php echo form_error('title') ? 'error' : null; ?>"  placeholder="Title" value="<?php echo set_value('title'); ?>">
                        <?php echo form_error('title','<div class="alert alert-danger">','</div>'); ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="slug" id="slug" type="text" autocomplete="off" class="form-control <?php echo form_error('slug') ? 'error' : null; ?>" placeholder="Slug" value="<?php echo set_value('slug'); ?>">
                        <?php echo form_error('slug','<div class="alert alert-danger">','</div>'); ?>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                  <h4>Postal Information</h4>
                  <div class="row form-row">
                      <div class="col-md-12">
                        <!-- <input name="brand_img" id="brand_img" type="file" onchange="loadFile(event)" class="form-control"> -->
                        <div class="upload-btn-wrapper">
                          <div class="btn-upload">Upload a file</div>
                          <input type="file" name="brand_img" onchange="loadFile(event)" />
                        </div>
                        <img src="#" id="output" width="80" height="80" style="display:none;padding-bottom: 10px;">
                        <?php if(isset($fileUploadedErrors)): ?>
                          <div class="alert alert-danger"><?php echo $fileUploadedErrors; ?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="meta_description" autocomplete="off" id="meta_description" rows="8" class="form-control" placeholder="Meta Descriptions"><?php echo set_value('meta_description'); ?></textarea>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="meta_keyword" autocomplete="off" id="meta_keyword" class="form-control tagsinput" data-a-sign="$" data-role="tagsinput" value="<?php echo set_value('meta_keyword'); ?>">
                      </div>
                    </div>
                </div>
              </div>
       
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/brand/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
                </div>
              </div>
        <?php echo form_close(); ?>
        </div>
      <!-- END PLACE PAGE CONTENT HERE -->
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){

      $('#title').keyup(function(){
        $('#slug').val($('#title').val().replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/\s]+/g, '-').toLowerCase());
      });

    });
  </script>
