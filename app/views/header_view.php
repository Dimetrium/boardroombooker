
<header>
    <div class="btn-group" role="group" aria-label="...">
        <form action="<?php $_SERVER[ 'REQUEST_URI' ] ?>" method="post">
                        <button type="submit" name="lang" value="en" class="btn btn-default">En</button>
                        <button type="submit" name="lang" value="ru" class="btn btn-default">Ru</button>
<!--            <button onclick="SendPost()" type="submit" name="lang" value="en" class="btn btn-default">En</button>-->
<!--            <button onclick="SendPost()" type="submit" name="lang" value="ru" class="btn btn-default">Ru</button>-->
        </form>
    </div>

    <section id="action-bar">
        <div id="logo">
            <a href="<?= BASE ?>"><span id="logo-accent">B</span>ook <span
                    id="logo-accent">S</span>hop</a>
        </div>
        <nav class="dropdown">
            <ul>
                <li>
                    <a href="#">{{BY_GENRE}}<img src="<?= IMG ?>down-arrow.gif" alt={{BY_GENRE}}/></a>
                    <ul>
                        <?php foreach ( $genres as $item ): ?>
                            <li>
                                <a href="category/genre/<?= $item[ 'genre_id' ] ?>/"><?= $item[ 'genre_title' ] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="user-menu">
            <nav class="dropdown">
                <ul>
                    <li>
                        <a href="#"><img src="<?= IMG ?>user-icon.gif" alt="By Authors"/>{{BY_AUTHORS}}<img
                                src="<?= IMG ?>down-arrow.gif" alt="Authors"/></a>
                        <ul>
                            <?php foreach ( $authors as $author ): ?>
                                <li>
                                    <a href="category/author/<?= $author[ 'author_id' ] ?>/"><?= $author[ 'author_title' ] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="view-cart">
            <a href="#" data-toggle="modal" data-target="#loginModal"><img src="<?= IMG ?>password.gif"
                                                                           alt="Admin Panel">{{SIGN_UP}}</a>
        </div>
    </section>
</header>
