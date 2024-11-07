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
} elseif ($_instance->childHasBeenRendered('JqtLrMJ')) {
    $componentId = $_instance->getRenderedChildComponentId('JqtLrMJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('JqtLrMJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('JqtLrMJ');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.general');
    $html = $response->html();
    $_instance->logRenderedChild('JqtLrMJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.engine')->html();
} elseif ($_instance->childHasBeenRendered('gpHE1Vj')) {
    $componentId = $_instance->getRenderedChildComponentId('gpHE1Vj');
    $componentTag = $_instance->getRenderedChildComponentTagName('gpHE1Vj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gpHE1Vj');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.engine');
    $html = $response->html();
    $_instance->logRenderedChild('gpHE1Vj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div id="imap-settings" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" style="<?php echo e(config('app.settings.engine') == 'imap' ? '' : 'display: none'); ?>">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.imap')->html();
} elseif ($_instance->childHasBeenRendered('0pWFEZM')) {
    $componentId = $_instance->getRenderedChildComponentId('0pWFEZM');
    $componentTag = $_instance->getRenderedChildComponentTagName('0pWFEZM');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0pWFEZM');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.imap');
    $html = $response->html();
    $_instance->logRenderedChild('0pWFEZM', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.configuration')->html();
} elseif ($_instance->childHasBeenRendered('Aha6J3h')) {
    $componentId = $_instance->getRenderedChildComponentId('Aha6J3h');
    $componentTag = $_instance->getRenderedChildComponentTagName('Aha6J3h');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Aha6J3h');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.configuration');
    $html = $response->html();
    $_instance->logRenderedChild('Aha6J3h', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 hidden">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.smtp')->html();
} elseif ($_instance->childHasBeenRendered('iG7mrzl')) {
    $componentId = $_instance->getRenderedChildComponentId('iG7mrzl');
    $componentTag = $_instance->getRenderedChildComponentTagName('iG7mrzl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iG7mrzl');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.smtp');
    $html = $response->html();
    $_instance->logRenderedChild('iG7mrzl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.ads')->html();
} elseif ($_instance->childHasBeenRendered('iYvE6ao')) {
    $componentId = $_instance->getRenderedChildComponentId('iYvE6ao');
    $componentTag = $_instance->getRenderedChildComponentTagName('iYvE6ao');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iYvE6ao');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.ads');
    $html = $response->html();
    $_instance->logRenderedChild('iYvE6ao', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.socials')->html();
} elseif ($_instance->childHasBeenRendered('yqSKQGi')) {
    $componentId = $_instance->getRenderedChildComponentId('yqSKQGi');
    $componentTag = $_instance->getRenderedChildComponentTagName('yqSKQGi');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('yqSKQGi');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.socials');
    $html = $response->html();
    $_instance->logRenderedChild('yqSKQGi', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.advance')->html();
} elseif ($_instance->childHasBeenRendered('Mrvv5Uc')) {
    $componentId = $_instance->getRenderedChildComponentId('Mrvv5Uc');
    $componentTag = $_instance->getRenderedChildComponentTagName('Mrvv5Uc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Mrvv5Uc');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.advance');
    $html = $response->html();
    $_instance->logRenderedChild('Mrvv5Uc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <?php if(config('app.settings.theme') == 'groot' || config('app.settings.theme') == 'drax'): ?>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.theme')->html();
} elseif ($_instance->childHasBeenRendered('6wLvM3k')) {
    $componentId = $_instance->getRenderedChildComponentId('6wLvM3k');
    $componentTag = $_instance->getRenderedChildComponentTagName('6wLvM3k');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6wLvM3k');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.theme');
    $html = $response->html();
    $_instance->logRenderedChild('6wLvM3k', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php /**PATH /home/rubyatin/priomail.rubyat.info/resources/views/backend/settings/index.blade.php ENDPATH**/ ?>