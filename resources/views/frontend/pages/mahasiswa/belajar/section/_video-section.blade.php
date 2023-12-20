<div class="flex flex-col gap-2">
    @foreach ($videos as $video)
        <video class="w-full h-auto max-w-full border border-gray-200 rounded-lg dark:border-gray-700" controls>
            <source src="{{ Storage::url($video->path_file) }}" type="video/mp4">
            Browser anda belum support video tag, Silahkan mengupgrade browser anda.
        </video>
        <div class="content-text mb-5 tracking-normal text-gray-900 dark:text-gray-400">
            <p>{{ $video->deskripsi }}</p>
        </div>
    @endforeach
</div>
