<?php

class Navigation
{
    public function isActiveRoute($route, $depth, $output = 'active')
    {
        $routeNameArray = explode('_', getName());
       
        if (isset($routeNameArray[$depth]) && $routeNameArray[$depth] === $route) {
            return $output;
        }
    }

    function getName()
    {
        return Route::currentRouteName();
    }
}
