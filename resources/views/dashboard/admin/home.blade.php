@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table table-striped table-active table-responsive ">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            <td>{{Auth::guard('admin')-> user()->name}}</td>
                            <td>{{Auth::guard('admin')->user()->email}}</td>
                            <td>{{Auth::guard('admin')->user()->phone}}</td>
                            <td>
                                <a href="{{route('admin.logout')}}" onclick="event.preventDefault();
                                document.getElementById('form-id').submit();">Logout</a>
                                <form action="{{route('user.logout')}}" method="post" class="d-none" id="form-id">@csrf</form>
                            </td>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
