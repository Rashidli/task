<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .width{
            width: 450px;
            margin-right: auto;
            margin-left:  auto;
        }
        .all_center{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-group{
            margin-bottom: 25px;
            margin-top: 25px;
        }
        label{
            margin-bottom: 10px;
        }
        table{
            width: 750px !important;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>
<body>
