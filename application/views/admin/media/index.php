     
    <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Manage Media</h2>
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
                            <a href="/admin/media/selectAllActive" id="selectAllActive" class="btn btn-primary tip" data-toggle="tooltip" title="Active Selected"><i class="fa fa-eye"></i></a>
                            <a href="/admin/media/selectAllDeactive" id="selectAllDeactive" class="btn btn-primary tip" data-toggle="tooltip" title="Deactive Selected"><i class="fa fa-eye-slash"></i></a>
                            <a href="/admin/media/selectAllDelete" id="selectAllDelete" class="btn btn-primary tip" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-trash"></i></a>
                            <a href="/admin/media/add" class="btn btn-primary tip" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
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
                                        <input type="text" name="q" value="<?php echo $this->input->get('q'); ?>" class="form-control" placeholder="Search" value="">
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
                    <?php if($medias_info): ?>  
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
                                <th style="width:30%">Title</th>
                                <th style="width:17%">Media Type</th>
                                <th style="width:17%">Media Image</th>
                                <th style="width:10%">Status</th>
                                <th style="width:10%">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($medias_info as $media_info): ?>
                            <tr align="center">
                                <td>
                                    <div class="checkbox check-default">
                                        <input id="checkbox <?php echo $media_info['id']; ?>"  class="checkparam" type="checkbox" value="<?php echo $media_info['id']; ?>" name="mediaids[]">
                                        <label for="checkbox <?php echo $media_info['id']; ?>"></label>
                                    </div>
                                </td>
                                <td align="left">
                                    <?php echo $media_info['title']; ?>
                                </td>
                                <td><?php echo $media_info['media_type']; ?></td>
                                <td>
                                    <?php if ($media_info['media_img'] == 'No image found' && empty($media_info['media_img'])): ?>
                                        <img src="/assets/admin/img/no-img.png" width="80" height="80">
                                    <?php else: ?>   
                                        <img src="/uploads/media_images/<?php echo $media_info['media_img']; ?>" alt="" width="80" height="80">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($media_info['status'] == "deactivate"): ?>
                                    <a href="/admin/media/status/<?php echo $media_info['id']; ?>" class="singleStatus"><span class="label label-important">Deactive!</span></a>
                                    <?php else: ?>    
                                    <a href="/admin/media/status/<?php echo $media_info['id']; ?>" class="singleStatus"><span class="label label-info">Active!</span></a>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="/admin/media/edit/<?php echo $media_info['id']; ?>" class="label label-info"> <i class="fa fa-edit"></i></a>
                                    <a href="/admin/media/delete/<?php echo $media_info['id']; ?>" class="label label-important singleDelete"> <i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php echo form_close(); ?>
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

                $.post('/admin/media/selectAllActive',formSerialize,function(response){
                    if(response > 0)
                        window.location.href = '/admin/media';
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

                $.post('/admin/media/selectAllDeactive',formSerialize,function(response){
                    if(response > 0)
                        window.location.href = '/admin/media';
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

                $.post('/admin/media/selectAllDelete',formSerialize,function(response){
                    if(response > 0)
                        window.location.href = '/admin/media';
                });
            }
            else
            {
                alert('Select Atleast One!');
            }
        });


    });
</script>
