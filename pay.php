<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/funcs/user_functions.php';


if(!$user_functions->isLoggedInUser()) header('location: /404');
$default_username = $functions->fetch_data_from_table($functions->users_table_name , 'username' , $website_details->defaultUsername)[0]['user_id'];
if($_COOKIE[$website_details->CookieUserKey] != $default_username)header('location: /404');
?>
<!DOCTYPE html>
<html lang="en-us" dir = "ltr">
<head>
    <meta charset="utf-8" />
    <meta name = "description" content="Admin payment page" />
    <meta name="keywords" content="Payment" />
    <link rel="stylesheet" type="text/css" href="<?php echo $website_details->CSS_FOLDER;?>bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php print $website_details->CSS_FOLDER;?>cairo.css" />
    <link rel="stylesheet" type="text/css" href="<?php print $website_details->CSS_FOLDER;?>bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php print $website_details->CSS_FOLDER;?>font-awesome.min.css" />
    <script type="text/javascript" language = "JavaScript" src="<?php echo $website_details->JS_FOLDER;?>jquery-min.js"></script>
    <script type="text/javascript" language = "JavaScript" src="<?php echo $website_details->JS_FOLDER;?>bootstrap.min.js"></script>
    <title><?php echo  $website_details->SiteName;?> Payment Requests</title>
    <script type="text/javascript" language="JavaScript" src="<?php echo $website_details->JS_FOLDER?>defaults.js"></script>



    <style type="text/css">

        #load-more-button , #refresh-button {
            display: none;
        }
    </style>






</head>

<body>
<div class="container">
    <div class="row">


        <div class="col-md-12">
            <h4>Payment requests</h4>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>

                    <th>Bank Name</th>
                    <th>Account Name</th>
                    <th>Account Number</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Amount</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>




                    </tbody>

                </table>

                <div class="clearfix"></div>
             <button class="btn btn-primary" id="load-more-button">load More</button>
                <button class="btn btn-default" id="refresh-button">Refresh <i class="fa fa-refresh"></i> </button>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Mohsin">
                </div>
                <div class="form-group">

                    <input class="form-control " type="text" placeholder="Irshad">
                </div>
                <div class="form-group">
                    <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                <p id="delete-confirmation-text">Are you sure You've made payment to this user (<strong><span id = "account-username"></span></strong>)?</p>
            </div>
            <div class="modal-footer">
                <div class="input-group">
                    <button type="button" class="btn btn-primary" id="delete-record-button">Yes, delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancel</button>

                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" language="JavaScript">

    $(document).ready(function ($) {


        var start = 0;
        var defaults = new Defaults();
        var data;
        var loadMoreButton = $('#load-more-button');
        var refreshButton = $('#refresh-button');
        var deleteRecordButton = $('#delete-record-button');
        var accountName;
        var referenceCode;
        var tbody = $('tbody');
        var amount = 0;
        var deleteConfirmationText = $('#delete-confirmation-text');
        var accountUsername = $('#account-username');
        var t;
        var tr;
        var loadMore = function loadMore() {

            data = {start: start , "file" : defaults.files.paymentRequestsFile};
            data = JSON.stringify(data);

            console.log(data);

            var paymentRequestsWorker = new Worker(defaults.workersFolder + 'request.js');
            paymentRequestsWorker.postMessage(data);
            paymentRequestsWorker.onmessage = function (ev) {

                t = JSON.parse(ev.data);

                if(!t.empty){
                    start += 10;
                    tbody.append(t.error);



                }
                else {
                    loadMoreButton.hide();
                }


                var deleteRecordButtons = $('.delete-record-buttons');

                deleteRecordButtons.on('click' , function (t1) {

                    referenceCode = $(this).attr('data-reference-code');
                    tr = $(this).parent('tr');
                    accountName = $(this).attr('data-account-name');
                    amount = $(this).attr('data-amount');
                    accountUsername.text(accountName);
                });


                deleteRecordButton.on('click' , function (t2) {
                    
                    $(this).prop("disabled" , true);
                    data = {referenceCode : referenceCode , data : 'on' , amount : amount , file : defaults.files.createPaymentHistoryFile};
                    data = JSON.stringify(data);

                    var sendRequestWorker = new Worker(defaults.workersFolder + 'request.js');
                    sendRequestWorker.postMessage(data);
/*
                    $.post( , {data : data} , function (data){

                        console.log(data);
                        $('tr#'+ referenceCode).hide();
                        $('#myModal').modal('hide');
                        data = JSON.parse(data);
                        if(data.success == "1")deleteRecordButton.prop("disabled" , false);


                    });

  */
                    sendRequestWorker.onmessage = function (ev1) {

                        $('tr#'+ referenceCode).hide();
                        $('#myModal').modal('hide');
                        data = JSON.parse(ev1.data);
                        console.log(data);
                        /*if(data.success)*/ deleteRecordButton.prop("disabled" , false);

                    }


                });



            };
        };

        var refresh = function refresh () {
            start = 0;
            tbody.html("");

            loadMoreButton.show();
            loadMore();
        };




        loadMore();





        loadMoreButton.on('click' , loadMore);
        refreshButton.on('click' , refresh);



    });


</script>

</body>
</html>