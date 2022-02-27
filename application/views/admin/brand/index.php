     
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
                    <?php echo form_open('',['id'=>'formSearch','name'=>'formSearch','method'=>'get']); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/admin/brand/selectAllActive" id="selectAllActive" class="btn btn-primary tip" data-toggle="tooltip" title="Active Selected"><i class="fa fa-eye"></i></a>
                            <a href="/admin/brand/selectAllDeactive" id="selectAllDeactive" class="btn btn-primary tip" data-toggle="tooltip" title="Deactive Selected"><i class="fa fa-eye-slash"></i></a>
                            <a href="/admin/brand/selectAllDelete" id="selectAllDelete" class="btn btn-primary tip" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-trash"></i></a>
                            <a href="/admin/brand/add" class="btn btn-primary tip" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="per_page" onchange="javascript:document.forms['formSearch'].submit()" class="form-control">
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
                    </div>
                    <?php echo form_close(); ?>
                        
                    <br>
                    <?php if($get_all_brands): ?>
                    <?php echo form_open('',['id'=>'formView','name'=>'formView']); ?>
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
                            <?php foreach ($get_all_brands as $get_brands): ?>     
                            <tr>
                                <td>
                                    <div class="checkbox check-default">
                                        <input id="checkbox<?php echo $get_brands['id']; ?>" type="checkbox" name="brandids[]" class="checkparam" value="<?php echo $get_brands['id']; ?>">
                                        <label for="checkbox<?php echo $get_brands['id']; ?>"></label>
                                    </div>
                                </td>
                                <td><?php echo $get_brands['title']; ?></td>
                                <td align="center">
                                    <?php if ($get_brands['brand_img'] == 'No Image Found'): ?>
                                        <img src="/assets/admin/img/no-img.png" width="100" height="100" class="img img-thumbnail">
                                    <?php else: ?>
                                        <img src="/uploads/brand-images/<?php echo $get_brands['brand_img']; ?>" width="100" height="100" class="img img-thumbnail">
                                    <?php endif; ?>
                                </td>
                                <td>        
                                    <?php if ($get_brands['status'] == 'activate'): ?>
                                    <a href="/admin/brand/status/<?php echo $get_brands['id']; ?>" class="singleStatus"><span class="label label-info">Active</span></a>
                                    <?php else: ?>
                                    <a href="/admin/brand/status/<?php echo $get_brands['id']; ?>" class="singleStatus"><span class="label label-important">Deactive</span></a>   
                                    <?php endif; ?>
                                 </td>
                                <td>
                                    <a href="/admin/brand/edit/<?php echo $get_brands['id']; ?>" class="label label-info"> <i class="fa fa-edit"></i></a>
                                    <a href="/admin/brand/delete/<?php echo $get_brands['id']; ?>" class="label label-important singleDelete"> <i class="fa fa-trash-o"></i></a>    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo form_close(); ?>
                    <?php echo $this->pagination->create_links(); ?>
                    <?php else: ?>                  
                    <div class="alert alert-info">
                        <strong>Info!</strong> No Record Found!
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.singleStatus').click(function(event){
            event.preventDefault();
            var href = $(this).attr('href');
            var self = $(this);
            self.html('<img src="/assets/admin/img/loading3.gif">');
            $.get(href,function(response){
                if (response != 'activate') {
                    self.html('<span class="label label-info">Active</span>');
                }
                else
                {
                    self.html('<span class="label label-important">Deactive</span>');
                }
            });
        });

        $('.singleDelete').on('click',function(event){
            event.preventDefault();

            if (confirm('Are you sure you wanna delete it?')) {
                var href = $(this).attr('href');
                var self = $(this);

                $.get(href,function(response){
                    if (response == 1) {
                        self.closest('tr').css('background','red').fadeOut('slow');
                        self.remove();
                    }
                });
            }

        });

        // select all activate
        $('#selectAllActive').on('click',function(event){
            event.preventDefault();

            if ($('.checkparam:checked').length > 0) {
                var formSerialize = $('#formView').serialize();

                $.post('/admin/brand/selectAllActive',formSerialize,function(response){
                    if(response > 0)
                        window.location.href = '/admin/brand';
                });
            }
            else
            {
                alert('Select Atleast One!');
            }
        });

        // select all deactivate
        $('#selectAllDeactive').on('click',function(event){
            event.preventDefault();

            if ($('.checkparam:checked').length > 0) {
                var formSerialize = $('#formView').serialize();

                $.post('/admin/brand/selectAllDeactive',formSerialize,function(response){
                    if(response > 0)
                        window.location.href = '/admin/brand';
                });
            }
            else
            {
                alert('Select Atleast One!');
            }
        });

        // select all delete
        $('#selectAllDelete').on('click',function(event){
            event.preventDefault();

            if ($('.checkparam:checked').length > 0) {
                var formSerialize = $('#formView').serialize();

                $.post('/admin/brand/selectAllDelete',formSerialize,function(response){
                    if(response > 0)
                        window.location.href = '/admin/brand';
                });
            }
            else
            {
                alert('Select Atleast One!');
            }
        });


    });
</script>
