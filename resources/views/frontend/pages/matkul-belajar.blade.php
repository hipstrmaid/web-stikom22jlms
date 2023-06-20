@extends('frontend.app')
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-8 mb-4 lg:gap-4">

        <div class="col-span-6">
            <div class="content">
                <article class="dark:text-white">
                    <h1 class="text-4xl font-bold mb-4 pt-4 lg:pt-0">Topic 1</h1>
                    <div class="video-player mt-2 mb-2">
                        <iframe class="w-full max-w-full" height="300" src="https://www.youtube.com/embed/lPJVi797Uy0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="content-text tracking-normal text-gray-900 dark:text-gray-400">
                        <p>Make better videos with the ultimate course on video production, planning, cinematography,
                            editing & distribution.</p>
                        <p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their
                            dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their
                            software.</p>
                    </div>
                </article>
            </div>
        </div>


        <div class="col-span-2">
            <div class="content-title flex items-center dark:text-white">
                <i class="fa-solid fa-book mr-2" style="color: #4287ff;"></i>
                <h1 class="text-xl font-bold my-2 ">General</h1>
            </div>
            <div class="grid lg:grid-cols-1">

                <div id="accordion-collapse" class="bg-white dark:bg-gray-800 shadow" data-accordion="collapse">
                    <h2 id="accordion-collapse-heading-1">
                        <button type="button"
                            class="flex items-center bg-gray justify-between w-full p-3 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                            aria-controls="accordion-collapse-body-1">
                            <div class="flex items-center">
                                <i class="fa-solid fa-circle-question mr-2" style="color: #4287ff;"></i>
                                <span>Instruksi</span>
                            </div>
                            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of
                                interactive components built on top of Tailwind CSS including buttons, dropdowns, modals,
                                navbars, and more.</p>
                            <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a
                                    href="/docs/getting-started/introduction/"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start
                                developing websites even faster with components on top of Tailwind CSS.</p>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full p-3 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                            aria-controls="accordion-collapse-body-2">
                            <div class="flex items-center">
                                <i class="fa-solid fa-file mr-3" style="color: #4287ff;"></i>
                                <span>File</span>
                            </div>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed
                                using the Figma software so everything you see in the library has a design equivalent in our
                                Figma file.</p>
                            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based
                                on the utility classes from Tailwind CSS and components from Flowbite.</p>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full p-3 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                            aria-controls="accordion-collapse-body-3">
                            <div class="flex items-center">
                                <i class="fa-solid fa-tasks mr-2" style="color: #4287ff;"></i>
                                <span>Tugas</span>
                            </div>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">

                            <div class="flex items-center justify-center w-sm">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-md h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
