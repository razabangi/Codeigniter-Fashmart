     
   <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Manage Brand</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <div class="col-md-14">
            <div class="grid simple ">
                <div class="grid-body no-border">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary tip" id="selectAllActive" data-toggle="tooltip" title="Active Selected"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary tip" id="selectAllDeactive" data-toggle="tooltip" title="Deactive Selected"><i class="fa fa-eye-slash"></i></a>
                            <a href="#" class="btn btn-primary tip" id="selectAllDelete" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-trash"></i></a>
                            <a href="/admin/brand/add" class="btn btn-primary tip" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
                        </div>
                        <?php echo form_open('',['name'=>'formSearch','id'=>'formSearch','method'=>'get']); ?>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="per_page" onchange="javascript:document.forms['formSearch'].submit();" class="form-control">
                                            <option value="15" <?php echo ($this->input->get('per_page') == 15) ? 'selected' : null; ?>>15</option>
                                            <option value="25" <?php echo ($this->input->get('per_page') == 25) ? 'selected' : null; ?>>25</option>
                                            <option value="50" <?php echo ($this->input->get('per_page') == 50) ? 'selected' : null; ?>>50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="q" class="form-control" placeholder="Search" value="<?php echo $this->input->get('q'); ?>">
                                        <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                        
                    <br>
                    <?php if($brands_info): ?>                   
                    <?php echo form_open('',['name'=>'formView','id'=>'formView']) ?>
                       <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:1%">
                                    <div class="checkbox check-default">
                                        <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                        <label for="checkbox10"></label>
                                    </div>
                                </th>
                                <th style="width:40%">Title</th>
                                <th style="width:20%">Brand Image</th>
                                <th style="width:10%">Status</th>
                                <th style="width:10%">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($brands_info as $brand_info): ?>
                            <tr>
                                <td>
                                    <div class="checkbox check-default">
                                        <input id="checkbox<?php echo $brand_info['id']; ?>" name="brandids[]" type="checkbox" class="checkparam" value="<?php echo $brand_info['id']; ?>">
                                        <label for="checkbox<?php echo $brand_info['id']; ?>"></label>
                                    </div>
                                </td>
                                <td><?php echo $brand_info['title']; ?></td>
                                <td align="center">
                                    <?php if ($brand_info['brand_img'] == 'No image found'): ?>
                                        <img src="/assets/img/no-img.png" width="80" height="80">
                                    <?php else: ?>
                                        <img src="/uploads/brand-img/<?php echo $brand_info['brand_img']; ?>" height="80" width="80">
                                    <?php endif; ?>
                                </td>
                                <td>        
                                            <?php if ($brand_info['status'] == "deactivate"): ?>
                                            <a href="/admin/brand/status/<?php echo $brand_info['id']; ?>" class="singleStatus"><span class="label label-important">Deactive</span></a>
                                            <?php else: ?>   
                                            <a href="/admin/brand/status/<?php echo $brand_info['id']; ?>" class="singleStatus"><span class="label label-info">Active</span></a>
                                            <?php endif; ?>
                                 </td>
                                <td>
                                    <a href="/admin/brand/edit/<?php echo $brand_info['id']; ?>" class="label label-info"> <i class="fa fa-edit"></i></a>
                                    <a href="/admin/brand/delete/<?php echo $brand_info['id']; ?>" class="label label-important singleDelete"> <i class="fa fa-trash-o"></i></a>    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo form_close(); ?>
                    <!-- <div>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                    <?php echo $this->pagination->create_links(); ?>
                    <?php else: ?>                    
                    <div class="alert alert-info">
                        <strong>Info!</strong> No Record Found!
                    </div>
                    <?php endif ?>

                </div>
            </div>
        </div>
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>


<script> 
    $(document).ready(function(){

        //single status
        $('.singleStatus').on('click',function(event){
            event.preventDefault();
            var href = $(this).attr('href');
            var self = $(this);

            self.html('<img src="/assets/img/loading3.gif" alt="">');

            $.get(href,function(response){
                if (response == 'activate') {
                    self.html('<span class="label label-info">Active</span>');
                }
                else
                {
                    self.html('<span class="label label-important">Deactive</span>');
                }
            });
        });

        //single delete
        $('.singleDelete').on('click',function(event){
            event.preventDefault();
            if (confirm('Are you sure you wanna delete it?')) {
                var href = $(this).attr('href');
                var self = $(this);

                $.get(href,function(response){
                    if (response == 1) {
                        self.closest('tr').css('background-color','red').fadeOut('slow');
                        self.remove();
                    }
                });
            }
        });

        //select all actives
        $('#selectAllActive').on('click',function(event){
            event.preventDefault();
            if ($('.checkparam:checked').length > 0) {
                var href = '/admin/brand/select_all_active/';
                var formSerial = $('#formView').serialize();

                $.post(href,formSerial,function(response){
                    if (response > 0) {
                        window.location.href = '/admin/brand/';
                    }
                });
            }
            else
            {
                alert('Select atleast one!');
            }
        });

        //select all deactivates
        $('#selectAllDeactive').on('click',function(event){
            event.preventDefault();
            if ($('.checkparam:checked').length > 0) {
                var href = '/admin/brand/select_all_deactivate/';
                var formSerial = $('#formView').serialize();

                $.post(href,formSerial,function(response){
                    if (response > 0) {
                        window.location.href = '/admin/brand/';
                    }
                });
            }
            else
            {
                alert('Select atleast one!');
            }
        });

        //select all delete
        $('#selectAllDelete').on('click',function(event){
            event.preventDefault();
            if ($('.checkparam:checked').length > 0) {
                var href = '/admin/brand/select_all_delete/';
                var formSerial = $('#formView').serialize();

                $.post(href,formSerial,function(response){
                    if (response > 0) {
                        window.location.href = '/admin/brand/';
                    }
                });
            }
            else
            {
                alert('Select atleast one!');
            }
        });

    });
</script>