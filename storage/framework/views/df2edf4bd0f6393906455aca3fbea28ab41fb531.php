<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc><?php echo e(route('home')); ?></loc>
		<lastmod><?php echo e(date(DATE_ATOM)); ?></lastmod>
        <priority>1.0</priority>
	</url>
    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($page->parent_id): ?>
	<url>
		<loc><?php echo e(route('page', ['slug' => $page->parent()->slug, 'inner' => $page->slug])); ?></loc>
		<lastmod><?php echo e($page->updated_at->format('Y-m-d\TH:i:s.uP')); ?></lastmod>
        <priority>0.9</priority>
	</url>
    <?php else: ?>
	<url>
		<loc><?php echo e(route('page', $page->slug)); ?></loc>
		<lastmod><?php echo e($page->updated_at->format('Y-m-d\TH:i:s.uP')); ?></lastmod>
        <priority>0.9</priority>
	</url>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<url>
			<loc><?php echo e(route('home').'/'.$blog->slug); ?></loc>
			<lastmod><?php echo e($blog->updated_at->format('Y-m-d\TH:i:s.uP')); ?></lastmod>
			<priority>0.9</priority>
		</url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset><?php /**PATH /home/cowt7s/domains/correo-temporal.com/public_html/resources/views/frontend/common/sitemap.blade.php ENDPATH**/ ?>