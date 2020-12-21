<?php

// **************** Here We are hit API for getting name of Bank **************** //
$bankname=$_GET['bankname'];
//$url = 'http://localhost/fylepro1/public/api/bankdata';
$url='https://sheltered-chamber-04174.herokuapp.com/api/bankdata';
$data = array('bankname' => $bankname,);
$optionsbank = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\ndatakey:ABCD454545545\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
 $contextbank  = stream_context_create($optionsbank);
$resultbank = file_get_contents($url, false, $contextbank);
if ($resultbank === FALSE) { 
    print("you are not authrized");
 }
 

$bankdata=json_decode($resultbank);
$dataString="";
foreach($bankdata as $data){

    $dataString=$dataString."<li onclick='addInput(this.value,this.innerHTML)' value='$data->id'>$data->name </li>";

}

if($dataString==null){
    $dataString=$dataString."<li  >No Record Found </li>";
}

echo $dataString;
//print_r($bankdata);
// **************** End **************** //

?>