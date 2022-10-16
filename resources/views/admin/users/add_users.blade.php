@extends('layouts.admin_layout.admin_layout')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if(\Illuminate\Support\Facades\Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error: </strong> {{ \Illuminate\Support\Facades\Session::get('error_message') }}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('neutral_message'))
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Notice: </strong> {{ \Illuminate\Support\Facades\Session::get('neutral_message') }}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Success: </strong> {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error: </strong>
                            <br>
                            @foreach($errors->all() as $error)
                                &emsp; &#x2022; {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <form action="{{ url('/admin/add-users') }}" method="POST" id="updateAdminDetails" name="updateAdminDetails" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ADD USER DETAILS
                                </h2>
                            </div>
                            <div class="body">
                                <div class="col-md-4">
                                    <label>Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Location</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="location" name="location" class="form-control" placeholder="Enter Location" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Card ID</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="card" name="card" class="form-control" placeholder="Enter Card ID" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Mobile</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="number" name="number" class="form-control" placeholder="Enter Mobile" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Begin Date</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="begin_date" name="begin_date" class="form-control" placeholder="Enter Begin Date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>End Date</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="end_date" name="end_date" class="form-control" placeholder="Enter End Date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Barcode</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="barcode" name="barcode" class="form-control" placeholder="Enter Barcode" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect" id="detailUpdate" name="detailUpdate">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
