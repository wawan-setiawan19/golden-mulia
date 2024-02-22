<x-guest-layout>
<div class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
    </ol>
</div>
<form method="POST" action="{{ isset($data) ? route('updatePengguna', ['id' => $data->id]) : route('storePengguna') }}">
    @csrf <!-- Tambahkan token CSRF di sini -->
    <div class="mb-3">
        <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
        <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="{{ isset($data) ? $data->nama_pengguna : ''}}">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ isset($data) ? $data->alamat : ''}}">
    </div>
    <button type="submit" class="btn btn-warning">{{ isset($data) ? 'Update Pengguna': 'Tambah Pengguna'}}</button>
</form>

</x-guest-layout>
