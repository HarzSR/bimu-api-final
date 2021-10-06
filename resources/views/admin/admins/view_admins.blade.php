@extends('layouts.admin_layout.admin_layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADMIN DATA
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Email</th>
                                            <th>Created on</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Email</th>
                                            <th>Created on</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->id }}</td>
                                                <td>{{ ucwords($admin->name) }}</td>
                                                <td>{{ ucwords($admin->type) }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td><?php echo date('d-M-Y h:i A', strtotime($admin->created_at)); ?></td>
                                                <td>
                                                    @if($admin->status == 1)
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
