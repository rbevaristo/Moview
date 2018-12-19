<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/basic.css') }}" />
    <style type="text/css">
        .dropzone {
            border:2px dashed #999999;
            border-radius: 10px;
        }
        .dropzone .dz-default.dz-message {
            height: 171px;
            background-size: 132px 132px;
            margin-top: 0;
            background-position-x:center;

        }
        .dropzone .dz-default.dz-message span {
            display: block;
            margin-top: 150px;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
        <?php 
        // dd(phpinfo())
        ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('movies.store') }}" enctype="multipart/form-data" class="dropzone" id="fileupload" method="POST">
                    @csrf
                    <div class="fallback">
                      <input name="file" type="files" multiple id="file_upload"/>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>
    
    <hr>
    <div class="container">
        @foreach(\App\Movie::all() as $movie)
        <video width="400" src="{{ $movie->filename }}" type='video/x-matroska; codecs="theora, vorbis"' autoplay controls
        onerror="failed(event)"></video>
        @endforeach
    </div>


    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#file_upload').dropzone({
            paramName: 'file',
            maxFilesize: 700,
            addRemoveLinks: true,
            thumbnail: false,
            createImageThumbnails: false,
            uploadMultiple: true,
            acceptedFiles: ".mp4,.mkv,.avi,audio/*,image/*,application/zip,.zip,.rar,application/rar,.xlsm, .psd,.pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/docx,application/pdf,text/plain,application/msword,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,.csv",
            init: function () {
            this.on("complete", function (file) {
                this.removeFile(file);
                }),
                this.on("queuecomplete", function (file) {
                    toastr["success"]('Files uploaded.', "Success");
                })
            },
        });
    });
</script>
</body>
</html>