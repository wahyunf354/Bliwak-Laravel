@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <img src="{{url('images/logo.png')}}" width="200" class="rounded mx-auto d-block" alt="">
        </div>
        @foreach($barangs as $barang)
        <div class="col-md-3 col-6">
            <div class="card mb-4">
              <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                <p class="card-text">
                    <strong> Harga : </strong>Rp. {{ number_format($barang->harga) }} <br>
                    <strong> Stok : </strong> {{ $barang-> stok }} <br>
                </p>
                <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart mr-2"></i> Pesan</a>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
