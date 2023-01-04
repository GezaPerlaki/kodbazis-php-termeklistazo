<?php

$method = $_SERVER['REQUEST_METHOD'];
$parsed = parse_url($_SERVER['REQUEST_URI']);
$path = $parsed['path'];

$routes = [
    "GET" => [
        "/" => "homeHandler",
        "/termekek" => "productListHandler"
    ],
    "POST" => [
        "/termekek" => "createProductHandler"
    ]
];

$handlerFunction = $routes[$method][$path] ?? "notFoundHandler";

$safeHandlerFunction = function_exists($handlerFunction) ? $handlerFunction : "notFoundHandler";

$safeHandlerFunction();


function homeHandler()
{
    require './views/home.php';
}

function productListHandler()
{
    $contents = file_get_contents('./products.json');
    $products = json_decode($contents, true);
    $isSuccess = isset($_GET["siker"]);

    require './views/product-list.php';
}

function createProductHandler()
{
    $newProduct = [
        "name" => $_POST["name"],
        "price" => (int)$_POST["price"],
    ];

    $content = file_get_contents("./products.json");
    $products = json_decode($content, true);

    array_push($products, $newProduct);

    $json = json_encode($products);
    file_put_contents('./products.json', $json);

    header("Location: /termekek?siker=1");
}

function notFoundHandler()
{
    echo "Oldal nem található";
}
