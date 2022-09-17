<?php $__env->startSection('content'); ?>
        <div class="blog-post-area">
            <h2 class="title text-center">Tin Tức Công Nghệ</h2>
            <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="single-blog-post">

               <a href=""><h2><?php echo e($blog1->title); ?></h2></a>
                <div class="post-meta">
                    <ul>
                        <li><i class="fa fa-user"></i> <?php echo e($blog1->created_at); ?></li>

                    </ul>







                </div>
                <a href="">
                    <img src="public/uploads/post/<?php echo e($blog1->image); ?>" alt="" width="50%">
                </a>
                <p><?php echo $blog1->short_description; ?></p>
                <a  class="btn btn-primary" href="">Read More</a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="pagination-area">
                <ul class="pagination">
                    <?php echo $blog->links(); ?>


                </ul>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopbanhanglaravel\resources\views/pages/blog.blade.php ENDPATH**/ ?>