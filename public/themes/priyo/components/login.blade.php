
    
    <main id="login_page" class="flex-1 page ql-editor p-" x-data="{ show: false, id: 0 }">
        <div class="text-sm lg:rounded-lg">
    
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
    
    
    
            <!-- <div class="mt-5"></div> -->
            <section class="bg_img_flex_content"> 
                <div class="content_full_area">
    
                    @if($forgetPasswordForm)
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
                                        @error('loginEmail') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
    
                                </div>
    
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                        @endif
                                        @if (session()->has('error'))
                                        <div class="alert alert-danger">
                                            <span class="text-danger error">{{ session('error') }}</span>
                                        </div>
                                        @endif
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
    
                    @else
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
                                        @error('loginEmail') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
    
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password :</label>
                                        <input placeholder="" type="password" wire:model="loginPassword" class="form-control">
                                        @error('loginPassword') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                        @endif
                                        @if (session()->has('error'))
                                        <div class="alert alert-danger">
                                            <span class="text-danger error">{{ session('error') }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="col-md-12 text-center">
                                    <button class="btn-full-blue bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="login">Login</button>
                                </div>
    
                                {{-- <div class="col-md-12">
                                    Don't have account? <a class="btn btn-primary text-white" wire:click.prevent="register"><strong>Register
                                            Here</strong></a>
                                </div> --}}
    
    
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
                    @endif
                </div>
            </section>
    
        </div>
    
    </main>

   