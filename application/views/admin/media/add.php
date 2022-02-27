<div class="page-content"> 
        <div class="content">  
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">    
                <h2>Add Media</h2>      
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <?php
            echo form_open_multipart('',["name"=>"formAdd","id"=>"formAdd"]);
             ?>
                <div class="col-md-14">
              <div class="grid simple">                
                <div class="grid-body no-border">
                  <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              &nbsp;
            </div>
            <div class="grid-body no-border">
              <div class="row column-seperation">
                <div class="col-md-6">
                  <h4>Basic Information</h4>            
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="create_date" id="create_date" type="date" value="<?php echo set_value('create_date'); ?>"  class="form-control" placeholder="Create Date">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="media_type" id="media_type" class="form-control">
                          <option>Select Media Type</option>
                          <option value="slideshow"> Slideshow </option>
                          <option value="gallery"> Gallery </option>
                          <option value="video"> Video </option>
                        </select>
                        <?php echo form_error('media_type', '<div class="alert alert-danger">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="title" id="title" autocomplete="off" type="text" value="<?php echo set_value('title'); ?>"  class="form-control" placeholder="Title">
                        <?php echo form_error('title', '<div class="alert alert-danger">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="slug" id="slug" type="text" autocomplete="off" value="<?php echo set_value('slug'); ?>"  class="form-control" placeholder="Slug">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="description" id="description" rows="8" class="form-control" placeholder="Description"><?php echo set_value('description'); ?></textarea>
                        <?php echo form_error('description', '<div class="alert alert-danger">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="embed_code" id="embed_code" rows="8" autocomplete="off" class="form-control" placeholder="Embed Code"><?php echo set_value('embed_code'); ?></textarea>
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
                          <input type="file" name="media_img" onchange="loadFile(event)" />
                        </div>
                        <img src="#" id="output" width="80" height="80" style="display:none;padding-bottom: 10px;">
                        <?php if(isset($fileUploadedErrors)): ?>
                          <div class="alert alert-danger"><?php echo $fileUploadedErrors; ?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="meta_description" id="meta_description" rows="8" class="form-control" placeholder="Meta Descriptions"><?php echo set_value('meta_description'); ?></textarea>
                        <?php echo form_error('meta_description', '<div class="alert alert-danger">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="meta_keyword" id="meta_keyword" value="<?php echo set_value('meta_keyword'); ?>" class="form-control tagsinput" data-a-sign="$" data-role="tagsinput">
                        <?php echo form_error('meta_keyword', '<div class="alert alert-danger">', '</div>'); ?>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/media/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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
    $(document).ready(function(){

      $('#title').keyup(function(){
        $('#slug').val($('#title').val().replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/\s]+/g, '-').toLowerCase());
      });

    });
  </script>

