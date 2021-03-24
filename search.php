<?php
    session_start();
    require('components/db_config.php');
    require('components/catalog_config.php');

    $offset = 0;
    $limit = 12;
    $page = intval($_GET['page']) ?: 1;
    $offset = ($page - 1) * $limit;
    $search_query = $_GET['search'];
    $search_query = htmlspecialchars($search_query);
    
    $sort_type = isset($_GET['sort_by_type']) ? $_GET['sort_by_type'] : 'Все';
    $sort_price = isset($_GET['sort_by_price']) ? $_GET['sort_by_price'] : 'none';

    $type_title = $search_query;   
         
   
    $sql = "SELECT * FROM `catalog` WHERE `title` LIKE '%$search_query%'";        
    

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

    

    require('components/search_info.php');
?>