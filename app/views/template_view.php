<!DOCTYPE html>
<html>
<head>
    <base href="<?= BASE ?>">
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= TITLE ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?= CSS ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= CSS ?>CalendarBody.css"/>
    <!--    <link rel="stylesheet" href="--><? //= CSS ?><!--edit_view.css"/>-->
    <link rel="stylesheet" href="<?= CSS ?>datapicker.min.css"/>
    <script type="text/javascript" src="<?= JS ?>jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>
    <script type="text/javascript" src="<?= JS ?>datapicker.js"></script>
    <script src="<?= JS ?>bootstrap-datepicker.min.js"></script>
</head>
<body>
<?php include 'app/views/' . $content_view; ?>
<script type="text/javascript" src="<?= JS ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?= JS ?>calendar.js"></script>
</body>
</html>
