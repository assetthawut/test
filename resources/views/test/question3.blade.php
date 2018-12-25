@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center space">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Question 3 :</b> If 1 = 5 , 2 = 25 , 3 = 325 , 4 = 4325 Then 5 = X - Please create new function for finding X value</div>
                <div class="card-body">
                   <form action="./question3" method="POST">
                    @csrf
                    <b>
                    @foreach ($startData as $key => $value )
                    {{ $key ." = ". $value }}
                    <br>
                    <input type="hidden" value={{$value}} name="question3[{{$key}}]"/>
                     @endforeach
                         then = ?
                        </b>
                         
                         <div>
                            <button type="submit" class="btn btn-primary">Next</button>
                         </div>
                         
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
