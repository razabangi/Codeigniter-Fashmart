<div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
        <h2>Edit Category</h2>    
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <div class="col-md-14">
        <?php
        $hidden = ['img_url'=>$get_categories['category_image']];  
        echo form_open_multipart('',['id'=>'formEdit','name'=>'formEdit'],$hidden); ?>
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
                        <input name="create_date" id="create_date" type="date" value="<?php echo $get_categories['create_date']; ?>"  class="form-control" placeholder="Date" autocomplete="off">
                      </div>
                    </div>  

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="title" id="title"  type="text" autocomplete="off" class="form-control <?php echo form_error('title') ? 'error' : null; ?>"  placeholder="Title" value="<?php echo $get_categories['title']; ?>">
                        <?php echo form_error('title','<div class="alert alert-danger">','</div>'); ?>
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="slug" id="slug" autocomplete="off" type="text"  class="form-control slugField"  placeholder="Slug" value="<?php echo $get_categories['slug']; ?>" readonly style="position: relative;">
                        <input type="checkbox" name="checkSlug" value="testing" id="checkSlug" style="position: absolute;top:15px;right: 25px;">
                        <?php echo form_error('slug','<div class="alert alert-danger">','</div>'); ?>
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="parent_id" id="parent_id" class="form-control parent_category">
                          <option value="<?php echo $get_categories['parent_id']; ?>"><?php echo $category_array[$get_categories['parent_id']]; ?></option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <!-- <input name="brand_img" id="brand_img" type="file" onchange="loadFile(event)" class="form-control"> -->
                        <div class="upload-btn-wrapper">
                          <div class="btn-upload">Upload a file</div>
                          <input type="file" name="category_image" onchange="loadFile(event)" />
                        </div>
                        <img src="#" id="output" width="80" height="80" style="display:none;padding-bottom: 10px;">
                        <?php if(isset($fileUploadedErrors)): ?>
                          <div class="alert alert-danger"><?php echo $fileUploadedErrors; ?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                  <h4>All Categories</h4>
                  
                  <div id="treeview"></div>

                </div>
              </div>
       
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/category" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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

      $('#checkSlug').click(function(event){
          event.preventDefault();
          if ($('#checkSlug:checked')) {
            $('.slugField').prop('readonly',false);
            $('#slug').val($('#title').val().replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/\s]+/g, '-').toLowerCase());
          }
        });

      fill_treeview();
  
      function fill_treeview()
      {
       $.ajax({
        url:"/admin/category/fetchAllCategories",
        dataType:"json",
        success:function(data){
         $('#treeview').treeview({
          data:data
         });
        }
       })
      }

      $('.parent_category').focus(function(event){
        event.preventDefault();
        var href = '/admin/category/squenceCategories';
        var self = $(this);

        $.get(href,function(response){
          self.html(response);
        });

        // $.ajax({
        //   dataType: 'json',
        //   url: '/admin/category/fetchAllCategories',
        //   data: data,
        //   success: function(response){
        //     // self.html(response);
        //     alert(response);
        //   }
        // });

      });   

    // $('.parent_category').chosen({}).change( function(obj, result) {
    //     console.debug("changed: %o", arguments);
        
    //     console.log("selected: " + result.selected);
    // });

 });
</script>
