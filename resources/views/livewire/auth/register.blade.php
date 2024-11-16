        <div class="h-screen flex justify-center items-center">
            <form wire:submit="register" class="w-[500px]">
                <div class="mb-2 flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl">Register</h1>
                        <p>Welcome to Coaching</p>
                    </div>
                    <div>
                        <x-common.themeSwitch />
                    </div>

                </div>
                <div class="mb-2">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="Type here" class="input input-bordered w-full"
                        wire:model="name">

                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Type here" class="input input-bordered w-full"
                        wire:model="email">

                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Type here" class="input input-bordered w-full"
                        wire:model="password">
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" placeholder="Type here"
                        class="input input-bordered w-full" wire:model="confirm_password">
                    @error('confiorm_password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-2">
                    <button class="btn btn-warning w-full">Submit</button>
                </div>

                <p class="text-center">--OR--</p>
                <p class="text-center">Already have an account ? <a class="text-warning font-bold"
                        href="{{ route('login') }}" wire:navigate>Login</p>
            </form>
        </div>
