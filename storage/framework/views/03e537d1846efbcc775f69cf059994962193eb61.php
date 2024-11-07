<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Mail Accounts')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-50 text-gray-800 px-20 py-10">
                    <div class="alert alert-success">
                        <?php echo e(session()->get('status') ?: ''); ?>

                    </div>


                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-gray-700 dark:text-gray-300">
                            <form action="">
                                <input name="keyword" type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search..." value="<?php echo e($keyword); ?>">
                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-600 transition ease-in-out duration-150">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>

                    <table class="table-auto">
                        <thead>
                          <tr class="text-left">
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Recovery Mail</th>
                            <th class="border px-4 py-2">Created</th>
                            <th class="border px-4 py-2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__empty_1 = true; $__currentLoopData = $mails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                          <tr class="text-left">
                            <td class="border px-4 py-2"><?php echo e($mail->id); ?></td>
                            <td class="border px-4 py-2"><?php echo e($mail->email); ?></td>
                            <td class="border px-4 py-2"><?php echo e($mail->recoveryMail); ?></td>
                            <td class="border px-4 py-2"><?php echo e($mail->created_at->toDayDateTimeString()); ?></td>
                            <td class="border px-4 py-2">


                                <div class="flex text-white">
                                    <a href="<?php echo e(route('mail.edit',$mail)); ?>" class="cursor-pointer px-5 py-4 bg-blue-700 rounded-l-md "><i class="fas fa-edit"></i></a>
                                    <a target="_blank" href="<?php echo e(route('mail.login',$mail->email)); ?>" class="cursor-pointer px-5 py-4 bg-green-600 rounded-r-md"><i class="fas fa-sign-in-alt"></i> Login </a>
                                    
                                    
                                </div>
                                
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <span>No users!</span>
                          <?php endif; ?>
                        </tbody>
                      </table>
                      <div class="mt-6">
                        <?php echo e($mails->withQueryString()->links()); ?>

                      </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\Laraverl Project\priyomail\resources\views/backend/mails/index.blade.php ENDPATH**/ ?>