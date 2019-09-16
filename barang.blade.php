@extends('template')
@section('content')
<section class="main-section">
    <div class="content">
        <h1>Data Barang</h1>
        @if(Session::has('alert_message'))
        <div class="alert alert-success">
            <strong>{{ Session::get('alert_message') }}</strong>
        </div>
        @endif
        <hr>
        <a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary">Tambah Barang</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>kd_barang</th>
                <th>nama_barang</th>
                <th>stok</th>
                <th>harga</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach($data as $datas)
                <tr>
                    <td>{{ $datas->id }}</td>
                    <td>{{ $datas->kd_barang }}</td>
                    <td>{{ $datas->nama_barang }}</td>
                    <td>{{ $datas->stok }}</td>
                    <td>{{ $datas->harga }}</td>
                    <td>


                    <?php if (Session::get('hak_akses')=="admin"){?>
<form action="{{ route('penjualan.destroy', $datas->id) }}" method="post">
 {{ csrf_field() }}
{{ method_field('DELETE') }}
<a href="{{ route('barang.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
<button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
<?php } ?>
                    </td>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection