    
    <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Add Product</h2>
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

                     <div class="tabs-wrap">
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active">
                            <a href="#basic_details" aria-controls="basic_details" role="tab" data-toggle="tab" aria-expanded="true">Basic Details</a>
                          </li>
                          <li>
                            <a href="#advance_details" aria-controls="advance_details" role="tab" data-toggle="tab" aria-expanded="false">Advance Details</a>
                          </li>
                          <li>
                            <a href="#price_details" aria-controls="price_details" role="tab" data-toggle="tab" aria-expanded="false">Price Details</a>
                          </li>
                        </ul>

                      <div class="tab-content">

                          <div role="tabpanel" class="tab-pane active" id="basic_details">
                            <h3 class="" style="text-align: center;">Basic Detail</h3>
                            
                            <div class="row">
                            <div class="col-md-offset-2 col-md-8">         
                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <input name="create_date" id="create_date" type="date"  class="form-control" placeholder="Create Date">
                                  </div>
                                </div>
                               
                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <input name="title" id="title" type="text" value="<?php echo set_value('title'); ?>" class="form-control" placeholder="Title">
                                    <?php echo form_error('title','<div class="alert alert-danger">','</div>') ?>
                                  </div>
                                </div>
                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <input name="slug" id="slug" type="text"  class="form-control" placeholder="Slug">
                                  </div>
                                </div>
                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <input name="sku" id="sku" type="text" value="<?php echo set_value('sku'); ?>"  class="form-control" placeholder="SKU">
                                    <?php echo form_error('sku','<div class="alert alert-danger">','</div>') ?>
                                  </div>
                                </div>

                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <div class="upload-btn-wrapper">
                                      <div class="btn-upload">Upload a file</div>
                                      <input type="file" name="product_img" onchange="loadFile(event)" />
                                    </div>
                                    <img src="#" id="output" width="80" height="80" style="display:none;padding-bottom: 10px;">
                                    <?php if(isset($fileUploadedErrors)): ?>
                                      <div class="alert alert-danger"><?php echo $fileUploadedErrors; ?></div>
                                    <?php endif; ?>
                                  </div>
                                </div>
                              <a class="btn btn-primary continue">Continue</a>
                                    
                                
                            </div>
 
                          </div>


                          </div>

                          <div role="tabpanel" class="tab-pane" id="advance_details">
                            <h3 class="" style="text-align: center;">Advance Detail</h3>
                            
                            <div class="row">
                              <div class="col-md-offset-2 col-md-8">

                                <div class="row form-row" style="margin-bottom: 10px;">
                                  <div class="col-md-12">
                                    <select name="brand_id" id="brand_id" class="form-control">
                                      <option value="Select Brand">Select Brand</option>
                                      <?php foreach($all_brands as $brand): ?>
                                        <option value="<?php echo $brand['id']; ?>"><?php echo $brand['title']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>   

                                <div class="row form-row" style="margin-bottom: 10px;">
                                  <div class="col-md-12">
                                    <select name="category_id[]" id="category_id" class="form-control">
                                      <option value="Select Brand">Select Category</option>
                                      <?php foreach($show_all_parent_categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="row form-row" style="margin-bottom: 10px;">
                                  <div class="col-md-12">
                                    <select name="category_id[]" id="sub_category_id" class="form-control sub_category_id" style="display: none;">
                                    </select>
                                  </div>
                                </div> 

                                <div class="row form-row" style="margin-bottom: 10px;">
                                  <div class="col-md-12">
                                    <select name="category_id[]" id="sub_sub_category_id" class="form-control" style="display: none;">
                                    </select>
                                  </div>
                                </div> 

                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <textarea name="description" id="description" rows="8" class="form-control" placeholder="Description"></textarea>
                                  </div>
                                </div>

                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <textarea name="meta_description" id="meta_description" rows="8" class="form-control" placeholder="Meta Description"><?php echo set_value('meta_description'); ?></textarea>
                                    <?php echo form_error('meta_description','<div class="alert alert-danger">','</div>') ?>
                                  </div>
                                </div>

                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control tagsinput" data-a-sign="$" value="<?php echo set_value('meta_keyword'); ?>" data-role="tagsinput">
                                    <?php echo form_error('meta_keyword','<div class="alert alert-danger">','</div>') ?>
                                  </div>
                                </div>

                                <a class="btn btn-primary back">Go Back</a>
                                <a class="btn btn-primary continue">Continue</a>
                              </div>
                            </div>

                            
                          </div>

                          <div role="tabpanel" class="tab-pane" id="price_details">
                            <h3 class="" style="text-align: center;">Price Detail</h3>
                            
                            <div class="row">
                              <div class="col-md-offset-2 col-md-8">

                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <input name="price" id="price" type="text"  class="form-control" placeholder="Price">
                                    <?php echo form_error('price','<div class="alert alert-danger">','</div>') ?>
                                  </div>
                                </div>

                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <input name="special_price" id="special_price" type="text"  class="form-control" placeholder="Special Price">
                                  </div>
                                </div>

                                <div class="row form-row" style="margin-bottom: 20px;">
                                  <div class="col-md-6">
                                    Is Featured:
                                  </div>
                                  <div class="col-md-6">
                                    <input name="is_featured" id="is_featured" value="1" type="checkbox" placeholder="Is Featured">
                                  </div>
                                </div>

                                <a class="btn btn-primary back">Go Back</a>
                                <button class="btn btn-danger" type="submit"><i class="fa fa-save"></i> Save </button>
                              </div>
                            </div>

                            
                          </div>
                        </div>

                      </div>
                   <div class="form-actions">                      
                      <a href="/admin/product/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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

      $('.continue').click(function(){
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
      });
      $('.back').click(function(){
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
      });

      $('#brand_id').chosen({ width:'100%' });
      // $('#category_id').chosen({ width:'100%' });

      $('#category_id').change(function(){
        var category_id = $(this).val();  
        var href = "/admin/product/sub_child/"+category_id;

        $.get(href,function(response){
          var done = $('#sub_category_id').html(response);
          $('#sub_category_id').css('display','block');
        });

      });

      $('#sub_category_id').change(function(){
        var category_id = $(this).val();  
        var href = "/admin/product/sub_child/"+category_id;

        $.get(href,function(response){
          var done = $('#sub_sub_category_id').html(response);
          $('#sub_sub_category_id').css('display','block');          
        });

      });

    });
</script>



