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

                    <h2 class="text-2xl text-center">Insert new Post</h2>

                    <div class="flex justify-center w-full ">
                        <form action="{{ route('storeImg') }}" method="post" enctype='multipart/form-data' class="space-y-4 w-full">
                            @csrf

                            <div>
                                <label class="block mb-1" for="">Title</label>
                                <input type="text" name="title" class="form-control w-full p-1 border border-gray-300" />
                            </div>
                            <div>
                                <label for="" class="block mb-1">Text:</label>
                                <textarea name="text"></textarea>
                            </div>
                            <div>
                                <input type="submit" value="Upload" class="bg-blue-600 text-white px-4 py-2 rounded">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
