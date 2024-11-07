<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(__('TMail - Installer')); ?></title>
    <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor.css')); ?>">
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <meta name="csrf_token" value="<?php echo e(csrf_token()); ?>"/>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body class="font-sans antialiased bg-gray-100">
    <main class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="pt-12">
                    <img class="m-auto -max-w-full" src="<?php echo e(asset('images/installer-logo.png')); ?>" alt="logo">
                </div>
                <div class="p-10">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('installer.installer')->html();
} elseif ($_instance->childHasBeenRendered('L7tAB6i')) {
    $componentId = $_instance->getRenderedChildComponentId('L7tAB6i');
    $componentTag = $_instance->getRenderedChildComponentTagName('L7tAB6i');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('L7tAB6i');
} else {
    $response = \Livewire\Livewire::mount('installer.installer');
    $html = $response->html();
    $_instance->logRenderedChild('L7tAB6i', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </main>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html><?php /**PATH /Applications/MAMP/htdocs/prio.email/resources/views/installer/index.blade.php ENDPATH**/ ?>