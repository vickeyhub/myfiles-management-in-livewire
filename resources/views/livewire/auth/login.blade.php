        <div class="h-screen flex justify-center items-center">
            <form wire:submit="login" class="w-[500px]">

                <x-common.alert />

                <div class="mb-2 flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl">Login</h1>
                        <p>Welcome back to coaching</p>
                    </div>
                    <div>
                        <x-common.themeSwitch />
                    </div>
                </div>
                <div class="mb-2">
                    <label for="email">Email</label>
                    <input type="text" wire:model="email" placeholder="Type here" class="input input-bordered w-full">
                    @error('email')
                        <span class="text-red-500">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="password">Password</label>
                    <input type="password" wire:model="password" placeholder="Type here" class="input input-bordered w-full">
                    @error('password')
                        <span class="text-red-500">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-2">
                    <button class="btn btn-warning w-full">Submit</button>
                </div>

                <p class="text-center">--OR--</p>
                <p class="text-center">Don't have an account ? <a class="text-warning font-bold" href="{{route('register')}}" wire:navigate>Register</p>
            </form>
        </div>

