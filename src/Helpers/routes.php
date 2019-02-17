<?php

function isRoutePrefix($on, $class = 'active') {
    $prefix = 'admin/';
    $path = Request::path();
    if (substr($path, 0, strlen($prefix)) == $prefix) {
        $realPath = substr($path, strlen($prefix));
        return starts_with($realPath, $on) ? $class : '';
    }
    return '';
}

function isRoute($routeName = '', $class = 'active') {
    return Route::currentRouteName() === $routeName ? $class : '';
}
