<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <title><?php echo e(isset($pageTitle) ? $pageTitle . ' - ' . config('app.settings.name') : config('app.settings.name')); ?>

    </title>

    <?php echo config('app.settings.global.header'); ?>

    <?php if(Illuminate\Support\Facades\Storage::disk('local')->has('public/images/custom-favicon.png')): ?>
        <link rel="icon" href="<?php echo e(url('storage/images/custom-favicon.png')); ?>" type="image/png">
    <?php else: ?>
        <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/png">
    <?php endif; ?>

    
    <link rel="stylesheet" href="<?php echo e(asset('priyonew/css/priyonew.css')); ?>?v=1.0.5">

    <script src="<?php echo e(asset('vendor/Shortcode/Shortcode.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo config('app.settings.global.css'); ?>

    <?php if(!isset($page)): ?>
        <?php echo config('app.settings.app_header'); ?>

    <?php endif; ?>
    <?php echo $__env->make('frontend.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="bg-white dark:bg-dark-primary text-gray-900 dark:text-white">


    <?php if(isset($page)): ?>
        <h1 style="display: none;"><?php echo e($page->title); ?> - <?php echo e(config('app.settings.name')); ?></h1>
    <?php else: ?>
        <h1 style="display: none;"><?php echo e(config('app.settings.name')); ?></h1>
    <?php endif; ?>

    <div id="<?php echo e(Auth::check() ? '' : ''); ?>" class="priyonew">

        <!-- Side bar section -->
        <header id="sideMenu"
            class="relative hidden lg:block lg:fixed top-0 left-0 bottom-0 px-4 w-full lg:w-80 bg-primary dark:bg-dark dark:text-white">
            <div class="space-y-10">
                <div class="flex justify-between items-center gap-10 mt-5">
                    <a href="<?php echo e(route('home')); ?>"
                        class="font-exo text-3xl font-bold flex justify-start items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-purple-600 dark:text-green-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>

                        Priyo Mail
                    </a>

                    <!-- hum icon -->
                    <div id="closeIcon" class="flex lg:hidden cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>

                
                <nav>
                    <ul class="space-y-4">
                        
                        <li
                            class="bg-primary-hover dark:bg-dark-hover text-white text-lg px-2 py-1 rounded-lg transition-all duration-300">
                            <a href="<?php echo e(route('home')); ?>" class="flex justify-start gap-2 font-poppins">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                                </svg>
                                <span><?php echo e(__('Inbox')); ?></span>
                            </a>
                        </li>
                        
                        <li
                            class="text-lg px-2 py-1 rounded-lg hover:bg-primary-hover dark:hover:bg-dark-hover hover:text-white transition-all duration-300">
                            <a href="#" class="flex justify-start gap-2 font-poppins">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                </svg>

                                <span><?php echo e(__('API')); ?></span>
                            </a>
                        </li>
                        
                        <li
                            class="text-lg px-2 py-1 rounded-lg hover:bg-primary-hover dark:hover:bg-dark-hover hover:text-white transition-all duration-300">
                            <a href="#" class="flex justify-start gap-2 font-poppins">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                </svg>

                                <span><?php echo e(__('FAQ')); ?></span>
                            </a>
                        </li>
                        
                        <li
                            class="text-lg px-2 py-1 rounded-lg hover:bg-primary-hover dark:hover:bg-dark-hover hover:text-white transition-all duration-300">
                            <a href="#" class="flex justify-start gap-2 font-poppins">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                                </svg>

                                <span><?php echo e(__('Privacy')); ?></span>
                            </a>
                        </li>
                        
                        
                        
                        <li
                            class="text-lg px-2 py-1 rounded-lg hover:bg-primary-hover dark:hover:bg-dark-hover hover:text-white transition-all duration-300">
                            <a href="#" class="flex justify-start gap-2 font-poppins">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <span><?php echo e(__('Feedback')); ?></span>
                            </a>
                        </li>
                        
                        <li
                            class="text-lg px-2 py-1 rounded-lg hover:bg-primary-hover dark:hover:bg-dark-hover hover:text-white transition-all duration-300">
                            <a href="#" class="flex justify-start gap-2 font-poppins">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                </svg>

                                <span><?php echo e(__('Contacts')); ?></span>
                            </a>
                        </li>
                    </ul>
                </nav>

                
                <div class="w-full h-72 bg-[#84ace71a] rounded-lg overflow-hidden flex justify-center items-center ">
                    <?php if(config('app.settings.ads.one')): ?>
                        <div class="flex justify-center items-center max-w-full ads-one">
                            <?php echo config('app.settings.ads.one'); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </header>

        <!-- top bar -->
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.nav')->html();
} elseif ($_instance->childHasBeenRendered('MIY0Q0b')) {
    $componentId = $_instance->getRenderedChildComponentId('MIY0Q0b');
    $componentTag = $_instance->getRenderedChildComponentTagName('MIY0Q0b');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MIY0Q0b');
} else {
    $response = \Livewire\Livewire::mount('frontend.nav');
    $html = $response->html();
    $_instance->logRenderedChild('MIY0Q0b', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <!-- main section -->
        <main class="relative ml-0 lg:ml-80 overflow-hidden">
            <!-- color pattern -->
            <div class="absolute left-2/4 -translate-x-2/4 w-96 h-32 bg-[#1C1FC2] rounded-full blur-[150px]">
            </div>

            <!-- action button -->
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.actions', ['in_app' => isset($page) ? true : false])->html();
} elseif ($_instance->childHasBeenRendered('Ho06nN7')) {
    $componentId = $_instance->getRenderedChildComponentId('Ho06nN7');
    $componentTag = $_instance->getRenderedChildComponentTagName('Ho06nN7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Ho06nN7');
} else {
    $response = \Livewire\Livewire::mount('frontend.actions', ['in_app' => isset($page) ? true : false]);
    $html = $response->html();
    $_instance->logRenderedChild('Ho06nN7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            <!-- body section -->
            <section id="inboxBox"
                class="relative mx-3 lg:mx-4 h-auto lg:min-h-[74vh] bg-primary dark:bg-dark backdrop-blur-lg rounded-lg p-2 lg:p-4">
                <!-- color pattern -->
                <div
                    class="absolute left-0 top-2/4 -translate-y-2/4 w-72 h-72 bg-purple-600 rounded-full blur-[150px] -z-10">
                </div>

                
                <div class="space-y-20 lg:space-y-10">
                    <?php if(isset($page)): ?>
                        <?php if($page->mailbox == 1): ?>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.app')->html();
} elseif ($_instance->childHasBeenRendered('Gr2kKnB')) {
    $componentId = $_instance->getRenderedChildComponentId('Gr2kKnB');
    $componentTag = $_instance->getRenderedChildComponentTagName('Gr2kKnB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Gr2kKnB');
} else {
    $response = \Livewire\Livewire::mount('frontend.app');
    $html = $response->html();
    $_instance->logRenderedChild('Gr2kKnB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <?php endif; ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.page', ['page' => $page])->html();
} elseif ($_instance->childHasBeenRendered('T0v7Jo5')) {
    $componentId = $_instance->getRenderedChildComponentId('T0v7Jo5');
    $componentTag = $_instance->getRenderedChildComponentTagName('T0v7Jo5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('T0v7Jo5');
} else {
    $response = \Livewire\Livewire::mount('frontend.page', ['page' => $page]);
    $html = $response->html();
    $_instance->logRenderedChild('T0v7Jo5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php elseif(isset($profile)): ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.profile', ['profile' => $profile])->html();
} elseif ($_instance->childHasBeenRendered('0JZEO9t')) {
    $componentId = $_instance->getRenderedChildComponentId('0JZEO9t');
    $componentTag = $_instance->getRenderedChildComponentTagName('0JZEO9t');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0JZEO9t');
} else {
    $response = \Livewire\Livewire::mount('frontend.profile', ['profile' => $profile]);
    $html = $response->html();
    $_instance->logRenderedChild('0JZEO9t', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php elseif(isset($login)): ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.userlogin', ['login' => $login])->html();
} elseif ($_instance->childHasBeenRendered('6sT0zwe')) {
    $componentId = $_instance->getRenderedChildComponentId('6sT0zwe');
    $componentTag = $_instance->getRenderedChildComponentTagName('6sT0zwe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6sT0zwe');
} else {
    $response = \Livewire\Livewire::mount('frontend.userlogin', ['login' => $login]);
    $html = $response->html();
    $_instance->logRenderedChild('6sT0zwe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php elseif(isset($signup)): ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.usersignup', ['signup' => $signup])->html();
} elseif ($_instance->childHasBeenRendered('B0PobFn')) {
    $componentId = $_instance->getRenderedChildComponentId('B0PobFn');
    $componentTag = $_instance->getRenderedChildComponentTagName('B0PobFn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('B0PobFn');
} else {
    $response = \Livewire\Livewire::mount('frontend.usersignup', ['signup' => $signup]);
    $html = $response->html();
    $_instance->logRenderedChild('B0PobFn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php elseif(isset($blog)): ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.blog', ['blog' => $blog])->html();
} elseif ($_instance->childHasBeenRendered('aVnQIwV')) {
    $componentId = $_instance->getRenderedChildComponentId('aVnQIwV');
    $componentTag = $_instance->getRenderedChildComponentTagName('aVnQIwV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('aVnQIwV');
} else {
    $response = \Livewire\Livewire::mount('frontend.blog', ['blog' => $blog]);
    $html = $response->html();
    $_instance->logRenderedChild('aVnQIwV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php elseif(isset($blogDetails)): ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.blogdetails', ['blogDetails' => $blogDetails])->html();
} elseif ($_instance->childHasBeenRendered('xph4f0j')) {
    $componentId = $_instance->getRenderedChildComponentId('xph4f0j');
    $componentTag = $_instance->getRenderedChildComponentTagName('xph4f0j');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('xph4f0j');
} else {
    $response = \Livewire\Livewire::mount('frontend.blogdetails', ['blogDetails' => $blogDetails]);
    $html = $response->html();
    $_instance->logRenderedChild('xph4f0j', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php else: ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.app')->html();
} elseif ($_instance->childHasBeenRendered('dGWbccu')) {
    $componentId = $_instance->getRenderedChildComponentId('dGWbccu');
    $componentTag = $_instance->getRenderedChildComponentTagName('dGWbccu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('dGWbccu');
} else {
    $response = \Livewire\Livewire::mount('frontend.app');
    $html = $response->html();
    $_instance->logRenderedChild('dGWbccu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php endif; ?>

                    <!-- ads section -->
                    <div
                        class="w-full h-72 bg-[#84ace71a] rounded-lg overflow-hidden flex justify-center items-center !mb-36 md:!mb-0">
                        <?php if(config('app.settings.ads.two')): ?>
                            <div class="flex justify-center items-center max-w-full ads-two">
                                <?php echo config('app.settings.ads.two'); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </section>

            <!-- footer top section -->
            <section class="flex justify-center items-center px-4 py-2">
                <p class="text-center text-lg">
                    <?php echo e(__('Temporary mail - Tempmail - Temp Mail - Temp Email.')); ?>

                </p>
            </section>
        </main>

        <!-- footer section -->
        <footer
            class="w-full h-[5vh] bg-[#f1f1f1] dark:bg-dark flex justify-center items-center lg:fixed left-0 bottom-0 lg:w-80 border-t lg:border-teal-50 dark:lg:border-dark-line border-t-slate-200 z-50 text-lg font-medium">
            <p>
                © 2024
                <a href="#" target="_blank"
                    class="text-blue-600 dark:text-green-500 hover:text-cyan-500 transition-all duration-500">Priyo
                    Mail</a>
            </p>
        </footer>

    </div>

    <!--- Helper Text for Language Translation -->
    <div class="hidden language-helper">
        <div class="error"><?php echo e(__('Error')); ?></div>
        <div class="success"><?php echo e(__('Success')); ?></div>
        <div class="copy_text"><?php echo e(__('Email ID Copied to Clipboard')); ?></div>
    </div>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php if(!isset($page)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const email = '<?php echo e(App\Models\TMail::getEmail(true)); ?>';
                const add_mail_in_title = "<?php echo e(config('app.settings.add_mail_in_title') ? 'yes' : 'no'); ?>"
                if (add_mail_in_title === 'yes') {
                    document.title += ` - ${email}`;
                }
                Livewire.emit('syncEmail', email);
                Livewire.emit('fetchMessages');
            });
        </script>
    <?php endif; ?>
    <script>
        document.addEventListener('stopLoader', () => {
            document.getElementById('refresh').classList.add('rotate-180');
        });
        let counter = parseInt(<?php echo e(config('app.settings.fetch_seconds')); ?>);
        setInterval(() => {
            if (counter === 0 && document.getElementById('imap-error') === null && !document.hidden) {
                document.getElementById('refresh').classList.remove('rotate-180');
                Livewire.emit('fetchMessages');
                counter = parseInt(<?php echo e(config('app.settings.fetch_seconds')); ?>);
            }
            counter--;
            if (document.hidden) {
                counter = 1;
            }
        }, 1000);
    </script>
    <?php echo config('app.settings.global.js'); ?>

    <?php echo config('app.settings.global.footer'); ?>

    <?php if(config('app.settings.ad_block_detector_filename')): ?>
        <script src="<?php echo e(asset('storage/js/' . config('app.settings.ad_block_detector_filename'))); ?>" defer></script>
        <script defer>
            setTimeout(() => {
                const enable_ad_block_detector = "<?php echo e(config('app.settings.enable_ad_block_detector', false) ? 1 : 0); ?>"
                if (!document.getElementById('Q8CvrZzY9fphm6gG') && enable_ad_block_detector == "1") {
                    document.querySelector('.priyonew').remove()
                    document.querySelector('body > div').insertAdjacentHTML('beforebegin', `
                <div class="fixed w-screen h-screen bg-red-800 flex flex-col justify-center items-center gap-5 z-50 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-4xl font-bold"><?php echo e(__('Ad Blocker Detected')); ?></h1>
                    <h2><?php echo e(__('Disable the Ad Blocker to use ') . config('app.settings.name')); ?></h2>
                </div>
            `)
                }
            }, 500);
        </script>
    <?php endif; ?>

    
    <script src="<?php echo e(asset('priyonew/js/app.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\Laraverl Project\priyomail\resources\views/themes/priyonew/app.blade.php ENDPATH**/ ?>