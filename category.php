<?php
    session_start();
    require('components/db_config.php');
    require('components/catalog_config.php');

    $offset = 0;
    $limit = 12;
    $page = intval($_GET['page']) ?: 1;
    $offset = ($page - 1) * $limit;
    $type = $_GET['cat_type'] ?: 'roses';    
    $sort_type = isset($_GET['sort_by_type']) ? $_GET['sort_by_type'] : 'Все';
    $sort_price = isset($_GET['sort_by_price']) ? $_GET['sort_by_price'] : 'none';


    $sql = "SELECT * FROM `catalog` LEFT JOIN `sales` USING(id) WHERE category='$type'";
    if(isset($_GET['sort_by_type']) && $_GET['sort_by_type'] != 'Все') {
        $sort_type = $_GET['sort_by_type'];
        $sql = $sql." and type='{$sort_type}'";
    } 
    if(isset($_GET['sort_by_price']) && $_GET['sort_by_price'] != 'none') {
        $sort_price = $_GET['sort_by_price'];
        $sql = $sql." ORDER BY `catalog`.`price` {$sort_price}";
        
    }
    $result = mysqli_query($link, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $pages = ceil(count($rows) / $limit); 
    $items_on_page = array_slice($rows, $offset, $limit, true);
    


    if ($type === 'roses') {     
        $type_title = $categories[0]['title'];
    }
    if ($type === 'monobouquets') {        
        $type_title = $categories[1]['title'];
    }
    if ($type === 'pre_bouquets') {       
        $type_title = $categories[2]['title'];
    }
    if ($type === 'boxes') {        
        $type_title = $categories[3]['title'];
    }
    if ($type === 'toys_china') {      
        $type_title = $categories[4]['title'];
    }
    if ($type === 'toys_handcraft') {        
        $type_title = $categories[5]['title'];
    }
    if ($type === 'ballons') {        
        $type_title = $categories[6]['title'];
    }     
    
    require('components/category_info.php');
?>