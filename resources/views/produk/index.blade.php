@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Pijar Camp - Simple Crud</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('produks.create') }}"> Tambah Produk</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama Produk</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th width="280px" class="text-center">Aksi</th>
        </tr>
        @foreach ($produks as $post)
            <tr>
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td>{{ $post->nama_produk }}</td>
                <td>{{ $post->keterangan }}</td>
                <td>{{ $post->harga }}</td>
                <td>{{ $post->jumlah }}</td>
                <td class="text-center">
                    <form action="{{ route('produks.destroy', $post->id) }}" method="POST">

                        <a class="btn btn-info btn-sm" href="{{ route('produks.show', $post->id) }}">Lihat</a>

                        <a class="btn btn-primary btn-sm" href="{{ route('produks.edit', $post->id) }}">Ubah</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
