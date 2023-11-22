@extends('master')
@section('konten')

<div class="container-fluid">
    <div class="text-end m-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> + Tambah user Baru</button></div>
    @if(session('message'))
    <div class="alert alert-success m-3"> {{session('message')}} </div>
    @endif
    <table class="table table-dark table-hover m-lg-2">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
            <th>Option</th>
        </tr>
        @foreach ($user as $p)
        <tr>
            <td> {{$p->name}} </td>
            <td> {{$p->email}} </td>
            <td> {{$p->role}} </td>
            <td>
                @if($p->role=='Guest')

                @else
                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalUpdateUser{{ $p->id }}">Update</button> |
                @endif
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDeleteUser{{ $p->id }}">Delete</button>
            </td>
        </tr>

        <!-- Ini tampil form update user -->
        <div class="modal fade" id="ModalUpdateUser{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/storeupdate" method="post" class="form-floating">
                            @csrf
                            <input type="hidden" name="id" class="form-control" value="{{ $p->id }}">
                            <div class="form-floating p-1">
                                <input type="text" name="name" required="required" class="form-control" value="{{ $p->name }}">
                                <label for="floatingInputValue">Nama</label>
                            </div>
                            <div class="form-floating p-1">
                                <input type="email" name="email" required="required" class="form-control" value="{{ $p->email }}">
                                <label for="floatingInputValue">Email</label>
                            </div>
                            <div class="form-floating p-1">
                                <input type="password" name="password" class="form-control">
                                <label for="floatingInputValue">Password <b>(*Jika kosong maka menggunakan password lama*)</b></label>
                            </div>
                            <div class="form-floating p-1">
                                <select name="role" class="form-control">
                                    <option value="petugas" @if($p->role =='petugas') selected="selected" @endif>Petugas</option>
                                    <option value="admin" @if($p->role =='admin') selected="selected" @endif>Admin</option>
                                </select>
                                <label for="floatingInputValue">Status</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Updates</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ini tampil form delete user -->
        <div class="modal fade" id="ModalDeleteUser{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/delete/{{$p->id}}" method="get" class="form-floating">
                            @csrf
                            <div>
                                <h3>Yakin mau menghapus data <b>{{$p->name}}</b> ?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </table>
</div>

<!-- Ini tampil form tambah user -->
<div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/user/storeinput" method="post" class="form-floating">
                    @csrf
                    <div class="form-floating p-1">
                        <input type="text" name="name" required="required" class="form-control">
                        <label for="floatingInputValue">Nama</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="email" name="email" required="required" class="form-control">
                        <label for="floatingInputValue">Email</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="password" name="password" required="required" class="form-control">
                        <label for="floatingInputValue">Password</label>
                    </div>
                    <div class="form-floating p-1">
                        <select name="role" class="form-control">
                            <option value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
                        </select>
                        <label for="floatingInputValue">Status</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection