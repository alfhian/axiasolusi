@extends('layout.main')
@section('frame')

<div class="home">
    <div class="home-container">
    	<div>
            <div class="my-3 d-flex justify-content-between">
                <h4 class="pl-3 home-title">Tambah Barang</h4>
                <div class="d-flex justify-content-center">
                    <table class="user-container">
                        <tr>
                            <td valign="middle">
                                <span class="username">{{ $username }}</span>
                            </td>
                            <td valign="middle">
                                <img src="{{ URL::asset('img/Profile_1.png') }}" width="40px" data-toggle="tooltip" data-placement="right" title="Change Photo">
                            </td>
                            <td valign="middle">
                                <i class="fas fa-sign-out-alt" data-toggle="tooltip" data-placement="right" title="Log Out" onclick="window.location = '/logout'"></i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="container p-5 bg-white">
                <div class="form-group w-75">
                    <form method="post" action="/barang/store">
                        @csrf       
                        <div class="mb-3">
                            <label for="nama_barang" style="margin-bottom: 0px;">Nama Barang</label>
                            <input class="form-control" type="text" id="nama_barang" name="nama_barang" onkeyup="convertUppercase(this);" autofocus required/>
                        </div>
                        <div class="mb-3">
                            <label for="harga" style="margin-bottom: 0px;">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" maxlength="16" onkeypress="return isNumberKey(event);" onkeyup="rupiah('harga'); hapusnol('harga');" required="required" value="0" />
                        </div>
                        <div class="mb-3">
                            <label for="id_supplier" style="margin-bottom: 0px;">Supplier</label>
                            <select class="form-control id_supplier" id="id_supplier" name="id_supplier">
                              @foreach($supplier as $spl)
                              <option value="{{ $spl->id }}">{{ $spl->nama_supplier }}</option>
                              @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection