@extends('layouts.app-template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('title')
            <ol class="breadcrumb">
                <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
                @yield('breadcrumb')
            </ol>
        </section>
    @yield('action-content')
    <!-- /.content -->
    </div>
@endsection