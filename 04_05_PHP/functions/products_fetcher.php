<?php

$db = new MYSQLHandler();
$db->connect();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * RECORDS_PER_PAGE;

$search = $_GET['search'] ?? '';
$column = $_GET['column'] ?? 'product_name';

if (!empty($search)) {
    $totalResult = $db->get_total_count($column, $search);
    $products = $db->search_by_column($column, $search, $start);
} else {
    $totalResult = $db->get_total_count();
    $products = $db->get_data(['id', 'product_name', 'Photo', 'list_price', 'Rating', 'category'], $start);
}

$totalPages = ceil($totalResult / RECORDS_PER_PAGE);
$db->disconnect();
