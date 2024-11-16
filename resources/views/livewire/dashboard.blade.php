<div>
    <div class="px-2 lg:px-32 flex justify-center flex-col items-center">
        <input type="text" class="input input-bordered rounmde-2xl w-96 mb-4 border-yellow-400" placeholder="Type here" wire:model.live='search'>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
            @if (count($files) > 0)
                @foreach ($files as $key => $file)
                    <div class="card card-compact bg-base-100 w-96 shadow-xl">
                        <a href="{{ route('show.file', ["id" => $file->id])}}" wire:navigate>
                            <figure>
                                <img src="{{ asset('storage/' . $file->image) }}" alt="{{ $file->title }}"
                                    class="h-52 object-cover w-full" />
                            </figure>
                        </a>
                        <div class="card-body">
                            <h2 class="card-title">{{ $file->title }}</h2>
                            <p>{{ $file->created_at->format('d-m-Y h:i:s a') }}</p>
                            <div class="card-actions justify-end">
                                <livewire:files.delete-file :id="$file->id" :key="$key" />
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Files Found 😒</p>
            @endif
        </div>
    </div>

    <div class="text-center px-10 lg:px-32">
        {{ $files->links() }}
    </div>
</div>
