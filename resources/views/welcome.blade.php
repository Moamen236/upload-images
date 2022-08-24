<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{ asset('image/logo.png') }}"/>
        <link rel='shortcut icon' type='image/x-icon' href="{{ asset('image/logo.png') }}"/>
        <title>P&G Alumni</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    </head>
    <body>
        <header>
        </header>

        <section class="upload_image mt-5 pb-4">
            @if (session('status'))
                <div class="alert alert-dismissible alert-success" role="alert">
                    {{ __(session('status')) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-dismissible alert-danger" role="alert">
                    {{ __(session('error')) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-dismissible alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2 class="mb-2">File Upload & Image Preview</h2>
            <!-- Upload  -->
            <form id="file-upload-form" class="uploader" action="{{ secure_url('/upload') }}" method="post" enctype="multipart/form-data"> {{-- https://up-images.herokuapp.com/ --}}
                @csrf
                <input id="file-upload" type="file" name="image" accept="image/*" required/>
    
                <label for="file-upload" id="file-drag">
                    <img id="file-image" src="#" alt="Preview" class="hidden">
                    <div id="start">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <div>Select a file or drag here</div>
                        <div id="notimage" class="hidden">Please select an image</div>
                        <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                    </div>
                    <div id="response" class="hidden">
                        <div id="messages"></div>
                        <progress class="progress" id="file-progress" value="0">
                            <span>0</span>%
                        </progress>
                    </div>
                </label>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </section> 

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="{{ secure_asset('js/main.js') }}"></script> {{-- secure_ --}}
    </body>
</html>
