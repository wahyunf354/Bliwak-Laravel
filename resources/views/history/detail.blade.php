@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-sm btn-outline-primary mb-3"><i class="fa fa-arrow-left mr-3"></i>Kembali</a>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h3>Berhasil Check Out</h3>
              <h5>Pesanan anda sudah berhasil dicheck out selanjutnya untuk pembayaran silahkan trasfer <br> di rekening <strong>BRI 4930-2932-1823 </strong> dengan nominal: <strong>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode, 0, ',', '.') }}</strong></h5>
            </div>
          </div>
          <div class="card mt-3">            
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
                      <td align="right"><strong>Harga</strong></td>
                      <td align="right"><strong>Total Harga</strong></td>
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
                      <td align="right">Rp. {{ number_format($pesanan_detail->barang->harga, 0, ',', '.') }}</td>
                      <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga, 0, ',', '.') }}</td>
                      
                    </tr>       
                    @endforeach
                    <tr>
                      <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                      <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga, 0, ',', '.') }}</strong></td>
                    </tr>
                    <tr>
                      <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                      <td align="right"><strong>Rp. {{ number_format($pesanan->kode, 0, ',', '.') }}</strong></td>
                    </tr>
                    <tr>
                      <td colspan="5" align="right"><strong>Total yang Harus Ditrasfer :</strong></td>
                      <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode, 0, ',', '.') }}</strong></td>
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
