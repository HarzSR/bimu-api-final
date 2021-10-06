@extends('layouts.admin_layout.admin_layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DEVICE INPUT DATA
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Device Name</th>
                                            <th>Device MAC</th>
                                            <th>Temperature</th>
                                            <th>Humidity</th>
                                            <th>Light</th>
                                            <th>Temp Probe</th>
                                            <th>Water Level</th>
                                            <th>EC Probe</th>
                                            <th>pH Probe</th>
                                            <th>RTC</th>
                                            <th>CRC</th>
                                            <th>Created on</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Device Name</th>
                                            <th>Device MAC</th>
                                            <th>Temperature</th>
                                            <th>Humidity</th>
                                            <th>Light</th>
                                            <th>Temp Probe</th>
                                            <th>Water Level</th>
                                            <th>EC Probe</th>
                                            <th>pH Probe</th>
                                            <th>RTC</th>
                                            <th>CRC</th>
                                            <th>Created on</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($inputs as $input)
                                            <tr>
                                                <td>{{ $input->id }}</td>
                                                <td>{{ ucwords($input->device->name) }}</td>
                                                <td>{{ $input->device->mac_address }}</td>
                                                <td>{{ $input->temperature }}</td>
                                                <td>{{ $input->humidity }}</td>
                                                <td>{{ $input->light }}</td>
                                                <td>{{ $input->temperature_probe }}</td>
                                                <td>{{ $input->water_level }}</td>
                                                <td>{{ $input->ec_probe }}</td>
                                                <td>{{ $input->ph_probe }}</td>
                                                <td><?php echo date('d-M-Y h:i A', strtotime($input->device_rtc)); ?></td>
                                                <td>{{ $input->crc }}</td>
                                                <td><?php echo date('d-M-Y h:i A', strtotime($input->created_at)); ?></td>
                                                <td>
                                                    @if($input->status == 1)
                                                        <button type="button" class="btn btn-success btn-sm" style="pointer-events: none;">CRC Pass</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger btn-sm" style="pointer-events: none;">CRC Fail</button>
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
