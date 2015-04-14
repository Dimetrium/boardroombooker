<section id="main-content" class="clearfix">
    <hr>

    <h2><?=$data[0]['author_title'];?></h2>
    <h2><?=$data[0]['genre_title'];?></h2>

    <div id="listings">
    <?php if($data): ?>
    <?php foreach($data as $category_item):?>
        <div class="product">
            <a href="product/index/<?=$category_item['book_id']?>"><img src="<?=IMG.$category_item['img']?>" alt=Product"" class="feature"></a>
                        <h3><a href="product/index/<?=$category_item['book_id']?>"><?=$category_item['book_title']?></a></h3>
                        <p><span><?=substr($category_item['full_text'], 0, 200)."..."?></span></p>
                        <p>
                            <a href="product/index/<?=$category_item['book_id']?>" class="cart-btn">
                                <span class="price">$<?=$category_item['price']?></span><img src="<?=IMG?>white-cart.gif" alt="View Details">
                                {{PRODUCT_BUTTON_MAIN}}
                                </a>
                        </p>
        </div><!--end product1-->
        <?php endforeach?>
    <?php else: ?>
    <p>{{ALL_BOOK_SOLID}}</p>
    <?php endif; ?>
    </div>
</section>
<hr />
