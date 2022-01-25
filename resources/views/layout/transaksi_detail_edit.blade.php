@extends('layout.main')
@section('frame')

<div class="home">
    <div class="home-container">
    	<div>
            <div class="my-3 d-flex justify-content-between">
                <h4 class="pl-3 home-title">Edit Item</h4>
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
                    <form method="post" action="/transaksi_detail/update">
                        @csrf       
                        <input class="form-control" type="hidden" id="id" name="id" value="{{ $id }}" required/>
                        <div class="mb-3">
                            <label for="id_barang" style="margin-bottom: 0px;">Barang</label>
                            <select class="form-control id_barang" id="id_barang" name="id_barang" readonly required>
                                <option value="{{ $brg->id }}" selected>{{ $brg->nama_barang }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="qty" style="margin-bottom: 0px;">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty" maxlength="3" value="1" max="100" min="1" value="{{ $data->qty }}" />
                        </div>
                        <div class="mb-3">
                            <label for="harga" style="margin-bottom: 0px;">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" maxlength="16" onkeypress="return isNumberKey(event);" onkeyup="rupiah('harga'); hapusnol('harga');" required="required" value="{{ $data->harga }}" />
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection