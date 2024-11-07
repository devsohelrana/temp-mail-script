<section class="relative w-full h-16 bg-primary dark:bg-dark backdrop-blur-lg flex justify-between items-center px-4">
    <!-- hum icon -->
    <div id="humIcon" class="flex cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
        </svg>
    </div>

    <!-- top menu -->
    <div>
        <ul class="flex justify-end items-center gap-4">
            <li>
                <form action="<?php echo e(route('locale', '')); ?>" id="locale-form" method="post">
                    <?php echo csrf_field(); ?>
                    <!-- Dropdown for selecting language -->
                    <select class="bg-[#374151] h-8 px-2 rounded-lg text-white  uppercase" name="locale"
                        id="locale">
                        <?php $__currentLoopData = config('app.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(app()->getLocale() == $locale ? 'selected' : ''); ?>>
                                <!-- Display available locales -->
                                <?php echo e($locale); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </form>
                
            </li>
            <li id="darkModeToggle"
                class="w-8 h-8 bg-[#374151] rounded-full flex justify-center items-center cursor-pointer">
                <svg class="h-6 w-6 cursor-pointer font-sm" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    style="stroke-width: 2">
                    <!-- Icon for light mode -->
                    <path class="hidden dark:inline text-white" stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    <!-- Icon for dark mode -->
                    <path class="dark:hidden text-white" stroke-linecap="round" stroke-linejoin="round"
                        d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>
            </li>

            <li
                class="w-8 h-8 bg-[#374151] text-white rounded-full flex justify-center items-center font-exo text-xl font-bold">
                L
            </li>
        </ul>
    </div>
</section>
<?php /**PATH D:\Laraverl Project\priyomail\resources\views/themes/SoftFinding/components/nav.blade.php ENDPATH**/ ?>