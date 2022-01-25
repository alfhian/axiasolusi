@extends('layout.main')
@section('frame')

<div class="home">
    <div class="home-container">
    	<div>
            <div class="my-3 d-flex justify-content-between">
                <h4 class="pl-3 home-title">Tambah Supplier</h4>
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
                    <form method="post" action="/supplier/store">
                        @csrf       
                        <div class="mb-3">
                            <label for="nama_supplier" style="margin-bottom: 0px;">Nama Supplier</label>
                            <input class="form-control" type="text" id="nama_supplier" name="nama_supplier" onkeyup="convertUppercase(this);" autofocus required/>
                        </div>
                        <div class="mb-3">
                            <label for="pic" style="margin-bottom: 0px;">PIC</label>
                            <input class="form-control" type="text" id="pic" name="pic" onkeyup="convertUppercase(this);" required /> 
                        </div>
                        <div class="mb-3">
                            <label for="telp" style="margin-bottom: 0px;">Telp</label>
                            <input class="form-control" type="text" id="telp" name="telp" maxlength="13" onkeypress="return isNumberKey(event);" required />
                        </div>
                        <div class="mb-3">
                            <label for="alamat" style="margin-bottom: 0px;">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" cols="300" rows="3" onkeyup="convertUppercase(this);" style="resize: none;" required ></textarea>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection