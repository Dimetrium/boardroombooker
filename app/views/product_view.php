<section id="main-content" class="clearfix">
    <hr/>
    <div id="product-image">
        <img src="<?= IMG . 'big' . $data[ 'img' ] ?>" alt="Product">
    </div>
    <!--end product-image-->
    <div id="product-details">
        <h1><?= $data[ 'book_title' ] ?></h1>

        <p><?= $data[ 'full_text' ] ?></p>
        <hr/>
        <form action="" method="post">
            <label for="qty">{{QTY}}: </label>
            <input type="text" id="qty" name="quantity" value="1" maxlength="2">

            <button type="submit" name="sendmail" value="Send" id="submitMail" maxlength="1000"
                    class="secondary-cart-btn">
                <img src="<?= IMG ?>white-cart.gif" alt="ADD TO CART"> {{ADD TO CART}}
            </button>
        </form>
    </div>
    <!--end product-details-->
    <div id="product-info">
        <p class="price">$ <?= $data[ 'price' ] ?></p>

        <p>{{AUTHOR}}: <span><?= $data[ 'author_title' ] ?></span></p>

        <p>{{GENRE}}: <span><?= $data[ 'genre_title' ] ?></span></p>
    </div>
</section>
<hr>