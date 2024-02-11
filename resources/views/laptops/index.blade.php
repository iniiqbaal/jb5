<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rystore</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: #f7fbff">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h1 class="text-center my-4" style="color: #47b5ff; font-weight: bolder">RYSTORE</h1>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="text-center my-2">DATA PRODUK</h4>
                        <a href="{{ route('laptops.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PRODUK</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">NAMA PRODUK</th>
                                <th scope="col">HARGA</th>
                                <th scope="col">DESKRIPSI</th>
                                <th scope="col">ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($laptops as $laptop)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/laptops/'.$laptop->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $laptop->nama_produk }}</td>
                                    <td>Rp. {{ number_format($laptop->harga) }}</td>
                                    <td>{!! $laptop->deskripsi !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('laptops.destroy', $laptop->id) }}" method="POST">
                                            <a href="{{ route('laptops.show', $laptop->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('laptops.edit', $laptop->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Produk belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $laptops->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>