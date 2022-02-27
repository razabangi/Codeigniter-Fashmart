<?php $get_logo = $this->setting->get_by(1); ?>
<?php $miniBanner1 = $this->setting->get_by(2); ?>
<?php $miniBanner2 = $this->setting->get_by(3); ?>
<?php $miniBanner3 = $this->setting->get_by(4); ?>
<?php $bigBanner1 = $this->setting->get_by(5); ?>
<?php $bigBanner2 = $this->setting->get_by(6); ?>
<div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
        <!-- <h2>Home Page Setting</h2>     -->
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->

<div class="container">
    <div class="row">
    <div class="col-md-11">
      <h3 style="margin-bottom: 40px;">Home Page Setting</h3>

      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
            <li class="active">
              <a href="#tab_default_1" data-toggle="tab">
              Logo </a>
            </li>
            <li>
              <a href="#tab_default_2" data-toggle="tab">
              Mini Banners </a>
            </li>
            <li>
              <a href="#tab_default_3" data-toggle="tab">
              Big Banners </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_default_1">
              <div class="col-md-6">
                <div style="margin-bottom: 20px;box-shadow: 0px 3px 6px lightgrey;">
                  <img src="/uploads/logo-images/<?php echo $get_logo['image'];  ?>" style="width: 200px;height: 100px;">
                </div>
              </div>
              <div class="col-md-6">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Logo</button>                
              </div>
            </div>

            <div class="tab-pane" id="tab_default_2">
              <div class="row">
                <div class="col-md-6">
                  <div style="margin-bottom: 20px;box-shadow: 0px 3px 6px lightgrey;">
                    <img src="/uploads/mini-banner-images/<?php echo $miniBanner1['image'];  ?>" style="width: 500px;height: 350px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mini-cat-1">Change Banner</button>                
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div style="margin-bottom: 20px;box-shadow: 0px 3px 6px lightgrey;">
                    <img src="/uploads/mini-banner-images/<?php echo $miniBanner2['image'];  ?>" style="width: 500px;height: 350px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mini-cat-2">Change Banner</button>                
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div style="margin-bottom: 20px;box-shadow: 0px 3px 6px lightgrey;">
                    <img src="/uploads/mini-banner-images/<?php echo $miniBanner3['image'];  ?>" style="width: 500px;height: 350px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mini-cat-3">Change Banner</button>                
                </div>
              </div> 
            </div>
            
            <div class="tab-pane" id="tab_default_3">
              <div class="row">
                <div class="col-md-6">
                  <div style="margin-bottom: 20px;box-shadow: 0px 3px 6px lightgrey;">
                    <img src="/uploads/big-banner-images/<?php echo $bigBanner1['image'];  ?>" style="width: 500px;height: 350px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#big-cat-1">Change Banner</button>                
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div style="margin-bottom: 20px;box-shadow: 0px 3px 6px lightgrey;">
                    <img src="/uploads/big-banner-images/<?php echo $bigBanner2['image'];  ?>" style="width: 500px;height: 350px;">
                  </div>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#big-cat-2">Change Banner</button>                
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>



<!-- Create Logo Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->      
      <?php $hidden = ['img_url'=>$get_logo['image']] ?>
      <?php echo form_open_multipart('/admin/setting/logo',['id'=>'formAdd','name'=>'formAdd'],$hidden); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Add Logo</h2>
        </div>
        <div class="modal-body">
          <div class="upload-btn-wrapper">
            <div class="btn-upload">Upload a file</div>
            <input type="file" name="logo_img" onchange="loadFile(event)" />
          </div>
          <p>Image should be 200 x 100</p>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <?php echo form_close(); ?>
      
    </div>
  </div>


  <!-- small category one -->
  <div class="modal fade" id="mini-cat-1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->      
      <?php $hidden = ['img_url'=>$miniBanner1['image']] ?>
      <?php echo form_open_multipart('/admin/setting/mini_banner_one',['id'=>'formAdd','name'=>'formAdd'],$hidden); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Add Banner</h2>
        </div>
        <div class="modal-body">
          <div class="upload-btn-wrapper">
            <div class="btn-upload">Upload a file</div>
            <input type="file" name="miniBanner1" onchange="loadFile(event)" />
          </div>
          <p>Image should be 600 x 350</p>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <?php echo form_close(); ?>
      
    </div>
  </div>

  <!-- small category two -->
  <div class="modal fade" id="mini-cat-2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->      
      <?php $hidden = ['img_url'=>$miniBanner2['image']] ?>
      <?php echo form_open_multipart('/admin/setting/mini_banner_two',['id'=>'formAdd','name'=>'formAdd'],$hidden); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Add Banner</h2>
        </div>
        <div class="modal-body">
          <div class="upload-btn-wrapper">
            <div class="btn-upload">Upload a file</div>
            <input type="file" name="miniBanner2" onchange="loadFile(event)" />
          </div>
          <p>Image should be 600 x 350</p>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <?php echo form_close(); ?>
      
    </div>
  </div>

  <!-- small category three -->
  <div class="modal fade" id="mini-cat-3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->      
      <?php $hidden = ['img_url'=>$miniBanner3['image']] ?>
      <?php echo form_open_multipart('/admin/setting/mini_banner_three',['id'=>'formAdd','name'=>'formAdd'],$hidden); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Add Banner</h2>
        </div>
        <div class="modal-body">
          <div class="upload-btn-wrapper">
            <div class="btn-upload">Upload a file</div>
            <input type="file" name="miniBanner3" onchange="loadFile(event)" />
          </div>
          <p>Image should be 600 x 350</p>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <?php echo form_close(); ?>
      
    </div>
  </div>


  <!-- big category one -->
  <div class="modal fade" id="big-cat-1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->      
      <?php $hidden = ['img_url'=>$bigBanner1['image']] ?>
      <?php echo form_open_multipart('/admin/setting/big_banner_one',['id'=>'formAdd','name'=>'formAdd'],$hidden); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Add Banner</h2>
        </div>
        <div class="modal-body">
          <div class="upload-btn-wrapper">
            <div class="btn-upload">Upload a file</div>
            <input type="file" name="bigBanner1" onchange="loadFile(event)" />
          </div>
          <p>Image should be 570 x 319</p>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <?php echo form_close(); ?>
      
    </div>
  </div>


  <!-- big category two -->
  <div class="modal fade" id="big-cat-2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->      
      <?php $hidden = ['img_url'=>$bigBanner2['image']] ?>
      <?php echo form_open_multipart('/admin/setting/big_banner_two',['id'=>'formAdd','name'=>'formAdd'],$hidden); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Add Banner</h2>
        </div>
        <div class="modal-body">
          <div class="upload-btn-wrapper">
            <div class="btn-upload">Upload a file</div>
            <input type="file" name="bigBanner2" onchange="loadFile(event)" />
          </div>
          <p>Image should be 570 x 319</p>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <?php echo form_close(); ?>
      
    </div>
  </div>