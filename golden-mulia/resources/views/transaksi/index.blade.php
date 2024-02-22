<x-guest-layout>
    <div class="my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
        </ol>
    </div>
    <div class="d-flex justify-content-between">
        <a class="btn btn-warning" href="{{ route('addTransaksi') }}">Tambah Transaksi <i class="fa-solid fa-plus"></i></a>
        <form class="d-flex" method="get" action="{{ route('transaksi') }}">
            <select class="form-select me-2" aria-label="Default select example" name="limit">
                <option value="10" selected>10 Data</option>
                <option value="25">25 Data</option>
                <option value="50">50 Data</option>
                <option value="100">100 Data</option>
            </select>
            <input class="form-control me-2" type="text" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>
    </div>
    <div class="mt-3">
        <table class="table table-dark table-bordered border-warning table-striped">
            <thead class="table-warning">
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($transaksi) > 0)
                    @foreach($transaksi as $index => $row)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$row->nama_pengguna}}</td>
                            <td>{{$row->nama_produk}}</td>
                            <td>{{$row->qty}}</td>
                            <td>Rp. {{$row->jumlah}}</td>
                            <td align="center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" href="{{route('editTransaksi', ['id' => $row->id])}}" class="btn btn-outline-warning">Edit</a>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}">
                                    Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin akan menghapus data {{$row->nama_transaksi}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('hapusTransaksi', ['id' => $row->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('Hapus Data') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <tr>
                    <td colspan="6"><span class="badge bg-warning text-dark">Tidak Ada Data</span></td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $transaksi->links('pagination::bootstrap-4') }}
    </div>
</x-guest-layout>