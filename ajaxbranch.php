<?php


  $bank_id=$_GET['datavalue'];

 $bank_id=(int)$bank_id;
//echo gettype($bank_id);

if(isset($_GET['datavalue']))
{

    //$url = 'http://localhost/fylepro1/public/api/bankbanch';
  $url='https://sheltered-chamber-04174.herokuapp.com/api/bankbanch';  
$data = array('bank_id' => $bank_id);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\ndatakey:ABCD454545545\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
 $context  = stream_context_create($options);

$result = file_get_contents($url, false, $context);
if ($result === FALSE) { 

    print("you are not authrized");
 }

 //$k=preg_replace('/\s+/', '',$result);
 //echo gettype($result);
// print_r($result);
  $data=json_decode($result);
 //echo gettype($data);
//print_r($data);
// foreach ($data as $result) {
//     echo $result->branch; 
  
// } 
$datastring="<option>Select city</option>";
foreach($data as $res){

    $datastring =$datastring. "<option value='$res->city'>$res->city</option>";
}

echo $datastring;


}



?>