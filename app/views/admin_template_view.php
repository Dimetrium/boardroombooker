<!DOCTYPE html>
<html>
<head>
    <base href="<?= BASE ?>">
    <title><?= TITLE ?></title>
    <link rel="stylesheet" href="<?= CSS ?>bootstrap.min.css"/>
    <link rel="stylesheet" href="<?= CSS ?>main.css">
    <link rel="stylesheet" href="<?= CSS ?>normalize.css">
</head>
<body>
<div id="wrapper">
    <header>
        <section id="action-bar">
            <div id="logo">
                <a href="admin"><span id="logo-accent">B</span>ook <span id="logo-accent">S</span>hop <span
                        id="logo-accent">A</span>dmin</a>
            </div>
            <nav class="dropdown">
                <ul>
                    <li>
                        <a href="admin/add">Add New Book <img src="<?= IMG ?>down-arrow.gif" alt="By Genre"/></a>
                    </li>
                </ul>
            </nav>
            <div id="user-menu">
                <nav class="dropdown">
                    <ul>
                        <li>
                            <a href="admin/user"><img src="<?= IMG ?>user-icon.gif" alt="By Authors"/> Edit Users <img
                                    src="<?= IMG ?>down-arrow.gif" alt="Authors"/></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--end user-menu-->
            <div id="view-cart">
                <a href="admin/logout"><img src="<?= IMG ?>password.gif" alt="Admin Panel"> Log Out</a>
            </div>
            <!--end view-cart-->
        </section>
        <!--end action-bar-->
    </header>

    <?php include 'app/views/' . $content_view; ?>

    <footer>
        <section class="clearfix">
            <div id="copyright">
                <div id="logo"><a href="/"><span id="logo-accent">B</span>ook <span id="logo-accent">S</span>hop <span
                            id="logo-accent">A</span>dmin</a></div>
                <!--end logo-->
                <p id="store-desc">This is a short description of the store.</p>

                <p id="store-copy">&copy; 2015 Book Shop.</p>
            </div>
            <!--end copyright-->

        </section>
    </footer>
</div>
</body>
</html>
