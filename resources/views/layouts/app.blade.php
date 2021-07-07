<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="https://cdn.tiny.cloud/1/nnd7pakaxqr7isf3oqefsdlew1jsidgl78umfeus6tg21ng0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

        <!-- <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script> -->
        <!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
        <!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->

        
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>  -->

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            // function example_image_upload_handler (blobInfo, success, failure, progress) {
            //     var xhr, formData;

            //     xhr = new XMLHttpRequest();
            //     xhr.withCredentials = false;
            //     xhr.open('POST', '{{ route("uploadImg") }}');

            //     xhr.upload.onprogress = function (e) {
            //         progress(e.loaded / e.total * 100);
            //     };

            //     xhr.onload = function() {
            //         var json;

            //         if (xhr.status === 403) {
            //         failure('HTTP Error: ' + xhr.status, { remove: true });
            //         return;
            //         }

            //         if (xhr.status < 200 || xhr.status >= 300) {
            //         failure('HTTP Error: ' + xhr.status);
            //         return;
            //         }

            //         json = JSON.parse(xhr.responseText);

            //         if (!json || typeof json.location != 'string') {
            //         failure('Invalid JSON: ' + xhr.responseText);
            //         return;
            //         }

            //         success(json.location);
            //     };

            //     xhr.onerror = function () {
            //         failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            //     };

            //     formData = new FormData();
            //     formData.append('file', blobInfo.blob(), blobInfo.filename());

            //     xhr.send(formData);
            // };

            // tinymce.init({
            //     selector: 'textarea',  // change this value according to your HTML
            //     height : 500,
            //     plugins: [
            //         "advlist autolink lists link image charmap print preview anchor",
            //         "searchreplace visualblocks code fullscreen",
            //         "insertdatetime media table contextmenu paste imagetools"
            //     ],
            //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
            //     images_upload_url: '{{ route("uploadImg") }}'
            //     //images_upload_handler: example_image_upload_handler
            // });

    $(document).ready(function() {
        tinymce.init({
        selector: "textarea",
        height: 500,
        relative_urls: false,
        paste_data_images: true,
        image_title: true,
        automatic_uploads: true,
        images_upload_url: "{{ route('uploadImg') }}",
        file_picker_types: "image",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1:
            "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        // override default upload handler to simulate successful upload
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("accept", "image/*");
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var id = "blobid" + new Date().getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(",")[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        }
    });
});

        </script>

        <!-- <script src="{{ asset('js/tinymce_image_upload.js') }}"></script> -->

        @livewireScripts
    </body>
</html>
