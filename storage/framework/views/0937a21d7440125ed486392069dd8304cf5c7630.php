<div class="grid grid-flow-row-dense grid-cols-4 gap-2">

    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div
            class="p-6 col-span-4 md:col-span-2 xl:col-span-1 bg-white dark:bg-dark-primary rounded-lg shadow-lg flex items-center gap-x-4">
            <div class="shrink-0">
                <img class="size-12" src="<?php echo e(asset('images/' . $blog->image)); ?>" alt="<?php echo e($blog->title); ?>" />
            </div>
            <div class="overflow-hidden">
                <a href="<?php echo e(route('home') . '/' . $blog->slug); ?>">
                    <h2 class="text-xl font-medium text-black dark:text-white line-clamp-1">
                        <?php echo e($blog->title); ?>

                    </h2>
                    <p class="text-slate-500 dark:text-gray-100 line-clamp-1">
                        <?php echo e(substr(strip_tags($blog->content), 0, 50)); ?>

                    </p>
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




</div>
<div class="pagination-links">
    <?php echo e($blogs->links()); ?>

</div>
<?php /**PATH D:\Laraverl Project\priyomail\resources\views/themes/priyonew/components/blog.blade.php ENDPATH**/ ?>