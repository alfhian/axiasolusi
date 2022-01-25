@extends('layout.main')
@section('frame')

<div class="home">
    <div class="home-container">
        <div>
            <div class="my-3 d-flex justify-content-between">
                <h4 class="pl-3 home-title">Transaksi</h4>
                <div class="d-flex justify-content-center">
                    <table class="user-container">
                        <tr>
                            <td valign="middle">
                                <span class="username">{{ $username }}</span>
                            </td>
                            <td valign="middle">
                                <img src="img/Profile_1.png" width="40px" data-toggle="tooltip" data-placement="right" title="Change Photo">
                            </td>
                            <td valign="middle">
                                <i class="fas fa-sign-out-alt" data-toggle="tooltip" data-placement="right" title="Log Out" onclick="window.location = '/logout'"></i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="container p-5 bg-white">
                <div class="form-group w-75">
                    <form method="post" action="/report/view" target="_blank">
                    @csrf       
                        <div class="mb-3">
                            <label for="tanggal_awal" style="margin-bottom: 0px;">Tanggal Awal</label>
                            <input class="form-control" type="date" id="tanggal_awal" name="tanggal_awal" required/>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_akhir" style="margin-bottom: 0px;">Tanggal Akhir</label>
                            <input class="form-control" type="date" id="tanggal_akhir" name="tanggal_akhir" required/>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection