<!DOCTYPE html>
<html>
<head>
    <base href="<?= BASE ?>">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title><?= TITLE ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?= CSS ?>bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?= CSS ?>modal.css">
    <script type="text/javascript" src="<?= JS ?>jquery-2.1.3.js"></script>
    <script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>
</head>
<body>
<div class="container">

    <!--        --><?php //include 'app/views/header_view.php'; ?>
    <?php include 'app/views/' . $content_view; ?>
    <!--        --><?php //include 'app/views/footer_view.php'; ?>

</div>
<script type="text/javascript" src="<?= JS ?>bootstrap.min.js"></script>
</body>
</html>
