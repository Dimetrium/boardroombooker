<section id="main-content">
    <h2>Edit Books</h2>
    <hr>
    <?php if($booksmain): ?>
        <?php foreach($booksmain as $books):?>
            <div class="product">
                <a href="admin/edit/<?=$books['book_id']?>"><img src="<?=IMG.$books['img']?>" alt=Product"" class="feature"></a>
                <h3><a href="admin/edit/<?=$books['book_id']?>"><?=$books['book_title']?></a></h3>
                <p><span><?=substr($books['full_text'], 0, 200)."..."?></span></p>
                <p>
                    <a href="admin/edit/<?=$books['book_id']?>" class="cart-btn">
                        <span class="price">$<?=$books['price']?></span><img src="<?=IMG?>white-cart.gif" alt="View Details">
                        EDIT
                    </a>
                <a href="admin/del/<?=$books['book_id']?>" id="delBook" class="cart-btn">DELET</a>
                </p>
            </div><!--end productS-->
        <?php endforeach?>
    <?php else: ?>
        <h3>All books are sold</h3>
    <?php endif; ?>
    </div>
</section>
<hr>
