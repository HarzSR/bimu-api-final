@extends('layouts.admin_layout.admin_layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>USERS</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">USERS</div>
                            <div class="number count-to" data-from="0" data-to="{{ $userCount }}" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">ACTIVE</div>
                            <div class="number count-to" data-from="0" data-to="{{ $userActiveCount }}" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">warning</i>
                        </div>
                        <div class="content">
                            <div class="text">INACTIVE</div>
                            <div class="number count-to" data-from="0" data-to="{{ $userInactiveCount }}" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
        </div>
        <div class="container-fluid">
            <div class="block-header">
                <h2>DEVICES</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">developer_board</i>
                        </div>
                        <div class="content">
                            <div class="text">USERS</div>
                            <div class="number count-to" data-from="0" data-to="{{ $deviceCount }}" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">RECIPES</div>
                            <div class="number count-to" data-from="0" data-to="{{ $deviceActiveCount }}" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">warning</i>
                        </div>
                        <div class="content">
                            <div class="text">INACTIVE BIMU</div>
                            <div class="number count-to" data-from="0" data-to="{{ $deviceInactiveCount }}" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
        </div>
        <div class="container-fluid">
            <div class="block-header">
                <h2>RECIPES</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">yard</i>
                        </div>
                        <div class="content">
                            <div class="text">USERS</div>
                            <div class="number count-to" data-from="0" data-to="{{ $recipeCount }}" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">RECIPES</div>
                            <div class="number count-to" data-from="0" data-to="{{ $recipeActiveCount }}" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">warning</i>
                        </div>
                        <div class="content">
                            <div class="text">INACTIVE BIMU</div>
                            <div class="number count-to" data-from="0" data-to="{{ $recipeInactiveCount }}" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
        </div>
    </section>

@endsection
