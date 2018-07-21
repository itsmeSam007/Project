@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div style="display:none;" class="alert alert-success" role="alert">
                   
                </div>
                <div style="display:none;" class="alert alert-danger" role="alert">
                  
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    
                    <form-task></form-task>
                </div>
            </div>
        </div>
    </div>
</div>


    

@endsection
