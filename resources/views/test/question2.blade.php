@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center space">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Question 1 : (Y + 24)+(10 × 2) = 99 finding Y value</div>
                <div class="card-body">
                    Y =  {{$result}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
