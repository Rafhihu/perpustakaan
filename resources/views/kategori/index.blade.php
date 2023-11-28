@extends('layout.app')
@section('title' , 'Kategori')
@section('content')
<section class="section">
          <div class="section-header">
            <h1>Kategori</h1>
          </div>

          <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Kategori</h4>
                    <div class="card-header-form">
                        <button class="btn-sm btn-success" data-toggle="modal" data-target="#modal-form">Tambah Data</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover" id="table">
                        <thead>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </thead>

                        <tbody>

                        @foreach($kategori as $ktg)
                        <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$ktg->kode}}</td>
                                <td>{{$ktg->nama}}</td>
                                <td>
                                 <form action="/kategori/{{$ktg->id}}" method="GET" id="delete-form">
                                    @method('delete')
                                    <a href="/kategori/{{$ktg->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="confirmDelete()"></i></button>
                                 </form>
                                </td>
                        </tr>
                        @endforeach

                            
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </section>
        @include('kategori.form')
@endsection

@section('script')

<script>
    $(document).ready( function () {
      $('#table').DataTable();
   } );
</script>

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