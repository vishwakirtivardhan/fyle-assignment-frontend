<?php

$url = 'http://localhost/fylepro1/public/api/data';
$data = array('city' => 'AKOT');

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
 //print_r($k);
  $data=json_decode($result);
 //echo gettype($data);
//print($data[6]->bank_id);


//---------- This is code for the bank APi fetch --------//
$url = 'http://localhost/fylepro1/public/api/bankdata';
//$data = array('city' => 'AKOT');

// use key 'http' even if you send the request to https://...
$optionsbank = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\ndatakey:ABCD454545545\r\n",
        'method'  => 'POST',
  
    )
);
 $contextbank  = stream_context_create($optionsbank);

$resultbank = file_get_contents($url, false, $contextbank);
if ($resultbank === FALSE) { 

    print("you are not authrized");
 }

 //$k=preg_replace('/\s+/', '',$result);
 //echo gettype($resultbank);
 //print_r($k);
  $bankdata=json_decode($resultbank);
  //print_r($bankdata);
// ******** End ********** //

///******* This is second way to connec the RestAPI ********* */
// $url = 'http://localhost/fylepro1/public/api/data';

// //The data you want to send via POST
// $fields = [
       
//        // 'method'  => 'POST',
//         //'content' => http_build_query($data)
//         'city' => 'AKOT'
//     ];
// $header=[
//     'Content-type'=> 'application/x-www-form-urlencoded',
//     'datakey'=>'ABCD454545545'
// ];
// //url-ify the data for the POST
// $fields_string = http_build_query($fields);

// //open connection
// $ch = curl_init();

// //set the url, number of POST vars, POST data
// curl_setopt($ch, CURLOPT_HEADER,$header);
// curl_setopt($ch,CURLOPT_URL, $url);
// curl_setopt($ch,CURLOPT_POST, true);

// curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

// //So that curl_exec returns the contents of the cURL; rather than echoing it
// curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

// //execute post
// $result = curl_exec($ch);
// echo $result;

?>

<html>

<head>

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <linl rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        
            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        
            <style>
            body {
                padding: 20px 20px;
            }

            .results tr[visible='false'],
            .no-result {
                display: none;
            }

            .results tr[visible='true'] {
                display: table-row;
            }

            .counter {
                padding: 8px;
                color: #ccc;
            }
            </style>

</head>

<body>
    <div>
        <form>



            <select class="dropdown" onchange="branchcheck(this.value)" id="bank">
                <?php foreach($bankdata as $res){ ?>
                <option class="" value="<?php echo $res->id; ?>"><?php echo $res->name; ?></option>

                <?php } ?>
            </select>

            <select class="form-group" id="branch" onchange="getbranchdetails(this.value)">
                <option class="" value="">Select Branch</option>

            </select>


        </form>


        <!-- Latest compiled JavaScript -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        </script> -->
<!-- 
        <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        </script> -->
<!--         
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ifsc Code</th>
                    <th>Bank Id</th>
                    <th>Branch</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                </tr>
            </thead>
            <tbody id="banksdetails">
            <tr>
                    <th>#</th>
                    <th>Ifsc Code</th>
                    <th>Bank Id</th>
                    <th>Branch</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                </tr><tr>
                    <th>#</th>
                    <th>Ifsc Code</th>
                    <th>Bank Id</th>
                    <th>Branch</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                </tr><tr>
                    <th>#</th>
                    <th>Ifsc Code</th>
                    <th>Bank Id</th>
                    <th>Branch</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                </tr><tr>
                    <th>#</th>
                    <th>Ifsc Code</th>
                    <th>Bank Id</th>
                    <th>Branch</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Ifsc Code</th>
                    <th>Bank Id</th>
                    <th>Branch</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                </tr>
            </tfoot>
        </table> -->

        <div class="form-group pull-right">
            <input type="text" class="search form-control" placeholder="What you looking for?">
        </div>
        <span class="counter pull-right"></span>
        <table class="table table-hover table-bordered results">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="col-md-2 col-xs-2">Ifsc Code</th>
                    <th class="col-md-2 col-xs-2">Bank Id</th>
                    <th class="col-md-2 col-xs-2">Branch</th>
                    <th class="col-md-2 col-xs-2">Address</th>
                    <th class="col-md-2 col-xs-2">City</th>
                    <th class="col-md-2 col-xs-2">State</th>

                </tr>
                <tr class="warning no-result">
                    <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                </tr>
            </thead>
            <tbody id="banksdetails">


                <!-- <?php
    //   $count=0;
    //   foreach($data as $res){
      ?>
                <tr>
                    <th scope="row"><?php //echo $count++; ?></th>
                    <td><?php// echo $res->ifsc; ?></td>
                    <td><?php //echo $res->bank_id; ?></td>

                    <td><?php// echo $res->branch; ?></td>
                    <td><?php// echo $res->address; ?></td>

                    <td><?// echo $res->city; ?></td>
                    <td><?php// echo $res->state; ?></td>
                </tr>
                <?php
  //    }
      ?> -->

            </tbody>
        </table>
    </div>

    <script>
    function getbranchdetails(city) {
        let bank_id = document.getElementById('bank').value;
        console.log(bank_id);
        //alert(bank_id);

        var reqes = new XMLHttpRequest();
        reqes.open("POST", "http://localhost/api/detailsbranch.php?city=" + city + "&&bank_id=" + bank_id, true);
        reqes.send();

        reqes.onreadystatechange = function() {
            if (reqes.readyState == 4 && reqes.status === 200) {
                //console.log(req.responseText);
                document.getElementById('banksdetails').innerHTML = reqes.responseText;
                //console.log(document.getElementById('branch').innerHTML = req.responseText);
            }
        }
    }




    function branchcheck(data) {
        //alert(data);
        var req = new XMLHttpRequest();
        req.open("POST", "http://localhost/api/ajaxbranch.php?datavalue=" + data, true);
        req.send();

        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status === 200) {
                //console.log(req.responseText);
                document.getElementById('branch').innerHTML = req.responseText;
                //console.log(document.getElementById('branch').innerHTML = req.responseText);
            }
        }
    }
    </script>
    <script>
    $(document).ready(function() {
        $(".search").keyup(function() {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {
                'containsi': function(elem, i, match, array) {
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf(
                        (match[3] || "").toLowerCase()) >= 0;
                }
            });

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
                $(this).attr('visible', 'false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e) {
                $(this).attr('visible', 'true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' item');

            if (jobCount == '0') {
                $('.no-result').show();
            } else {
                $('.no-result').hide();
            }
        });
    });
    </script>


</body>

</html>