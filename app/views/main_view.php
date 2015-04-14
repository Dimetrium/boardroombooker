<section id="main-content">
    <h2>{{MAIN_H2}}</h2>
    <hr>
<?php if($data): ?>
    <?php foreach($data as $books):?>
        <div class="product">
            <a href="product/index/<?=$books['book_id']?>"><img src="<?=IMG.$books['img']?>" alt=Product"" class="feature"></a>
            <h3><a href="product/index/<?=$books['book_id']?>"><?=$books['book_title']?></a></h3>
            <p><span><?=substr($books['full_text'], 0, 200)."..."?></span></p>
            <p>
                <a href="product/index/<?=$books['book_id']?>" class="cart-btn">
                    <span class="price">$<?=$books['price']?></span><img src="<?=IMG?>white-cart.gif" alt="View Details">
                    {{PRODUCT_BUTTON_MAIN}}
                </a>
            </p>
        </div><!--end productS-->
    <?php endforeach?>
<?php else: ?>
    <p>{{ALL_BOOK_SOLID}}</p>
<?php endif; ?>
</section>
<hr>
