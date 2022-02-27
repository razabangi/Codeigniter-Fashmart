
    <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Manage Products</h2>
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
                            <a href="/admin/product/add" class="btn btn-primary tip" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="col-md-6">
                            <?php echo form_open('',['name'=>'formSearch','id'=>'formSearch','method'=>'get']); ?>
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
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <br>
                    <?php if($get_all_products): 
                        echo form_open('',['id'=>'formView','name'=>'formView']);
                    ?>

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
                                <th style="width:15%">Brand</th>
                                <th style="width:17%">Product Image</th>
                                <th style="width:10%">Status</th>
                                <th style="width:10%">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_all_products as $products): ?>
                            <tr>
                                <td>
                                    <div class="checkbox check-default">
                                        <input id="checkbox<?php echo $products['id']; ?>" class="checkparam" name="productids[]" type="checkbox" value="<?php echo $products['id']; ?>">
                                        <label for="checkbox<?php echo $products['id']; ?>"></label>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $products['title']; ?><br>
                                    <a href="/admin/product_gallery/add/<?php echo $products['id']; ?>" class="tip" data-toggle="tooltip" title="Add Gallery"><i class="fa fa-image"></i></a>
                                </td>
                                <td><?php echo (isset($brand_array[$products['brand_id']])) ? $brand_array[$products['brand_id']] : null ; ?></td>
                                <td>
                                    <?php if ($products['product_img'] == "No image found"): ?>
                                        <img src="/assets/admin/img/no-img.png" width="80" height="80" class="thumbnail">
                                    <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $products['product_img']; ?>" width="80" height="80">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($products['status'] == "deactivate"): ?>
                                        <a href="/admin/product/status/<?= $products['id']; ?>" class="singleStatus"><span class="label label-important">Deactive!</span></a>
                                    <?php else: ?>
                                        <a href="/admin/product/status/<?= $products['id']; ?>" class="singleStatus"><span class="label label-info">Active!</span></a>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="/admin/product/edit/<?php echo $products['id']; ?>" class="label label-info"> <i class="fa fa-edit"></i></a>
                                    <a href="/admin/product/delete/<?php echo $products['id']; ?>" class="label label-important singleDelete"> <i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php echo form_close(); ?>
                 <!--    <div>
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

            self.html('<img src="/assets/admin/img/loading3.gif" alt="">');

            $.get(href,function(response){
                if (response == 'activate') {
                    self.html('<span class="label label-important">Deactive</span>');
                }
                else
                {
                    self.html('<span class="label label-info">Active</span>');
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

        // multi select active
        $('#selectAllActive').on('click',function(event){
            event.preventDefault();
            if ($('.checkparam:checked').length > 0) {
                var href = '/admin/product/selectAllActive';
                var formSerialize = $('#formView').serialize();

                $.post(href,formSerialize,function(response){
                    if (response > 0) {
                        window.location.href = '/admin/product';
                    }
                });
            }
            else
            {
                alert('select atleast one');
            }
        });

        // select multi deactivate
        $('#selectAllDeactive').on('click',function(event){
            event.preventDefault();
            if ($('.checkparam:checked').length > 0) {
                var href = '/admin/product/selectAllDeactive';
                var formSerialize = $('#formView').serialize();

                $.post(href,formSerialize,function(response){
                    if (response > 0) {
                        window.location.href = '/admin/product';
                    }
                });
            }
            else
            {
                alert('select atleast one!');
            }
        });

        // select multi delete
        $('#selectAllDelete').on('click',function(event){
            event.preventDefault();

            var href = '/admin/product/selectAllDelete';
            var formSerialize = $('#formView').serialize();

            $.post(href,formSerialize,function(response){
                if (response > 0) {
                    window.location.href = '/admin/product';
                }
            });
        });


    });
</script>

