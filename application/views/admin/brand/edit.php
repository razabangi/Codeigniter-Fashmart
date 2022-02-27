
<div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
        <h2>Edit Brand</h2>    
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->   
      <?php
      $hidden = ['img_url'=>$brand_result['brand_img']]; 
      echo form_open_multipart('',['id'=>'editForm','name'=>'editForm'],$hidden); ?>   
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
                        <input name="create_date" id="create_date" type="date" value="<?php echo $brand_result['create_date']; ?>"  class="form-control" placeholder="Date">
                      </div>
                    </div>  

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="title" id="title" type="text" value="<?php echo $brand_result['title']; ?>"  class="form-control" placeholder="Title">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="slug" id="slug" type="text" value="<?php echo $brand_result['slug']; ?>" class="form-control slugField" placeholder="Slug" readonly style="position: relative;">
                        <input type="checkbox" name="checkSlug" value="testing" id="checkSlug" style="position: absolute;top:15px;right: 25px;">
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                  <h4>Postal Information</h4>
                  <div class="row form-row">
                      <div class="col-md-12">
                        <div class="upload-btn-wrapper">
                          <button class="btn-upload">Upload a file</button>
                          <input type="file" name="brand_img" onchange="loadFile(event)" />
                        </div>
                      </div>
                        <?php if ($brand_result['brand_img'] == 'No Image Found'): ?>
                          <img src="/assets/admin/img/no-img.png" width="100" height="100" class="img img-thumnail" style="padding-bottom: 10px;margin-left: 15px;">
                        <?php else: ?>
                        <img src="/uploads/brand-images/<?php echo $brand_result['brand_img'] ?>" width="100" height="100" class="img img-thumnail" style="padding-bottom: 10px;margin-left: 15px;">
                        <?php endif; ?>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="meta_description" id="meta_description"  rows="8" class="form-control" placeholder="Meta Descriptions"><?php echo $brand_result['meta_description']; ?></textarea>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="meta_keyword" id="meta_keyword" value="<?php echo $brand_result['meta_keyword']; ?>" class="form-control tagsinput" data-a-sign="$" data-role="tagsinput">
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
        <?php echo form_close(); ?>
      <!-- END PLACE PAGE CONTENT HERE -->
    </div>
  </div>

  <script>
    
    $(document).ready(function(){

        $('#checkSlug').click(function(event){
          event.preventDefault();
          if ($('#checkSlug:checked')) {
            $('.slugField').prop('readonly',false);
              $('#slug').val($('#title').val().replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/\s]+/g, '-').toLowerCase());
          }
        });

    });

  </script>