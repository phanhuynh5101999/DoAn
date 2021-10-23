<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>English With Kids</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
</head>
<style>
    .alert-message {
        color: red;
    }
</style>
<body>

<div class="container">
    <h2 style="margin-top: 12px; color: #00816e" class="alert alert-success"> ENGLISH WITH KIDS
    </h2>
    <div class="row" style="clear: both;">
        <h3 style="color: #a0183b"> PLEASE DO NOT SEND TOKEN OR LINK TO ANYONE - THANK YOU </h3>
    </div>
    <div class="row">
        <div class="wrapper ">
            <div class="main-panel">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
