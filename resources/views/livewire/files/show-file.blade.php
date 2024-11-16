<div>
    <div class="px-10 lg:px-32">
        <p class="text-2xl font-bold">{{ $file->title }}</p>
        <p class="text-sm">{{ $file->created_at->format("d-m-Y h:i:s a") }}</p>
        <img src="{{ asset('storage/'.$file->image)}}" alt="{{ $file->title }}" class="w-full object-contain rounded-md mt-4">
    </div>
</div>
