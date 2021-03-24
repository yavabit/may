<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Различные Категории товаров">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/catalog.css">
    <title>Каталог</title>
</head>
<body>
    
    <?php include('header.php');?>
    
    <section class="catalog">
        <div class="container">
            <div class="categories">
                <h4>Категории</h4>
                <ul>
                    <?php for($i = 0; $i < count($categories) - 1; $i++): ?>
                        
                        <li>
                            <a href="<?= $categories[$i]['url'] ?>">                                
                                <?=$categories[$i]['title']?>
                            </a>
                        </li>   
                    <?php endfor; ?>          
                </ul>
            </div>

            <div class="categories-items">
                <div class="section-title">  
                    <div class="line"></div>                  
                    <h2>Каталог</h2>
                </div>    
                <?php for($i = 0; $i < count($categories)-1; $i++): ?>
                <div class="category-item">
                    <div class="category-img">
                        <a href="<?= $categories[$i]['url'] ?>"><img src="img/catalog-items/item_example.jpeg" alt=""></a>
                    </div>
                    <div class="description">
                        <a href="<?= $categories[$i]['url'] ?>"><h3><?=$categories[$i]['title']?></h3></a>
                    </div>                    
                </div>
                <?php endfor; ?>
            </div>
            
            
        </div>
    </section>

    <?php include('components/footer.php'); ?>

</body>
</html>