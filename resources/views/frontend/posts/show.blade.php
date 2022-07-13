<x-main>
    <div class="container mx-auto py-6">

        <!-- Post Section -->
        <section class="w-full items-center px-3">

            <article
                class="mt-8 prose prose-slate mx-auto lg:prose-lg dark:prose-invert prose-img:rounded-md prose-img:my-4 prose-h1:text-4xl prose-h2:text-3xl prose-h2:p-3 prose-h2:font-semibold prose-h3:text-2xl prose-h3:p-2 prose-h3:font-semibold prose-a:text-blue-600 prose-pre:p-2 prose-pre:bg-slate-700 prose-pre:rounded-md prose-pre:text-slate-200 prose-pre:my-2">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="{{ $post->title }}" />
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4"><h1>{{ $post->title }}</h1></a>
                    <p href="#" class="text-sm pb-8">
                        Published on {{ $post->created_at }}
                    </p>
                    <div>{!! $post->description !!} </div>
                     </div>
            </article>

            <div class="w-full flex pt-6">
                <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                    <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
                </a>
                <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                    <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
                </a>
            </div>
        </section>
    </div>
</x-main>
