<?php $__env->startSection('admin_content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa bài viết
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">

                    <div class="position-center">
                        <?php $__currentLoopData = $edit_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form role="form" action="<?php echo e(route('updatepost',['id'=>$edit->id])); ?>" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết mới</label>
                                <input type="text" value="<?php echo e($edit->title); ?>" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="title" class="form-control " id="slug" placeholder="Tên bài viết" onkeyup="ChangeToSlug();">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" value="<?php echo e($edit->slug); ?>" name="slug" class="form-control " id="convert_slug" placeholder="Tên danh mục">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục tin tức</label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                    <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($cate->brand_id==$edit->brand_id): ?>
                                        <option selected value="<?php echo e($cate->brand_id); ?>"><?php echo e($cate->brand_name); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($cate->brand_id); ?>"><?php echo e($cate->brand_name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="image" class="form-control" id="exampleInputEmail1" alt="Chọn ảnh mới">
                                <img src="<?php echo e(URL::to('public/uploads/post/'.$edit->image)); ?>" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả bài viết</label>
                                <textarea style="resize: none"  rows="5" class="form-control" name="short_description" id="ckeditor9" placeholder="Mô tả sản phẩm"><?php echo e($edit->short_description); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khoá tìm kiếm</label>
                                <input type="text" value="<?php echo e($edit->key_word); ?>" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="key_word" class="form-control " placeholder="Từ khoá tìm kiếm" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung bài viết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="content"  id="id5" placeholder="Nội dung bài viết"><?php echo e($edit->content); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="post_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>

                                </select>
                            </div>

                            <button type="submit"  class="btn btn-info">Chỉnh sửa bài viết</button>
                        </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </section>

        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopbanhanglaravel\resources\views/admin/edit_post.blade.php ENDPATH**/ ?>