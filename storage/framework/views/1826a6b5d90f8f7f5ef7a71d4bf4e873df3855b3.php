
    
    <main id="login_page" class="flex-1 page ql-editor p-" x-data="{ show: false, id: 0 }">
        <div class="text-sm lg:rounded-lg">
    
            <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>
    
    
    
            <!-- <div class="mt-5"></div> -->
            <section class="bg_img_flex_content"> 
                <div class="content_full_area">
    
                    <?php if($forgetPasswordForm): ?>
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="icon"><img src="assets/img/add-user.png" alt="add-user.png"></div>
                                <h2 class="title_bg pt-6 pb-6 text-center text-3xl font-bold tracking-tight text-gray-900">Forget Password</h2>
                            </div>
    
                            <div class="input_box">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email :</label>
                                        <input placeholder="" type="text" wire:model="loginEmail" class="form-control">
                                        <?php $__errorArgs = ['loginEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
    
                                </div>
    
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if(session()->has('message')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session('message')); ?>

                                        </div>
                                        <?php endif; ?>
                                        <?php if(session()->has('error')): ?>
                                        <div class="alert alert-danger">
                                            <span class="text-danger error"><?php echo e(session('error')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
    
                                <div class="col-md-12 text-center">
                                    <button class="btn-full-blue bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="forgetPasswordAction">Recover Now</button>
                                </div>
    
    
                                <div class="col-md-12 text-right mt-2">
                                    <a href="javascript:;" class="text-primary" wire:click.prevent="forgetPasswordFormStatus"><strong>Login</strong></a>
                                </div>
    
    
                            </div>
                        </div>
                    </form>
    
                    <?php else: ?>
                    <form>
                        <div class="row">
    
                            <div class="col-md-12">
                                <div class="top_icon_area">
                                   <div class="icon"><img src="assets/img/login.png" alt="add-user.png"></div>
                                   <h2 class="title_bg pt-6 pb-6 text-center text-3xl font-bold tracking-tight text-gray-900">Login into your account</h2>
                                   <p>Here you can log in to your account</p>
                                </div>
                                
                            </div>
    
                            <div class="input_box">
                                
                                <div class="col-md-12">
    
                                    <div class="form-group">
                                        <label>Email :</label>
                                        <input placeholder="" type="text" wire:model="loginEmail" class="form-control">
                                        <?php $__errorArgs = ['loginEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
    
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password :</label>
                                        <input placeholder="" type="password" wire:model="loginPassword" class="form-control">
                                        <?php $__errorArgs = ['loginPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if(session()->has('message')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session('message')); ?>

                                        </div>
                                        <?php endif; ?>
                                        <?php if(session()->has('error')): ?>
                                        <div class="alert alert-danger">
                                            <span class="text-danger error"><?php echo e(session('error')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
    
                                <div class="col-md-12 text-center">
                                    <button class="btn-full-blue bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="login">Login</button>
                                </div>
    
                                
    
    
                                <div class="col-md-12 text-right mt-2">
                                    <a href="javascript:;" class="text-primary" wire:click.prevent="forgetPasswordFormStatus"><strong>Forget Password?</strong></a>
                                </div>
                                <!-- <div class="alart_box">
                                    <p>if you dont have account, <br>
                                        please create account first!</p>
                                </div> -->
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
            </section>
    
        </div>
    
    </main>

   <?php /**PATH /home/priyo/public_html/resources/views/themes/priyo/components/login.blade.php ENDPATH**/ ?>