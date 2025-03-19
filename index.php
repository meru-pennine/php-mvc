<?php
require_once 'config.php';
require_once 'routes.php'; // Load your routes

// Get the current path
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove the base directory if necessary
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$path = str_replace($scriptName, '', $requestUri);

// Use a function to match dynamic routes with parameters
$routeFound = false;

function matchRoute($uri, $routes) {
    foreach ($routes as $route => $action) {
        // Replace placeholders like {id} with regex for dynamic matching
        $pattern = preg_replace('/\{[a-zA-Z_]+\}/', '([0-9]+)', $route);
        $pattern = str_replace('/', '\/', $pattern); // Escape slashes for regex
        $pattern = '/^' . $pattern . '$/';

        if (preg_match($pattern, $uri, $matches)) {
            array_shift($matches); // Remove the full match
            return ['action' => $action, 'params' => $matches];
        }
    }

    return null; // No matching route found
}

// Match the route
$routeResult = matchRoute($path, $routes);

if ($routeResult) {
    $controllerName = $routeResult['action']['controller'];
    $method = $routeResult['action']['method'];
    $params = $routeResult['params'];

    require_once "controllers/{$controllerName}.php";
    $controller = new $controllerName();
    call_user_func_array([$controller, $method], $params);
    $routeFound = true;
}

// If no route matched, show 404
if (!$routeFound) {
    http_response_code(404);
    echo 'Page not found.';
}
