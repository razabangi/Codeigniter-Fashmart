
<div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
        <h2>Edit Brand</h2>    
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->      
      <?php 
      $attributes = ['id'=>'editForm','name'=>'editForm'];
      $hidden = ['image_url'=>$brand_info['brand_img']];
      echo form_open_multipart('',$attributes,$hidden); ?>
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
                        <input name="create_date" id="create_date" type="date" value="<?php echo $brand_info['create_date']; ?>"  class="form-control" placeholder="Date">
                      </div>
                    </div>  

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="title" id="title" type="text" value="<?php echo $brand_info['title']; ?>"  class="form-control" placeholder="Title">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="slug" id="slug" type="text" value="<?php echo $brand_info['slug']; ?>" class="form-control" placeholder="Slug">

                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                  <h4>Postal Information</h4>
                  <div class="row form-row">
                      <div class="col-md-13">
                        <input name="brand_img" id="brand_img" type="file"  class="form-control">
                        <img src="/uploads/brand-img/<?php echo $brand_info['brand_img']; ?>" width="80" height="80">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="meta_description" id="meta_description"  rows="8" class="form-control" placeholder="Meta Descriptions"><?php echo $brand_info['meta_description']; ?></textarea>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="meta_keyword" id="meta_keyword" value="<?php echo $brand_info['meta_keyword']; ?>" class="form-control tagsinput" data-a-sign="$" data-role="tagsinput">
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
        </div>
        <?php form_close(); ?>
      <!-- END PLACE PAGE CONTENT HERE -->
    </div>
  </div>