<x-guest-layout>
<div class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
    </ol>
</div>
<form method="POST" action="{{ isset($data) ? route('updateProduk', ['id' => $data->id]) : route('storeProduk') }}">
    @csrf <!-- Tambahkan token CSRF di sini -->
    <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ isset($data) ? $data->nama_produk : ''}}">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($data) ? $data->harga : ''}}">
    </div>
    <button type="submit" class="btn btn-warning">{{ isset($data) ? 'Update Produk': 'Tambah Produk'}}</button>
</form>

</x-guest-layout>
