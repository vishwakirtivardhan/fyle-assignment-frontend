<?php
   $city=$_GET['city'];
   $bank_id=$_GET['bank_id'];

 $bank_id=(int)$bank_id;
//echo gettype($bank_id);

if(isset($_GET['city']))
{

    //$url = 'http://localhost/fylepro1/public/api/bankbanchdetails';
    $url='https://sheltered-chamber-04174.herokuapp.com/api/bankbanchdetails';
$data = array('bank_id' => $bank_id,'city'=>$city);

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
$datastring="";
// foreach($data as $res){

//     $datastring =$datastring. "<option value='$res->city'>$res->city</option>";
// }




$count=0;
      foreach($data as $res){
        $count++;
              $datastring=$datastring.  "<tr>
                    <th scope='row'> $count</th>
                    <td class='col-md-2 col-xs-2'> $res->ifsc </td>
                    <td class='col-md-2 col-xs-2'> $res->bank_id</td>
                    <td class='col-md-2 col-xs-2'> $res->branch</td>
                    
                    <td class='col-md-2 col-xs-2'> $res->city</td>
                    <td class='col-md-2 col-xs-2'> $res->state</td>
                </tr>";
                
      }

}

if($data==NULL){

    $datastring=  "<tr>
                    <th scope='row'> No Data Found</th>
                    <td> No Data Found </td>
                    <td> No Data Found</td>

                    <td> No Data Found</td>
                    <td> No Data Found</td>

                    <td> No Data Found </td>
                    <td> No Data Found </td>
                </tr>";
              
    
}

echo $datastring;

?>

<?php
      
      ?>