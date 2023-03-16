@extends('layouts.admin_master')
@section('content')


<div class="page-inner containermateri mt-4 d-block">
    <div class="row">
        <div class="col-md-12">
            <div class="px-3">
                <div class="card-header row">
                    <div class="col-md-12">
                        <span class="float-left" style="font-size: 24px;">Post</span>
                        <button class="btn btn-sm btn-rounded btn-primary float-right" data-toggle="modal" data-target="#ModalTambahSS"><i class="fas fa-plus"> </i> Tambah Post</button>
                    </div>
                </div>
            </div>

            <div class="row listmateri card mx-1 py-3 mt-3">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title </th>
                                <th>Content</th>
                                <th>Date</th>
                                <th>Username</th>
                               
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($post as $a)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$a->title}}</td>
                                <td>{{$a->content}}</td>
                                <td>{{$a->date}}</td>
                                <td>{{$a->username}}</td>
                                <td>
                            
                                    <a href="#" class="btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditSS" onclick="edit('{{$a->idpost}}','{{$a->title}}','{{$a->title}}','{{$a->date}}','{{$a->username}}')"><i class="fa fa-edit"></i></a>

                                    <a href="#" onclick="hapus('{{$a->idpost}}')" type="submit" class="btn-sm btn-danger" data-toggle="modal"><i class="fa fa-trash"></i></a>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>

</div>





<div class="modal fade" id="ModalTambahSS" tabindex="-1" aria-labelledby="ModalTambahSSLabel" aria-hidden="true">
    <div id="loader"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTambahSSLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{url('akun')}}" method="post" id="tambah-produk" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Title </label>
                        <div class="col-sm-9">
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Content </label>
                        <div class="col-sm-9">
                            <textarea type="text" id="content" name="content" class="form-control">
                        </div>
                    </div>
                  
                
                 

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="tambah()">Tambahkan</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit -->
<div class="modal fade" id="ModalEditSS" tabindex="-1" aria-labelledby="ModalEditSSLabel" aria-hidden="true">
    <div id="loader"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditSSLabel">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="updateakun" enctype="multipart/form-data">
                    @method("patch")
                    @csrf
             

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama </label>
                        <div class="col-sm-9">
                            <input type="text" id="enama" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username </label>
                        <div class="col-sm-9">
                            <input type="text" id="eusername"  class="form-control " disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                        <select name="role" id="erole" class="form-control">
                            <option value="admin">admin</option>
                            <option value="author">author</option>
                          
                        </select>
                        </div>
                    </div>
                   
              

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" id="password" name="password" class="form-control">
                        </div>
                    </div>
                  

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('updateakun').submit()">Perbaharui</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="hapus" role="dialog" aria-labelledby="editpaket" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="delete" method="post">
                    @method("delete")
                    @csrf
                </form>
                <span>Apakah Anda Mau menghapus <span class="map"></span> ?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="document.getElementById('delete').submit()">Hapus</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')


<script type="text/javascript">
    $(document).ready(function() {

        @if(session()->has('message'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{session()->get('message')}}",
        })
        @endif


    });


    $('#basic-datatables').DataTable({});

   

    function tambah() {
        $('#name').removeClass('is-invalid')
      
        if ($('#name').val() == "") {
            $('#name').addClass('is-invalid')
        } 
        if ($('#username').val() == "") {
            $('#username').addClass('is-invalid')
        } 
        if ($('#password').val() == "") {
            $('#password').addClass('is-invalid')
        } 
        if ($('#role').val() == "") {
            $('#role').addClass('is-invalid')
        } 
  
        
        else {
            $("#tambah-produk").submit()
        }
    }

    function edit(id, nama,username, role) {
        $("#updateakun #enama").val(nama)
        $("#updateakun #eusername").val(username)
        $("#updateakun #erole").val(role)
     

        $("#updateakun").attr("action", "{{url('akun')}}" + "/" + id)
        $("#ModalEditSS").modal("show")
      
    }



    function hapus(id, promo) {
     
        $("#delete").attr("action", "{{url('akun')}}" + "/" + id)
        $("#hapus").modal("show")
    }
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


@endsection
