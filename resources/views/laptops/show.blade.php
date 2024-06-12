<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Produk - iStore</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: #f7fbff">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 style="font-weight: bolder">{{ $laptop->nama_produk }}</h3>
                        <img src="{{ asset('storage/laptops/'.$laptop->image) }}" class="w-100 rounded">
                        <hr>
                        <h4>Rp. {{ number_format($laptop->harga) }}</h4>
                        <p class="tmt-3">
                            {!! $laptop->deskripsi !!}
                        </p>

                        <a href="/" class="btn btn-md btn-danger">KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>