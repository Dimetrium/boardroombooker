<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=TITLE?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=CSS?>normalize.css">
    <link rel="stylesheet" href="<?=CSS?>main.css">
</head>
<body>
<div id="wrapper">
    <header>
        <section id="action-bar">
            <?php
            $mysql = new Mysql();
//            $mysql->logo();
            ?>
            <div id="logo"><a href="/"><span id="logo-accent">B</span>ook <span id="logo-accent">S</span>hop</a></div>
            <nav class="dropdown">
                <ul>
                    <li>
                        <a href="#">By Genre <img src="<?=VIEW?>img/down-arrow.gif" alt="By Genre" /></a>
                        <ul>
                            <?php foreach($genres_array as $key => $item):?>
                                <li><a href="?view=category&genre=<?=$item['genre_id']?>"><?=$item['genre_title']?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="user-menu">
                <nav class="dropdown">
                    <ul>
                        <li>
                            <a href="#"><img src="<?=VIEW?>img/user-icon.gif" alt="By Authors"/> By Authors <img src="<?=VIEW?>img/down-arrow.gif" alt="Authors"/></a>
                            <ul>
                                <?php foreach($authors_array as $key => $authors):?>
                                    <li><a href="?view=authors&authors=<?=$authors['author_id']?>"><?=$authors['author_title']?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div><!--end user-menu-->
            <div id="view-cart">
                <a href="/app/admin"><img src="<?=VIEW?>/img/password.gif" alt="Admin Panel"> Admin Panel</a>
            </div><!--end view-cart-->
        </section><!--end action-bar-->
    </header>

    <?php include 'app/views/'.$content_view; ?>
            <footer>
                <section class="clearfix">
                    <div id="copyright">
                        <div id="logo"><a href="/"><span id="logo-accent">B</span>ook <span id="logo-accent">S</span>hop</a></div>
                        <!--end logo-->
                        <p id="store-desc">This is a short description of the store.</p>
                        <p id="store-copy">&copy; 2014 Book Magazine.</p>
                    </div><!--end copyright-->
                    <div id="payments">
                      <h4>SUPPORTED PAYMENT METHODS</h4>
                      <img src="<?=VIEW?>img/payment-methods.gif" alt="Supported Payment Methods">
                    </div><!--end payments-->
                </section>
            </footer>
        </div><!--end wrapper-->
    </body>
</html>