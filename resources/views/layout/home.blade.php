@extends('layout.main')
@section('frame')

<div class="home">
    <div class="home-container">
        <div>
            <div class="my-3 d-flex justify-content-between">
                <h4 class="pl-3 home-title">Dashboard</h4>
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
            <div class="container-fluid notification-container">
                <div class="notif-container">
                    <p>Notifications</p>
                    <div class="notif-list-container">
                        <ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection