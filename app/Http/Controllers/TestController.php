<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public $quest1 = 10; 

    public function index()
    {
        //
        
        
        return view('test.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function question1(){

        $startData = [3,5,9,15];

        return view('test.question1',['startData' => $startData]);
    }

    public function question2(){


        $expectValue = $this->getExpectValue(' ( y + 24 ) + ( 10 * 2 ) = 99');
        $positiveNum = $this->getDiff( 10, $expectValue );
        $negativeNum = $this->getDiff(-10, $expectValue );
        $closestType = $this->getClosestZeroType($positiveNum,$negativeNum);

        $result = $this->getResult($closestType, $expectValue);
        return view('test.question2',['result' => $result]);

        
    }

    public function getDiff($testNumber,$expectValue){

        $number             =  $testNumber;
        $equationString     =  $this->getEquationString($number);
        $diff = eval('return '.$equationString.';');
        $diff = $diff - $expectValue;
        return abs($diff);
        // return diff

    }


    public function getClosestZeroType($positiveNum,$negativeNum){

        if($positiveNum > $negativeNum){
            return "negClosest";
        }else{

            return "posClosest";
        }
    }


    public function getResult($closestType,$expectValue){

        switch($closestType)
        {
            case 'posClosest':
                for($i=0;$i<100000;$i++){

                        $equationString = $this->getEquationString($i);
                        $result = eval('return '.$equationString.';');
                        if($result == $expectValue){

                            return $i;
                        }
                }
            break;
            case 'negClosest':
            for($i=0;$i > -100000;$i--){

                $equationString = $this->getEquationString($i);
                $result = eval('return '.$equationString.';');
                if($result == $expectValue){

                    return $i;
                }
        }            
            break;
            default:
            echo "Error";
        }

    }

    public function getExpectValue($equationStringWithResult){

        // ( y + 24 ) + ( 10 * 2 ) = 99 

        $explodeTemp = explode("=",$equationStringWithResult);

        $expectResult = $explodeTemp[1];
        $expectResult = (int)$expectResult;

        return $expectResult;
        // return 99;



    }

    public function getEquationString($number){

        $string = "( y + 24 ) + ( 10 * 2 )";
        $equationString = str_replace("y",$number,$string);
        return $equationString;

    }





    public function findNextAlphabet(Request $request){

        // Rule : ((currentPostion + 1) * 2) + currentValue ); 
        
        $nextData = [];
        $currentData = $request->input('question1'); 
        $sizeOfArray = sizeof($currentData);
        $lastValue   = end($currentData);

        // cast to intger;
        $lastValue  = (int)$lastValue ;
        $nextValue   = ($sizeOfArray * 2) + $lastValue;
        array_push($currentData,$nextValue);
        $startData   = $currentData;
        
        return view('test.question1',['startData' => $startData]);

    }
}
