<? $logo = '<div id="logo">
                        <a href="#"><span id="logo-accent">B</span>ook <span id="logo-accent">M</span>agazine</a>
                    </div>';?>
            <footer>                
                <hr />
                <section class="clearfix">
                    <div id="copyright">
                        <?
                        $logo = new AdminSQL();
                        $logo->logo();
                        ?>
                        <!--end logo-->
                        <p id="store-desc">This is a short description of the store.</p>
                        <p id="store-copy">&copy; 2014 Book Magazine. Designed by Me.</p>
                    </div><!--end copyright-->
                    <div id="connect">
                        <h4>CONNECT WHITH US</h4>
                        <ul>
                            <li class="twitter">
                                <a href="#">Twitter</a>
                            </li>
                            <li class="fb">
                                <a href="#">Facebook</a>
                            </li>
                        </ul>
                    </div><!--end connect-->
                    <div id="payments">
                      <h4>SUPPORTED PAYMENT METHODS</h4>
                      <img src="<?=ADMIN_TEMPLATE?>img/payment-methods.gif" alt="Supported Payment Methods">
                    </div><!--end payments-->
                </section>
            </footer>
        </div><!--end wrapper-->
    </body>
</html>