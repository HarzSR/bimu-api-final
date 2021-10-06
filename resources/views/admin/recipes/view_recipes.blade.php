@extends('layouts.admin_layout.admin_layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DEVICE RECIPE DATA
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Device Name</th>
                                            <th>Device MAC</th>
                                            <th>1<sup>st</sup> Fog Setup</th>
                                            <th>2<sup>nd</sup> Fog Setup</th>
                                            <th>1<sup>st</sup> Light Setup</th>
                                            <th>2<sup>nd</sup> Light Setup</th>
                                            <th>Humidity</th>
                                            <th>RTC</th>
                                            <th>Default</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Device Name</th>
                                            <th>Device MAC</th>
                                            <th>1<sup>st</sup> Fog Setup</th>
                                            <th>2<sup>nd</sup> Fog Setup</th>
                                            <th>1<sup>st</sup> Light Setup</th>
                                            <th>2<sup>nd</sup> Light Setup</th>
                                            <th>Humidity</th>
                                            <th>RTC</th>
                                            <th>Default</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($recipes as $recipe)
                                            <tr>
                                                <td>{{ ucwords($recipe->user->name) }}</td>
                                                <td>{{ ucwords($recipe->device->name) }}</td>
                                                <td>{{ $recipe->device->mac_address }}</td>
                                                <td><b>Duration:</b><br>{{ $recipe->fog1_duration }} min(s)<br><b>On:</b><br>{{ $recipe->fog1_on_minutes }} min(s)<br><b>Off:</b><br>{{ $recipe->fog1_off_minutes }} min(s)<br><b>Start:</b><br><?php echo date('h:i A', strtotime($recipe->fog1_start_time)); ?><br><b>End:</b><br><?php echo date('h:i A', strtotime($recipe->fog1_end_time)); ?></td>
                                                <td><b>Duration:</b><br>{{ $recipe->fog2_duration }} min(s)<br><b>On:</b><br>{{ $recipe->fog2_on_minutes }} min(s)<br><b>Off:</b><br>{{ $recipe->fog2_off_minutes }} min(s)<br><b>Start:</b><br><?php echo date('h:i A', strtotime($recipe->fog2_start_time)); ?><br><b>End:</b><br><?php echo date('h:i A', strtotime($recipe->fog2_end_time)); ?></td>
                                                <td><b>Red:</b><br>{{ $recipe->light1_red }}<br><b>Blue:</b><br>{{ $recipe->light1_blue }}<br><b>Green:</b><br>{{ $recipe->light1_green }}<br><b>White:</b><br>{{ $recipe->light1_white }}<br><b>Bright:</b><br>{{ $recipe->light1_bright }}<br><b>Start:</b><br><?php echo date('h:i A', strtotime($recipe->light1_start_time)); ?><br><b>End:</b><br><?php echo date('h:i A', strtotime($recipe->light1_end_time)); ?></td>
                                                <td><b>Red:</b><br>{{ $recipe->light2_red }}<br><b>Blue:</b><br>{{ $recipe->light2_blue }}<br><b>Green:</b><br>{{ $recipe->light2_green }}<br><b>White:</b><br>{{ $recipe->light2_white }}<br><b>Bright:</b><br>{{ $recipe->light2_bright }}<br><b>Start:</b><br><?php echo date('h:i A', strtotime($recipe->light2_start_time)); ?><br><b>End:</b><br><?php echo date('h:i A', strtotime($recipe->light2_end_time)); ?></td>
                                                <td>{{ $recipe->humidity }}</td>
                                                <td><?php echo date('d-M-Y h:i A', strtotime($recipe->device_rtc)); ?></td>
                                                <td>
                                                    @if($recipe->default == 1)
                                                        <button type="button" class="btn btn-success btn-sm" style="pointer-events: none;">Yes</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger btn-sm" style="pointer-events: none;">No</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($recipe->status == 1)
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
