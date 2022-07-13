<x-main>
    <x-hero-section />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        @if ($topics)
            <div class="overflow-hidden mb-4">
                <x-topic-w-section header="Topics" :topics="$topics" />
            </div>
        @endif
    </div>
    <x-posts-w-section :posts="$posts" />
    <x-stats />
    <x-lesson-w-section />
</x-main>
