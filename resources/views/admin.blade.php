<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    <title>Admin</title>
</head>
<body>
    <section class="mt-5">
        <div class="container">
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
            <div class="row justify-content-end mt-3">
                <div class="col-2 text-end">
                    <a href="{{ secure_url('/') }}" class="btn btn-primary">Home</a>
                    <a href="{{ secure_url('/logout') }}" class="btn btn-danger">logout</a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title text-start">All images</h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col" class="text-center">image</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($images as $image)
                                            <tr>
                                                <th scope="row" class="text-center">{{ $image->id }}</th>
                                                <td class="text-center">
                                                    <img src="{{ $image->image }}" alt="" width="100px">
                                                </td>
                                                <td class="text-center">
                                                    <form id="deleteForm" action="{{ secure_url("/admin/image/destroy/$image->id") }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button> --}}
                                                        <a href="#" onclick="
                                                        console.log('hi');
                                                            event.preventDefault();
                                                            if(confirm('Are you sure you want to delete these rows?')) {
                                                                document.getElementById('deleteForm').submit();
                                                            }" class="btn btn-danger">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-end">
                                    {{ $images->links() }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>