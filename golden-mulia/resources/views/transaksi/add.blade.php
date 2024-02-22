<x-guest-layout>
<div class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
    </ol>
</div>
<form method="POST" action="{{ isset($data) ? route('updateTransaksi', ['id' => $data->id]) : route('storeTransaksi') }}">
    @csrf <!-- Tambahkan token CSRF di sini -->
    <div class="mb-3">
        <label for="id_pengguna" class="form-label">Nama Pengguna</label>
        <select class="form-select" aria-label="Default select example" name="id_pengguna">
            <option>Pilih Pengguna</option>
            @foreach($pengguna as $optionPengguna)
                @php
                    $dataPengguna = '';
                    if($optionPengguna->id == $data->id_pengguna){
                        $dataPengguna = 'selected';
                    }
                @endphp
                <option value="{{$optionPengguna->id}}" {{$dataPengguna}}>{{$optionPengguna->nama_pengguna}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="id_produk" class="form-label">Nama Produk</label>
        <select class="form-select" aria-label="Default select example" name="id_produk">
            <option>Pilih Produk</option>
            @foreach($produk as $optionProduk)
                @php
                    $dataProduk = '';
                    if($optionProduk->id == $data->id_produk){
                        $dataProduk = 'selected';
                    }
                @endphp
                <option value="{{$optionProduk->id}}" {{$dataProduk}}>{{$optionProduk->nama_produk}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ isset($data) ? $data->qty : ''}}">
    </div>
    <button type="submit" class="btn btn-warning">{{ isset($data) ? 'Update Transaksi': 'Tambah Transaksi'}}</button>
</form>

</x-guest-layout>
