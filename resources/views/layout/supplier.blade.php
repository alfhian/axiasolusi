@extends('layout.main')
@section('frame')

<div class="home">
    <div class="home-container">
    	<div>
            <div class="my-3 d-flex justify-content-between">
                <h4 class="pl-3 home-title">Supplier</h4>
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
	                        <button type="button" class="btn btn-primary" onclick="window.location = '/supplier/tambah'">Tambah</button>
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
	                            <th>Nama Supplier</th>
	                            <th>PIC</th>
	                            <th>Telp</th>
	                            <th>Alamat</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach($data as $index => $dt)
	                        <tr>
	                            <td align="center">{{ $index+1 }}</td>
	                            <td align="center">
	                                <button class="btn btn-primary btn-sm my-1" onclick="window.location = '/supplier/edit/{{ $dt->id }}';>Edit</button>
	                            </td>
	                            <td align="center">{{ $dt->id }}</td>
	                            <td align="left">{{ $dt->nama_supplier }}</td>
	                            <td align="left">{{ $dt->pic }}</td>
	                            <td align="center">{{ $dt->telp }}</td>
	                            <td align="left">{{ $dt->alamat }}</td>
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
                        { width: "10%", targets: 1 },
                        { width: "10%", targets: 2 },
                        { width: "25%", targets: 3 },
                        { width: "13%", targets: 4 },
                        { width: "20%", targets: 5 },
                        { width: "20%", targets: 6 },
                    ],
                    "fixedColumns" : true
                });
</script>

@endsection