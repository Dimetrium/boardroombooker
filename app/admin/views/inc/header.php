<? $logo = '<div id="logo"><a href="?view=featured"><span id="logo-accent">B</span>ook <span id="logo-accent">M</span>agazine</a></div>';?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=TITLE?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?=ADMIN_TEMPLATE?>css/normalize.css">
        <link rel="stylesheet" href="<?=ADMIN_TEMPLATE?>css/main.css">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <section id="action-bar">
                    <?
                    $logo = new AdminSQL();
                    $logo->logo();?>
                    <nav class="dropdown">
                        <ul>
                            <li>
                                <a href="?view=addbook">Add new book</a>
                            </li>
                        </ul>
                    </nav>                   
                    <div id="user-menu">
                        <nav class="dropdown">
                            <ul>
                                <li>
                                    <a href="?view=editgenre">Genge Edit</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="user-menu">
                        <nav class="dropdown">
                            <ul>
                                <li>
                                    <a href="?view=editauthors">Authors Edit</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </section>
                <hr />
            </header>