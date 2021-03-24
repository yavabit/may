<?php
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    $_SESSION['cart']['id'] = array();
}
?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(72762994, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/72762994" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<header style = "background-image: url(../img/banner<?php if($_SERVER['REQUEST_URI'] != '/index.php'):?>-width<?php endif; ?>.jpg)">
        <div class="container">            
            <div class="header-menu">
                <?php if($_SERVER['REQUEST_URI'] != '/index.php'):?>
                <div class="logo"><a href="index.php"><img src="img/logo.png" alt=""></a></div>
                <?php endif; ?>
                <?php if($_SERVER['REQUEST_URI'] == '/index.php'):?>
                <div class="logo-fx"><a href="index.php"></a></div>
                <?php endif; ?>
                <ul>
                <?php $url = $_SERVER['REQUEST_URI']; ?>
                    <li><a href="#"class="find" return="false">Поиск</a>
                    <form class="to-find" action="search.php" method="get">
                        <input type="search" name="search" tabindex="1">
                        <button type="submit"></button>
                    </form>
                    </li>                    
                    <li><a href="catalog.php" class="catalog">Каталог</a></li>                 
                    <li><a href="contacts.php" class="contacts">Контакты</a></li>
                    <li><a href="cart.php" class="cart">    
                        
                            <span class="cart-count" id="cartCountItems" style="display:<?=count($_SESSION['cart']['id'])>0 ? "flex":"none"?>"><?=count($_SESSION['cart']['id'])>0 ? count($_SESSION['cart']['id']):"";?></span>  
                                                          
                        Корзина</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mobile-menu">
            <button class="mobile-menu-button"></button>            
            <div class="mob-cart">
                <a href="cart.php"><img src="img/cart.png" alt="">
                <span class="cart-count" id="cartCountItemsmob" style="display:<?=count($_SESSION['cart']['id'])>0 ? "flex":"none"?>"><?=count($_SESSION['cart']['id'])>0 ? count($_SESSION['cart']['id']):"";?></span>
                </a>
            </div>
            <div class="mob-menu">
                <ul>   
                    <li><a href="index.php" class="logo-menu"><img src="img/logo.png" alt=""></a></li>                             
                    <li><a href="catalog.php" class="catalog">Каталог</a></li>                 
                    <li><a href="contacts.php" class="contacts">Контакты</a></li>
                    <li><a href="cart.php" class="cart">Корзина</a></li>
                    <li><a href="info.php"class="find">Оплата и доставка</a></li>
                </ul>
                <button class="close-but"><img src="img/close_menu.png" alt=""></button>
            </div>
        </div>    
        <script src="JS/active_page.js"></script>    
</header>