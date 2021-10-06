@extends('layouts.admin_layout.admin_layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BIMU DATA
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>MAC</th>
                                            <th>User</th>
                                            <th>User Email</th>
                                            <th>Created on</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>MAC</th>
                                            <th>User</th>
                                            <th>User Email</th>
                                            <th>Created on</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($devices as $device)
                                            <tr>
                                                <td>{{ $device->id }}</td>
                                                <td>{{ ucwords($device->name) }}</td>
                                                <td>{{ $device->mac_address }}</td>
                                                <td>{{ ucwords($device->user->name) }}</td>
                                                <td>{{ $device->user->email }}</td>
                                                <td><?php echo date('d-M-Y h:i A', strtotime($device->created_at)); ?></td>
                                                <td>
                                                    @if($device->status == 1)
                                                        <button type="button" class="btn btn-success btn-sm" style="pointer-events: none;">Active</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger btn-sm" style="pointer-events: none;">Inactive</button>
                                                    @endif
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

@endsection
