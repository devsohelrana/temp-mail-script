<section class="blog_mail_sc">
    <div class="container max-w-screen-lg mx-auto">
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
</section><?php /**PATH /var/www/vhosts/priyo.email/httpdocs/resources/views/themes/priyo/components/recentBlog.blade.php ENDPATH**/ ?>