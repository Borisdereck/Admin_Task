<?php
include('scripts/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ajax Jquery Php</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/atom.tracker.js"></script>
        <script src="js/main.js"></script>

        <style>
            *:disabled{
                background-color: #cccccc !important;
                border: none !important;
            }
            .btn-col{
                width: 38px;
            }
        </style>
    </head>

    <body>
        <div class="container"><br>

            <div class="panel panel-primary">
                <div class="panel-heading">Boris Terraza G - .BieS</div>

            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <a data-mode="restore" id="btn-mode" href="#">Enter <span id="lbl-mode">Restore</span> Mode</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        Total Time: <span id="tally"></span>
                    </div>
                </div>
                <div class="row">
                    <form id="form-new">
                        <div class="col-xs-10">
                            <input id="task" name="task" type="text" placeholder="Enter New Task Here.." class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <button type="submit" class="btn btn-block btn-success "><?= i('play') ?></button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>TASK</th>
                                <th>START</th>
                                <th>END</th>
                                <th>TIME</th>
                                <th colspan="2">CONTROLS</th>
                            </tr>
                        </thead>
                        <tbody id="log">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>
