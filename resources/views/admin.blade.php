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
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="nav-link bg-transparent border-0 p-0 ms-3 text-white">{{ __('Log Out') }}
                    </button>
                </form>
            </li>
            <li class="nav-item li-gambar  ms-2">
                <img src="{{ asset('assets/img/tes.jpeg') }}" alt="">
                <span class="ms-2">Admin</span>
            </li>
        </ul>
    </div>

    <div class="content flex-grow-1">
        <h1 class="text-center">Data Laundry</h1>
        <div class="row mt-3">
            <div class="col-md-9">
                <a href="" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>

        <div class="table-responsive mt-4">
            <table class="table">
                <thead class="table-dark ">
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>No Handphone</th>
                        <th>Berat Laundry</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php    $i=1;   ?>
                    @foreach ($datas as $data )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data->nama  }}</td>
                        <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->total_berat  }} KG</td>
                        <td>Rp. {{ $data->total_harga }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <a href="{{ route('edit', $data->id) }}" class="btn btn-primary">Ubah</a>
                            <form action="{{ route('delete', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
    
                </tbody>
            </table>
        </div>
    </div>
</div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
