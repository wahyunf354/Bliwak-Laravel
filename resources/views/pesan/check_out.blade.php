@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Check Out</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-sm btn-outline-primary mb-3"><i class="fa fa-arrow-left mr-3"></i>Kembali</a>
        </div>
        <div class="col-md-12">
          <div class="card">            
            <div class="card-body">
              <h3><i class="fa fa-shopping-cart mr-3"></i> Check Out</h3>
              @if(!empty($pesanan))
              <p align="right">Tanggal Pesanan : {{ $pesanan->tanggal }}</p>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Total Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    @foreach($pesanan_details as $pesanan_detail)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>
                        <img src="{{ url('uploads/') }}/{{ $pesanan_detail->barang->gambar }}" width="100">
                      </td>
                      <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                      <td>{{ $pesanan_detail->jumlah }}</td>
                      <td>Rp. {{ number_format($pesanan_detail->barang->harga, 0, ',', '.') }}</td>
                      <td>Rp. {{ number_format($pesanan_detail->jumlah_harga, 0, ',', '.') }}</td>
                      <td>
                        <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Anda yakin akan menghapus data? ');"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>       
                    @endforeach
                    <tr class="">
                      <th colspan="5" align="right">Total Harga</th>
                      <th>Rp. {{ number_format($pesanan->jumlah_harga, 0, ',', '.') }}</th>
                      <td>
                        <a href="{{ url('konfirmasi-check-out') }}" class="btn-sm btn btn-outline-primary">
                          <i class="fa fa-shopping-cart mr-2"></i>Check out
                        </a>
                      </td>
                    </tr>
                  </tbody>
              </table>
              @endif
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
