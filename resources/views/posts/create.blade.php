<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA PRODUK</label>
                                <input type="text" class="form-control 
                                @error('name') is-invalid @enderror" name="name" 
                                value="{{ old('name') }}" placeholder="Masukkan Nama Produk">
                            
                                <!-- error message untuk title -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI PRODUK</label>
                                <input type="textarea" class="form-control 
                                @error('desc') is-invalid @enderror" name="desc" 
                                value="{{ old('desc') }}" placeholder="Masukkan Deskripsi Produk">
                            
                                <!-- error message untuk title -->
                                @error('desc')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">HARGA PRODUK</label>
                                <input type="text" class="form-control 
                                @error('price') is-invalid @enderror" name="price" 
                                value="{{ old('price') }}" placeholder="Masukkan Harga Produk">
                            
                                <!-- error message untuk content -->
                                @error('price')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">STOCK PRODUK</label>
                                <input type="text" class="form-control 
                                @error('stock') is-invalid @enderror" name="stock" 
                                value="{{ old('stock') }}" placeholder="Masukkan Stock Produk">

                                @error('stock')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>