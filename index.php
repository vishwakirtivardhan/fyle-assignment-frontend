<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <linl rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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

        .dropdownselect {

            padding: 2% 10% 2% 10%;
            box-shadow: -2px 2px 13px #8e89894a;
            border-radius: 5px;
            margin-bottom: 50px;
        }

        #search,
        select {
            padding: 9px;
            margin-left: 5px;
            float: left;
            border: 1px solid #00000078;
            border-radius: 6px;
            height: 45px;
        }

        .col-xl-6 {
            max-width: 48%;
        }

        input,
        select:hover {
            background: #0a0a0a21;
        }

        #banklist {
            position: absolute;
            z-index: 9999;
            margin-left: 8px;
            margin-top: 53px;
            background: #f9f9f9;
            padding: 10px;
            border: 1px solid #00000069;
            list-style: none;
            border-radius: 6px;
            box-shadow: 1px 3px 7px #8e9296a6;
        }

        #banklist li {
            padding: 5px 10px 5px 10px;
            border: 1px solid;
            border-radius: 3px;
            margin: 10px 7px;
            cursor: pointer;
        }

        #banklist li:hover {
            background: white;
        }
        </style>

</head>

<body>
    <div class="container">
        <div class="dropdownselect row">
            <label class="form-group col-6 col-xl-6">Search Bank*</label>
            <label class="form-group col-6 col-xl-6">Select City*</label>

            <!-- <select class="form-group col-6 col-xl-6" onchange="branchcheck(this.value)" id="bank">
                <option>Select-Bank-First</option>
                <?php //foreach($bankdata as $res){ ?>
                <option class="" value="<?php //echo $res->id; ?>"><?php// echo $res->name; ?></option>

                <?php// } ?>
            </select> -->
            <div class="form-group col-6 col-xl-6">
                <div class="input-group mb-3">
                    <input type="text" onkeyup="bankautocomplete(this.value)" id="search" value="" class="form-control"
                        placeholder="Search Bank Here">
                    <input type="number" style="display:none;" oninput="branchcheck(this.value)" id="bank">
                    <ul id="banklist" style="display:none"></ul>
                </div>
            </div>

            <select class="form-group col-6 col-xl-6" id="branch" onchange="getbranchdetails(this.value)">
                <option class="" value="">Select Branch</option>

            </select>
        </div>

        <span id="tables" style="display:none;">
            <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="Search">
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
                <tbody id="banksdetails"> </tbody>
            </table>
        </span>
    </div>

    <script src="index.js"></script>

</body>

</html>