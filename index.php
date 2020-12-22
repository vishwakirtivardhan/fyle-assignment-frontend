<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <linl rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="index.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Fyle Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" target="_blank" href="https://test1-php.herokuapp.com/">Home <span
                        class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" target="_blank"
                    href="https://www.notion.so/Fyle-Full-Stack-Coding-Challenge-db30c5cb91d54de1b330c16f22fc49f0">Assignmnent
                    Link</a>
                <a class="nav-item nav-link" target="_blank"
                    href="https://github.com/vishwakirtivardhan/fyle-assignment-frontend">Front-end Github</a>
                <a class="nav-item nav-link " target="_blank"
                    href="https://github.com/vishwakirtivardhan/fyle-assignment-api">Back-end Github</a>
                <a class="nav-item nav-link " target="_blank"
                    href="https://drive.google.com/file/d/1nDUxwqL8jrTLABHXeTUB2z3aT5oM7F5P/view">Resume</a>
            </div>
        </div>
    </nav>
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
            <div id="bankslistcont" class="form-group col-6 col-xl-6">
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
                        <!-- <th class="col-md-2 col-xs-2">Address</th> -->
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
    <!-- This is JS file  contain all the JS of this project -->
    <script src="index.js"></script>
    <!-- End -->
</body>

</html>