<div class="bg-white">
    <div class="max-w-2xl mx-auto py-6 px-4 sm:py-10 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-xl font-bold text-gray-900">Blog Posts</h2>
        <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            @foreach($posts as $post)
            <div class="group">
                <a href="#">
                <div class="relative">
                    <div class="relative w-full h-72 rounded-lg overflow-hidden">
                        <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls." class="w-full h-full object-center object-cover">
                    </div>
                    <div class="relative mt-4">
                        <h3 class="text-sm font-medium text-gray-900 group-hover:text-indigo-600">{{ $post->title }}</h3>
                    </div>
                    <div class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                        <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                        @foreach($post->tags as $tag)
                        <p class="relative text-sm font-semibold text-white mr-1">#{{ $tag->name }}</p>
                        @endforeach
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
