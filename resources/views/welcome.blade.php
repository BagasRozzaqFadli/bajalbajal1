<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TokoATKBersahabat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('navbar')

    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4">Selamat datang di Dashboard TokoATKBersahabat</h1>
            <p class="lead">Ini adalah halaman utama dashboard Anda. Silakan tambahkan konten yang sesuai dengan kebutuhan Anda di sini.</p>
            <hr class="my-4">
            <p>Tambahkan informasi atau tautan yang relevan di bawah ini.</p>
        </div>

        <div class="row">
            @foreach($produks as $produk)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset($produk->gambar_produk) }}" class="card-img-top" alt="Gambar Produk">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                            <p class="card-text">Harga: Rp{{ number_format($produk->harga_produk, 0, ',', '.') }}</p>
                            <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-Zm0bIL8w7lq6/PzBld77yjlmw1a4vQ5DbLHLKkK98UM0WZb1GJ5M2dfATfBf/k5P5Lxh7g5AaCDXd3mv+kgsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
