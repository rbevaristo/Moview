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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .dropzone {
            border:2px dashed #999999;
            border-radius: 10px;
        }
        .dropzone .dz-default.dz-message {
            height: 171px;
            background-size: 132px 132px;
            margin-top: -101.5px;
            background-position-x:center;

        }
        .dropzone .dz-default.dz-message span {
            display: block;
            margin-top: 145px;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
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