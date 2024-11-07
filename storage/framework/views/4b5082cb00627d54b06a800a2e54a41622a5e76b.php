<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Settings')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.general')->html();
} elseif ($_instance->childHasBeenRendered('77CdAOx')) {
    $componentId = $_instance->getRenderedChildComponentId('77CdAOx');
    $componentTag = $_instance->getRenderedChildComponentTagName('77CdAOx');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('77CdAOx');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.general');
    $html = $response->html();
    $_instance->logRenderedChild('77CdAOx', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.engine')->html();
} elseif ($_instance->childHasBeenRendered('oCQR9wE')) {
    $componentId = $_instance->getRenderedChildComponentId('oCQR9wE');
    $componentTag = $_instance->getRenderedChildComponentTagName('oCQR9wE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('oCQR9wE');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.engine');
    $html = $response->html();
    $_instance->logRenderedChild('oCQR9wE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div id="imap-settings" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" style="<?php echo e(config('app.settings.engine') == 'imap' ? '' : 'display: none'); ?>">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.imap')->html();
} elseif ($_instance->childHasBeenRendered('GLTqGwD')) {
    $componentId = $_instance->getRenderedChildComponentId('GLTqGwD');
    $componentTag = $_instance->getRenderedChildComponentTagName('GLTqGwD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GLTqGwD');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.imap');
    $html = $response->html();
    $_instance->logRenderedChild('GLTqGwD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.configuration')->html();
} elseif ($_instance->childHasBeenRendered('Yg1TTpD')) {
    $componentId = $_instance->getRenderedChildComponentId('Yg1TTpD');
    $componentTag = $_instance->getRenderedChildComponentTagName('Yg1TTpD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Yg1TTpD');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.configuration');
    $html = $response->html();
    $_instance->logRenderedChild('Yg1TTpD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 hidden">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.smtp')->html();
} elseif ($_instance->childHasBeenRendered('9NiWtN5')) {
    $componentId = $_instance->getRenderedChildComponentId('9NiWtN5');
    $componentTag = $_instance->getRenderedChildComponentTagName('9NiWtN5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9NiWtN5');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.smtp');
    $html = $response->html();
    $_instance->logRenderedChild('9NiWtN5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.ads')->html();
} elseif ($_instance->childHasBeenRendered('L8E5PuL')) {
    $componentId = $_instance->getRenderedChildComponentId('L8E5PuL');
    $componentTag = $_instance->getRenderedChildComponentTagName('L8E5PuL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('L8E5PuL');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.ads');
    $html = $response->html();
    $_instance->logRenderedChild('L8E5PuL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.socials')->html();
} elseif ($_instance->childHasBeenRendered('uXQDl4a')) {
    $componentId = $_instance->getRenderedChildComponentId('uXQDl4a');
    $componentTag = $_instance->getRenderedChildComponentTagName('uXQDl4a');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('uXQDl4a');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.socials');
    $html = $response->html();
    $_instance->logRenderedChild('uXQDl4a', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.advance')->html();
} elseif ($_instance->childHasBeenRendered('UxD52Gi')) {
    $componentId = $_instance->getRenderedChildComponentId('UxD52Gi');
    $componentTag = $_instance->getRenderedChildComponentTagName('UxD52Gi');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UxD52Gi');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.advance');
    $html = $response->html();
    $_instance->logRenderedChild('UxD52Gi', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <?php if(config('app.settings.theme') == 'groot' || config('app.settings.theme') == 'drax'): ?>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.theme')->html();
} elseif ($_instance->childHasBeenRendered('dlkg3Md')) {
    $componentId = $_instance->getRenderedChildComponentId('dlkg3Md');
    $componentTag = $_instance->getRenderedChildComponentTagName('dlkg3Md');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('dlkg3Md');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.theme');
    $html = $response->html();
    $_instance->logRenderedChild('dlkg3Md', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/priyo.email/tempmail-best.com/resources/views/backend/settings/index.blade.php ENDPATH**/ ?>