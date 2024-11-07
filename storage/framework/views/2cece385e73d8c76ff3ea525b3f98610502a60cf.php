<div class="flex-1" x-data="{ show: false, id: 0 }">
    <?php if($error): ?>
        <div id="imap-error" class="flex items-center w-full h-full fixed top-0 left-0 bg-red-900 opacity-75 z-50">
            <div class="flex flex-col mx-auto">
                <div class="w-36 mx-auto text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-3xl text-center text-white my-5"><?php echo e(__('IMAP Broken')); ?></div>
                <div class="p-2 mx-auto bg-red-800 text-white leading-none lg:lg:rounded-full flex lg:inline-flex"
                    role="alert">
                    <span
                        class="flex lg:rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3"><?php echo e(__('Error')); ?></span>
                    <span class="font-semibold mr-2 text-left flex-auto"><?php echo e($error); ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="text-sm rounded-lg">
        <?php if($messages): ?>
            <div class="mailbox bg-[#fff4] rounded-lg">
                <div x-show="!show" class="list">
                    <div class="head flex items-center gap-3 p-4 rounded-t-lg"
                        style="background-color: <?php echo e(config('app.settings.colors.primary')); ?>20">
                        <div class="hidden md:flex md:w-3/12"><?php echo e(__('Sender')); ?></div>
                        <div class="hidden md:flex md:w-7/12"><?php echo e(__('Subject')); ?></div>
                        <div class="hidden md:flex md:w-2/12 justify-end"><?php echo e(__('Time')); ?></div>

                        
                        <div class="flex md:hidden w-full"><?php echo e(__('Inbox')); ?></div>
                    </div>

                    
                    <div class="messagesListArea">
                        <div class="messages flex flex-col justify-end space-y-2 px-1 pb-1">
                            <?php $__currentLoopData = $messages2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!in_array($i, $deleted)): ?>
                                    
                                    <div x-on:click="show = true; id = <?php echo e($message['id']); ?>; document.querySelector('button.delete').setAttribute('wire:click', 'delete(<?php echo e($message['id']); ?>)')"
                                        class="hidden md:flex p-2 bg-[#ffffff2d] rounded-lg shadow-lg items-center gap-x-4 cursor-pointer mt-2"
                                        data-id="<?php echo e($message['id']); ?>" wire:click="updateView(<?php echo e($message['id']); ?>)">
                                        <div class="hidden md:block w-1/2 md:w-3/12">
                                            <?php echo e($message['sender_name']); ?>

                                            <div class="text-xs overflow-ellipsis"><?php echo e($message['sender_email']); ?>

                                            </div>
                                        </div>
                                        <div class=" md:w-7/12"><?php echo e($message['subject']); ?></div>
                                        <div class="hidden md:block w-full md:w-2/12">
                                            <div class="flex justify-end">
                                                <?php echo e($message['datediff']); ?>

                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div x-on:click="show = true; id = <?php echo e($message['id']); ?>; document.querySelector('button.delete').setAttribute('wire:click', 'delete(<?php echo e($message['id']); ?>)')"
                                        class="flex md:hidden p-2 bg-[#ffffff2d] rounded-lg shadow-lg items-center gap-x-4 cursor-pointer"
                                        data-id="<?php echo e($message['id']); ?>" wire:click="updateView(<?php echo e($message['id']); ?>)">
                                        <div class="min-w-8">
                                            <div
                                                class="h-8 w-8 bg-[#ffffff56] flex justify-center items-center rounded-full text-base font-semibold font-exo">
                                                
                                                <?php echo e(strtoupper(substr($message['sender_name'], 0, 1))); ?>

                                            </div>
                                        </div>
                                        <div class="overflow-hidden">
                                            <h2 class="text-sm font-medium text-black dark:text-white line-clamp-1">
                                                <?php echo e($message['sender_name']); ?>

                                            </h2>
                                            <p class="text-slate-500 dark:text-gray-100 line-clamp-1">
                                                <?php echo e($message['subject']); ?>

                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="pagination-links">
                            <?php echo e($messages2->links()); ?>

                        </div>
                    </div>

                </div>

                
                <div x-show="show" class="message">

                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div x-show="id === <?php echo e($message['id']); ?>" id="message-<?php echo e($message['id']); ?>">
                            <div class="head flex items-center text-white p-4 rounded-t-lg"
                                style="background-color: <?php echo e(config('app.settings.colors.primary')); ?>99">
                                <div class="w-full flex justify-between items-center">
                                    <div x-on:click="show = false" class="flex items-center cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 19.5 8.25 12l7.5-7.5" />
                                        </svg>

                                        <span class="ml-2 hidden md:block"><?php echo e(__('Go Back to Inbox')); ?></span>
                                    </div>
                                    <div class="flex gap-3">
                                        <a class="download flex items-center cursor-pointer" href="#"
                                            x-bind:data-id="id">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6 block md:hidden">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                                            </svg>
                                            <span class="hidden md:block"><?php echo e(__('Download')); ?></span>
                                        </a>
                                        <button
                                            x-on:click="id = 0; show = false; document.querySelector(`.mailbox .list [data-id='<?php echo e($message['id']); ?>']`).remove()"
                                            class="delete flex items-center cursor-pointer"
                                            wire:click="delete(<?php echo e($message['id']); ?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6 block md:hidden">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>

                                            <span class="hidden md:block"><?php echo e(__('Delete')); ?></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="message">
                                <textarea class="hidden">To: <?php echo e($this->email); ?>&#13;From: "<?php echo e($message['sender_name']); ?>" <<?php echo e($message['sender_email']); ?>>&#13;Subject: <?php echo e($message['subject']); ?>&#13;Date: <?php echo e($message['date']); ?>&#13;Content-Type: text/html&#13;&#13;<?php echo e($message['content']); ?></textarea>
                                <div class="flex justify-between items-center p-4">
                                    <div>
                                        <?php echo e($message['sender_name']); ?>

                                        <div class="text-xs overflow-ellipsis">
                                            <?php echo e($message['sender_email']); ?>

                                        </div>
                                    </div>
                                    <div>
                                        <?php echo e(__('Date')); ?>

                                        <div class="text-xs overflow-ellipsis">
                                            <?php echo e($message['date']); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="border-t border-b border-dashed p-4">
                                    <?php echo e($message['subject']); ?>

                                </div>
                                <div class="text-wrap p-4">
                                    <iframe class="w-full flex flex-grow h-[45vh]" srcdoc="<?php echo e($message['content']); ?>"
                                        frameborder="0"></iframe>
                                    <?php if(count($message['attachments']) > 0): ?>
                                        <span class="pt-5 pb-3 px-6 text-xs"><?php echo e(__('Attachments')); ?></span>
                                        <div class="flex pb-5 px-6">
                                            <?php $__currentLoopData = $message['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a class="py-2 px-3 mr-3 text-sm border-2 border-black lg:rounded-md hover:bg-black hover:text-white"
                                                    href="<?php echo e($attachment['url']); ?>" download><i
                                                        class="fas fa-chevron-circle-down"></i><span
                                                        class="ml-2"><?php echo e($attachment['file']); ?></span></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </div>
        <?php else: ?>
            
            <?php if($initial): ?>
                <div class="space-y-20 lg:space-y-10">
                    <!-- Priyo mail bio -->
                    <div class="max-w-[600px] mx-auto flex justify-center items-center flex-col">
                        <h2 class="text-3xl font-lexend font-bold py-4">Priyo Mail</h2>
                        <p class="text-center text-lg"><?php echo e(__('Create Temp Mail in Just second.')); ?></p>
                        <p class="text-center text-lg"><?php echo e(__('Temp Mail Protects Your Privacy.')); ?></p>
                        <p class="text-center text-lg"><?php echo e(__('Temp Mail Safely and Securely.')); ?></p>
                    </div>

                    <!-- blog section -->
                    <div class="hidden lg:grid grid-flow-row-dense grid-cols-3 gap-2">
                        <?php if(!isset($blogDetails)): ?>
                            <?php if (isset($component)) { $__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\RecentBlog::class, []); ?>
<?php $component->withName('recent-blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d)): ?>
<?php $component = $__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d; ?>
<?php unset($__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="space-y-20 lg:space-y-10">
                    <!-- Priyo mail bio -->
                    <div class="max-w-[600px] mx-auto flex justify-center items-center flex-col">
                        <h2 class="text-3xl font-lexend font-bold py-4">Priyo Mail</h2>
                        <p class="text-center text-lg"><?php echo e(__('Create Temp Mail in Just second.')); ?></p>
                        <p class="text-center text-lg"><?php echo e(__('Temp Mail Protects Your Privacy.')); ?></p>
                        <p class="text-center text-lg"><?php echo e(__('Temp Mail Safely and Securely.')); ?></p>
                    </div>

                    <!-- blog section -->
                    <div class="hidden lg:grid grid-flow-row-dense grid-cols-3 gap-2">
                        <?php if(!isset($blogDetails)): ?>
                            <?php if (isset($component)) { $__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\RecentBlog::class, []); ?>
<?php $component->withName('recent-blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d)): ?>
<?php $component = $__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d; ?>
<?php unset($__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\Laraverl Project\priyomail\resources\views/themes/priyonew/components/app.blade.php ENDPATH**/ ?>