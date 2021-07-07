<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h2 class="text-2xl text-center">Update Post</h2>

                    <div class="flex justify-center w-full ">
                        <form action="{{ route('updatePost',$post->id) }}" method="post" enctype='multipart/form-data' class="space-y-4 w-full">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block mb-1" for="">Title</label>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control w-full p-1 border border-gray-300" />
                            </div>
                            <div>
                                <label for="" class="block mb-1">Text:</label>
                                <textarea style="width: 100%; height: 450px" name="text" id="postTextArea" cols="30" rows="10" required>{!! $post->text !!}</textarea>
                            </div>
                            <div>
                                <input type="submit" value="Update" class="bg-blue-600 text-white px-4 py-2 rounded">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
