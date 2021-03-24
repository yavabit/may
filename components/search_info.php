<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Поиск по каталогу">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/catalog.css">
    <link rel="stylesheet" href="../CSS/category.css">
    <title><?=$type_title?></title>
</head>
<body>
    
    <?php include('header.php');?>
    
    <section class="catalog">
        <div class="container">
            <div class="categories">
                <h4>Категории</h4>
                <ul>
                    <?php for($i = 0; $i < count($categories); $i++): ?>
                        <li class="<?= $i == count($categories)-1 ? 'to-back' : ''?>">
                            <a href="<?= $categories[$i]['url'] ?>" class="<?= $categories[$i]['url'] === 'category.php?cat_type='.$type ? 'current' : ''?>">
                                <?php if($categories[$i]['title'] == 'Назад'): ?>
                                    <span></span>
                                <?php endif; ?>
                                <?=$categories[$i]['title']?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
            
            <div class="catalog-items">
                <div class="section-title">  
                    <div class="line"></div>                  
                    <h2>Поиск: <?= $type_title ?></h2>
                </div>              
                <div class="sort">                    
                    <form action="search.php" method="GET">
                    <div class="flx-wrap1">
                        <label for="sort_by_price">Цена:</label>
                        <select name="sort_by_price" id="sort_by_price">
                            
                            <option value="none">Нет</option>
                            <option value="ASC" <?= $_GET['sort_by_price'] == 'ASC' ? 'selected' : ''?>>От минимальной к максимальной</option>
                            <option value="DESC" <?= $_GET['sort_by_price'] == 'DESC' ? 'selected' : ''?>>От макисмальной к минимальной</option>                            
                        </select>
                        </div>
                        <input type="hidden" name="search" value="<?=$search_query?>">
                        <div class="flx-wrap2">                                              
                        <label for="sort_by_type">Цветы:</label>
                        <select name="sort_by_type" id="sort_by_type">
                            <option value="Все">Все</option>
                            <option value="Тюльпан" <?= $_GET['sort_by_type'] == 'Тюльпан' ? 'selected' : ''?>>Тюльпан</option>
                            <option value="Роза" <?= $_GET['sort_by_type'] == 'Роза' ? 'selected' : ''?>>Роза</option>
                        </select>      
                    </div>
                    <div class="flx-but">                     
                        <input type="submit" value="Показать"> 
                    </div>                    
                    </form>
                </div>   
                <?php foreach($items_on_page as $item): ?>
                <div class="catalog-item">                    
                    <div class="catalog-item-img">                        
                        <a href="item.php?id=<?=$item['id']?>">
                            <?php if($item['is_popular'] == 1): ?>
                                <span><img src="img/pop.png" alt=""></span>
                            <?php endif; ?>
                            <?php if($item['is_new'] == 1): ?>
                                <span><img src="img/new.png" alt=""></span>
                            <?php endif; ?>
                            <img src="<?=$item['imgUrl'];?>" alt="">
                        </a>
                    </div>
                    <div class="description">
                        <div class="title">
                            <h4><a href="item.php?id=<?=$item['id']?>"><?= $item['title'] ?></a></h4>
                        </div>
                        <div class="price">
                            <p><?= $item['price'];?> ₽</p>
                        </div>
                        <div class="to-cart-buts">
                            <button id="addCart_<?=$item['id'];?>" class="to-cart" onclick="addToCart(<?=$item['id'];?>)" title="Добавить <?=$item['title']?> в корзину">
                                    В корзину
                                </button>
                            <button class="quick-to-cart">Быстрый заказ</button>
                        </div>
                    </div>
                </div>                       
                <?php endforeach; ?>
                <div class="page-buttons">
                <?php for($i = 1; $i <= $pages; $i = $i + 1): ?>
                    <li>                    
                    <a href="search.php?search=<?=$search_query?>&page=<?= $i ?>&sort_by_type=<?=$sort_type?>&sort_by_price=<?=$sort_price?>" class="<?= $i === $page ? 'current' : ''?>"> <?= $i ?> </a>
                    </li>
                <?php endfor; ?>
                </div>                
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

</body>
</html>