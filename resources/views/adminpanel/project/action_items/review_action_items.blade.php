@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Review Action Items</h4>
                    </div>
                    <div class="card-body">
                        <!-- Project Forms Tabs -->
                        @include('adminpanel.project.action_items.project_details')
                        @if(Session::has('success'))
                             <div class="alert alert-success">{{Session::get('success')}}</div><br/>
                        @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div><br/>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection