<div class="flex flex-col gap-2">
    @foreach ($images as $image)
        <img class="w-full object-cover" src="{{ Storage::url($image->path_file) }}" alt="image description">
        <div class="content-text mb-5 tracking-normal text-gray-900 dark:text-gray-400">
            <p>{{ $image->deskripsi }}</p>
        </div>
    @endforeach
</div>
