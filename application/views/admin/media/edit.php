<div class="page-content"> 
        <div class="content">  
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">    
                <h2>Edit Media</h2>      
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <?php
            $attributes = ['id'=>'formEdit','name'=>'formEdit'];
            $hidden = ['image_url'=>$media_info['media_img']];
            echo form_open_multipart('',$attributes,$hidden);
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
                        <input name="create_date" id="create_date" type="text" value="<?php echo $media_info['create_date']; ?>"  class="form-control" placeholder="Create Date">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="media_type" id="media_type" class="form-control">
                          <option>:: Select Media Type ::</option>
                          <option value="slideshow" <?php if($media_info['media_type'] == "slideshow") echo "selected" ?>> Slideshow </option>
                          <option value="gallery" <?php if($media_info['media_type'] == "gallery") echo "selected" ?>> Gallery </option>
                          <option value="video" <?php if($media_info['media_type'] == "video") echo "selected" ?>> Video </option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="title" id="title" type="text" value="<?php echo $media_info['title']; ?>"  class="form-control" placeholder="Title">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="slug" id="slug" type="text" value="<?php echo $media_info['slug']; ?>"  class="form-control" placeholder="Slug">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="embed_code" id="embed_code" rows="8" class="form-control" placeholder="Embed Code"><?php echo $media_info['embed_code']; ?></textarea>
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
                        <textarea name="meta_description" id="meta_description" rows="8" class="form-control" placeholder="Meta Descriptions"><?php echo $media_info['meta_description']; ?></textarea>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="meta_keyword" id="meta_keyword" value="<?php echo $media_info['meta_keyword']; ?>" class="form-control tagsinput" data-a-sign="$" data-role="tagsinput">
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
        <?= form_close(); ?>
            <!-- END PLACE PAGE CONTENT HERE -->
        </div>
    </div>
