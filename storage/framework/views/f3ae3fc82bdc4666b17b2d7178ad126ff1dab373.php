<div class="grid grid-cols-1 lg:grid-cols-[3fr_1fr] gap-4">
    <div class="blog_details_part overflow-hidden">
        <h1 class="text-lg md:text-xl font-poppins font-semibold"><?php echo e($blogDetails->title); ?></h1>
        <p><i><?php echo e($blogDetails->updated_at->format('d M Y')); ?></i></p>
        <div class="w-full max-h-72 my-4 text-center rounded-lg object-center overflow-hidden">
            <img src="<?php echo e(asset('images/' . $blogDetails->image)); ?>" alt="<?php echo e($blogDetails->title); ?>">
        </div>

        <div class="my-4">
            <?php if(config('app.settings.ads.two')): ?>
                <div class="flex justify-center items-center max-w-full ads-two">
                    <?php echo config('app.settings.ads.two'); ?>

                </div>
            <?php endif; ?>
        </div>

        <?php echo $blogDetails->content; ?>

    </div>
    <div class="blog_sidebar hidden md:block overflow-hidden">
        <div class="blog_prio_content_sc">
            <div class="grid grid-flow-row-dense grid-cols-2 gap-2">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div
                        class="p-6 col-span-2 md:col-span-1 lg:col-span-2 bg-white dark:bg-dark-primary rounded-lg shadow-lg flex items-center gap-x-4">
                        <div class="shrink-0">
                            <img class="size-12" src="<?php echo e(asset('images/' . $blog->image)); ?>"
                                alt="<?php echo e($blog->title); ?>" />
                        </div>
                        <div class="overflow-hidden">
                            <a href="<?php echo e(route('home') . '/' . $blog->slug); ?>">
                                <h2 class="text-xl font-medium text-black dark:text-white line-clamp-1">
                                    <?php echo e($blog->title); ?>

                                </h2>
                            </a>
                            <p class="text-slate-500 dark:text-gray-100 line-clamp-1">
                                <?php echo e(substr(strip_tags($blog->content), 0, 50)); ?>

                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="my-4">
                <?php if(config('app.settings.ads.one')): ?>
                    <div class="flex justify-center items-center max-w-full ads-one">
                        <?php echo config('app.settings.ads.one'); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
<?php /**PATH D:\Laraverl Project\priyomail\resources\views/themes/priyonew/components/blogDetails.blade.php ENDPATH**/ ?>