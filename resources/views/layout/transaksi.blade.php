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
            @if (session()->has('success'))
	          <div class="alert alert-success alert-dismissible fade show" role="alert">
	            {{ session('success') }}
	            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	          </div>
	        @endif

	        @if (session()->has('failed'))
	          <div class="alert alert-danger alert-dismissible fade show" role="alert">
	            {{ session('failed') }}
	            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	          </div>
	        @endif
            <div class="container-fluid">
	            <table class="table-button-tambah">
	                <tr>
	                    <td>
	                        <button type="button" class="btn btn-primary" onclick="var con = confirm('Add New Transaction ?');if (con == true) { window.location = '/transaksi/store' }">Tambah</button>
	                    </td>
	                </tr>
	            </table>
	            <div class="table-menu-container">
	                <table class="table-data stripe" id="table-data">
	                    <thead>
	                        <tr>
	                            <th>No.</th>
	                            <th>Action</th>
	                            <th>ID</th>
	                            <th>Tanggal</th>
	                            <th>Jumlah Item</th>
	                            <th>Total</th>
	                            <th>Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach($data as $index => $dt)
	                        <tr>
	                            <td align="center">{{ $index+1 }}</td>
	                            <td align="center">
	                            	<button class="btn btn-info btn-sm my-1" onclick="window.location = '/transaksi_detail/{{ $dt->id }}';">Detail</button>
	                            	@if($dt->status == 1)
	                            	<button class="btn btn-danger btn-sm my-1" onclick="var con = confirm('Delete Transaction ?');if (con == true) { window.location = '/transaksi/delete/{{ $dt->id }}'; }">Delete</button>
	                            		@if($dt->jumlah >0)
	                            	<button class="btn btn-dark btn-sm my-1" onclick="var con = confirm('Post Transaction ?');if (con == true) { window.location = '/transaksi/{{ $dt->id }}/posting'; }">Posting</button>
	                            		@endif
	                            	@endif
	                            </td>
	                            <td align="center">{{ $dt->id }}</td>
	                            <td align="left">{{ $dt->tanggal }}</td>
	                            <td align="center">{{ $dt->jumlah }}</td>
	                            <td align="right">{{ $dt->total }}</td>
	                            <td align="center" @if($dt->status == 2) style="color: blue" @endif>{{ $dt->stat }}</td>
	                        </tr>
	                        @endforeach
	                    </tbody>
	                </table>
            	</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	var table = $('#table-data').DataTable({
                    "bAutoWidth":false,
                    "scrollX": true,
                    "scrollY": "72vh",
                    "scrollCollapse": true,
                    "columnDefs" : [
                        { width: '2%', targets: 0 },
                        { width: "13%", targets: 1 },
                        { width: "10%", targets: 2 },
                        { width: "20%", targets: 3 },
                        { width: "23%", targets: 4 },
                        { width: "22%", targets: 5 },
                        { width: "10%", targets: 6 },
                    ],
                    "fixedColumns" : true
                });
</script>

@endsection