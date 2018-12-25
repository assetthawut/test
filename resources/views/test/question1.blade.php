@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center space">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Question 1 :</b> 3, 5, 9, 15, X - Please create new function for finding X value.</div>
                <div class="card-body">

                    <form action="./question1" method="post">
                        @csrf
                        @foreach($startData as $data)
                        <input type="hidden" value={{$data}} name="question1[]"/>
                        <b>{{ $data }} ,</b> 
                        @endforeach
                        x,
                        <div>
                            <button typoe="submit" class="btn btn-primary">Next</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
