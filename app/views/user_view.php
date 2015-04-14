<section id="main-content" class="clearfix">
    <aside id="my-account-menu">
        <h3>ACCOUNT</h3>
        <ul>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Order History</a></li>
            <li><a href="#">Sign Out</a></li>
        </ul>
    </aside>
    <!-- end my-account-menu -->
    <div id="order-details">
        <h1>Order Details</h1>

        <h2>Order #323232</h2>

        <p>Date: 03/24/2013</p>

        <h2>Buyer Information</h2>

        <p>
            Name: John Doe<br/>
            Phone: 555-555-5555<br/>
            Email: john@doe.com
        </p>

        <h2>Products</h2>
        <table border="1">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php if ( $userinfo ): ?>
                <?php foreach ( $userinfo as $user ): ?>
                    <tr>

                        <td>1</td>
                        <td><a href="/product/index/<?= $user[ 'book_id' ] ?>"><?= $user[ 'book_title' ] ?></a></td>
                        <td>$<?= $user[ 'price' ] ?></td>
                        <td><?= $user[ 'quantity' ] ?></td>
                        <td><?= $user[ 'price' ] * $user[ 'quantity' ] ?></td>
                    </tr>

                <?php endforeach ?>
            <?php else: ?>
                <p>All books are sold</p>
            <?php endif; ?>

            <tr class="total">
                <td colspan="5">
                    Subtotal: $1200<br/>
                    <span>TOTAL: $1200</span>
                </td>
            </tr>
        </table>

        <a href="#" class="tertiary-btn">BACK TO ORDER HISTORY</a>
    </div>
    <!-- end order-details -->
</section><!-- end main-content -->
