<div class="flex flex-col">
    @foreach ($youtubes as $youtube)
        <div class="mt-2 mb-2">
            <iframe class="w-full rounded-lg sm:h-96" height="300"
                src="https://www.youtube.com/embed/{{ $youtube->url_video }}?modestbranding=1&rel=0"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
        <div class="content-text tracking-normal mb-5 text-gray-900 dark:text-gray-400">
            <p><i class="fa-solid fa-arrow-turn-up fa-rotate-90 mr-4 ml-2"></i>{{ $youtube->deskripsi }}
            </p>
        </div>
    @endforeach
</div>
