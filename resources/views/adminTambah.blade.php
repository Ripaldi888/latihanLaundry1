<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>

<body>


    <div class="d-flex">
        <div class="sidebar">
            <h2>Laundry</h2>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="" class="nav-link  text-white">Input</a></li>
                <li class="nav-item"><a href="" class="nav-link  text-white">Data</a></li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="nav-link bg-transparent border-0 p-0 ms-3 text-white">{{ __('Log Out') }}
                    </button>
                </form>
                <li class="nav-item li-gambar ms-2"><img src="{{ asset('assets/img/tes.jpeg') }}" alt="">Admin
                </li>
            </ul>
        </div>

        <div class="content flex-grow-1">
            <h1 class="text-center">Tambah Laundry</h1>
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Pembeli</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Masukka nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No Handphone</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Masukkan No Handphone" name="no_hp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Berat Laundry</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Masukka Berat Laundry" name="total_berat">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
