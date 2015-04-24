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

    <script type="text/javascript" src="<?= JS ?>jquery-1.11.2.min.js"></script>

    <script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>
</head>
<body>
    <?php include 'app/views/' . $content_view; ?>
    <script>
        function myFunction() {
            window.open("details", "_blank", "toolbar=no, location=no, scrollbars=yes, resizable=yes, top=500, left=500, width=600, height=400");
        }
    </script>
<script type="text/javascript" src="<?= JS ?>bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= JS ?>calendar.js"></script>
        <script type="text/javascript" src="<?= JS ?>datapicker.js"></script>
</body>
</html>
