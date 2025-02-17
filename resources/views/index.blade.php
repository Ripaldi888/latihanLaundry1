<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=phone_enabled" />
</head>

<body>

    <div class="header">
        <div class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
            <p class="mt-3">Laundry Smk Citra Negara</p>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="{{ route('login') }}">Cek Produk</a></li>
            </ul>
        </nav>
    </div>

    <div class="background"></div>
    <div class="content">
        <h1>Lihat Pesanan</h1>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,256L40,256C80,256,160,256,240,224C320,192,400,128,480,122.7C560,117,640,171,720,192C800,213,880,203,960,165.3C1040,128,1120,64,1200,42.7C1280,21,1360,43,1400,53.3L1440,64L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
<section class="search">
    
    <form class="pesanan-container" action="{{ route('search.noHp') }}" role="search" method="POST">
        @csrf
        <div class="pesanan-row">
            <h2 class="pesanan-title">
                <span class="pesanan-highlight">Cek Pesanan Anda</span>
            </h2>
            <p class="pesanan-description">
                Masukkan nomor handphone anda untuk melihat pesanan anda
            </p>
            <div class="pesanan-input-wrapper">
                <input type="text" name="no_hp" class="tracking-input" placeholder="Nomor handphone" required>
            </div>
            <button type="submit" id="cariPesanan" class="pesanan-button mt-2">Search</button>
        </div>
    </form>
    @if (isset($datas))
    <table class="table container">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Handphone</th>
                <th>Cek Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i=1; ?>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->no_hp }}</td>
                <td>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">Cek</button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    @endif
</section>

    


<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,288L30,261.3C60,235,120,181,180,160C240,139,300,149,360,165.3C420,181,480,203,540,213.3C600,224,660,224,720,197.3C780,171,840,117,900,80C960,43,1020,21,1080,32C1140,43,1200,85,1260,133.3C1320,181,1380,235,1410,261.3L1440,288L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>


<footer>
    <div class="container">
        <div class="footer-text text-center">
            <span>Jl. Tanah Baru Jl. Kemiri Jaya No.99, Beji, Kecamatan Beji, Kota Depok, Jawa Barat 16421</span>
        </div>
    </div>
    <div class="copyright text-center">
        <p class="mb-0">Copyright &copy; 2025 Laundry Citra Negara / Muhamad Ripaldi</p>
    </div>
</footer>


@if (isset($datas))
    @foreach ($datas as $data)
    <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pesanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Nama Pemesan : {{ $data->nama }}   </p>
                    <p>No Handphone : {{ $data->no_hp }}   </p>
                    <p>Total Harga : Rp. {{ $data->total_harga }}   </p>
                    <p>Tanggal Pemesanan : {{ $data->created_at }}   </p>
                    @if($data->status == 'selesai')
                    <p>Status : <span class="text-success">{{ $data->status }}</span></p>
                    @else
                    <p>Status : <span class="text-warning">{{ $data->status }}</span></p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
