@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                        @if(auth()->user()->roles->contains(3))
                        For Moderator
                        @endif
                        @if(auth()->user()->roles->contains(1))
                        For Admin
                        @endif


                </div>
                @if(auth()->user()->roles->contains(1))
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="{{ $chart1->options['column_class'] }}">
                            <h3>{!! $chart1->options['chart_title'] !!}</h3>
                            {!! $chart1->renderHtml() !!}
                        </div>
                    </div>
                </div>
                @endif
                @if(auth()->user()->roles->contains(3))
                <div class="card-body">
                    @include('back.dashboardForModerator')
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@if(auth()->user()->roles->contains(1))
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart1->renderJs() !!}
    @endif
@endsection
