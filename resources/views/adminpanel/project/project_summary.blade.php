@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if(Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <div class="card">
                    <div class="card-header">
                        <h4>Project Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection