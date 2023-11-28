@extends('layout.app')
@section('title' , 'Anggota')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Anggota</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Anggota</h4>

                <div class="card-header-form">
                    <a href="{{route('anggota.create')}}" class="btn btn-success btn-sm"><i class="fa fa-star"></i> Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>telepon</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th style="width:15%">Aksi</th>
                        </tr>

                        <tbody>
                            @foreach ($anggota as $agt)
                                
                            
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$agt->kode}}</td>
                                <td>{{$agt->nama}}</td>
                                <td>
                                    @if($agt->jenis_kelamin == 'L')
                                        {{'Laki-Laki'}}
                                    @elseif($agt->jenis_kelamin == 'P')
                                        {{'Perempuan'}}
                                    @endif
                                </td>
                                <td>{{$agt->tempat_lahir}}</td>
                                <td>{{$agt->tanggal_lahir}}</td>
                                <td>{{$agt->telpon}}</td>
                                <td>{{$agt->alamat}}</td>
                                <td><img src="{{asset('/storage/anggota/' .$agt->foto)}}" class="rounded" style="width:50px"></td>
                                <td>
                                <form action="{{route('anggota.destroy', $agt->id)}}" method="post" id="delete-form">
                                    @method('delete')
                                    @csrf
                                    <a href="{{route('anggota.edit', $agt->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="confirmDelete()"></i></button>
                                 </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    function confirmDelete()
    {
        event.preventDefault();
        swal({
        title:'Apakah anda yakin?',
        text: 'Setelah dihapus,Anda tidak dapat memulihkannya!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-form').submit()
            }
        });
 }
</script>
@endsection