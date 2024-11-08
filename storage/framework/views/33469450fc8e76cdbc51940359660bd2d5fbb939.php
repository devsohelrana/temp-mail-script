<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Themes')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.themes.theme')->html();
} elseif ($_instance->childHasBeenRendered('W0zTLdK')) {
    $componentId = $_instance->getRenderedChildComponentId('W0zTLdK');
    $componentTag = $_instance->getRenderedChildComponentTagName('W0zTLdK');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('W0zTLdK');
} else {
    $response = \Livewire\Livewire::mount('backend.themes.theme');
    $html = $response->html();
    $_instance->logRenderedChild('W0zTLdK', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH /Applications/MAMP/htdocs/prio.email/resources/views/backend/themes/index.blade.php ENDPATH**/ ?>