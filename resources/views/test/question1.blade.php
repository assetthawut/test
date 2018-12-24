@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center space">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Question 1 : find x value.</div>
                <div class="card-body">

                    <form action="./question1" method="post">
                        @csrf
                        @foreach($startData as $data)
                        <input type="hidden" value={{$data}} name="question1[]"/>
                        {{ $data }}
                        @endforeach
                        x,
                        <button>Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
