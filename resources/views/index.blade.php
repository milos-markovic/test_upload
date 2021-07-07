<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if($posts->count() > 0)


                        @foreach($posts as $post)

                            <article class=" p-5 mb-5">
                                <h2 class="text-lg font-semibold mb-5">{{ $post->title }}</h2>

                                <div>
                                    {!! $post->text !!}
                                </div>
                                
                                <div class="mt-5">
                                    <a href="{{ route('editPost', $post->id) }}" class="px-4 py-2 text-white bg-indigo-700 rounded">Update Post</a>
                                </div>
                            </article>

                        @endforeach
                    
                    @else

                        <h2 class="text-xl text-center">Insert new Post</h2>

                    @endif

                    <div class="text-center mt-10">
                        <a href="/showUpload" class="px-4 py-2 text-white bg-indigo-700 rounded">Insert</a>
                    </div>

                </div>
            </div>
        </div>
    </div>



</x-app-layout>