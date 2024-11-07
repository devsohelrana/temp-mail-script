<main class="blog_details_flex flex-1 page ql-editor p-5">
    <div class="blog_details_part">
        <h1><?php echo e($blogDetails->title); ?></h1>
        <p><i><?php echo e($blogDetails->updated_at->format('d M Y')); ?></i></p>
        <img src="<?php echo e(asset('images/'.$blogDetails->image)); ?>" alt="">
        <?php echo $blogDetails->content; ?>

    </div>
    <div class="blog_sidebar">
     <div class="blog_prio_content_sc">
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="blog_prio_item_sc">
            <a href="<?php echo e(route('home').'/'.$blog->slug); ?>">
               <div class="single_blog_item">
                    <div class="gorsel">
                        <img src="<?php echo e(asset('images/'.$blog->image)); ?>" alt="<?php echo e($blog->title); ?>">
                    </div>
                    <div class="detay">
                        <h3><?php echo e($blog->title); ?></h3>
                        <p><?php echo e(substr(strip_tags($blog->content),0,50)); ?></p>
                    </div>
                </div> 
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</main><?php /**PATH /home/cowt7s/domains/correo-temporal.com/public_html/resources/views/themes/priyo/components/blogDetails.blade.php ENDPATH**/ ?>