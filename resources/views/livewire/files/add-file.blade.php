<div>
    <div>
        <dialog id="AddFileModal" class="modal" wire:ignore.self>
            <div class="modal-box">
                {{-- header --}}
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-bold">Add File</h3>
                    <form method="dialog">
                        <button class="btn btn-xs btn-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-circle-x">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m15 9-6 6" />
                                <path d="m9 9 6 6" />
                            </svg>
                        </button>
                    </form>

                </div>
                {{-- file uploading area --}}
                <div
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                <form class="mt-4" wire:submit='store'>
                    <div class="mb-2">
                        <label for="title">Title</label>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full" wire:model='title'>

                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="file">Image</label>
                        <input type="file" class="file-input file-input-bordered w-full" wire:model='image' accept="image/png, image/jpeg, image/jpg, image/webp, image/svg">
                        <!-- Progress Bar -->
                        <div x-show="uploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>

                        @error('image')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="w-full rounded-md object-contain my-2">
                        @endif
                    </div>

                    <div class="mb-2">
                        <button class="btn btn-warning w-full">Submit</button>
                    </div>
                </form>

            </div>
        </dialog>
    </div>

</div>
