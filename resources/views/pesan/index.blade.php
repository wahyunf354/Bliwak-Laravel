@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-sm btn-outline-primary mb-3"><i class="fa fa-arrow-left mr-3"></i>Kembali</a>
        </div>
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                           <img src="{{ url('uploads') }}/{{ $barang->gambar }}" width="100%" alt="" class="rounded mx-auto d-block">
                       </div>
                       <div class="col-md-6 mt-5">
                           <h3>{{ $barang->nama_barang }}</h3>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Harga</th>
                                        <th>:</th>
                                        <th> Rp. {{ number_format($barang->harga, 0, ',', '.') }}</th>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <th>:</th>
                                        <th>{{ $barang->stok }}</th>
                                    </tr>
                                        <th>Keterangan</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td colspan="3">{{ $barang->keterangan }}</td>
                                    </tr>
                                        <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>
                                                <form action="{{ url('pesan') }}/{{ $barang->id }}" method="post">
                                                    @csrf
                                                    <input type="text" name="jumlah_pesanan" class="form-control" required>
                                                    <button type="submit" class="btn btn-sm btn-outline-primary mt-3 float-right"><i class=" fa fa-shopping-cart mr-3"></i>   Masukan ke keranjang</button>
                                                </form>       
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection
