<?php
  function isActiveRoute ($route, $depth, $output = 'active')
  {
    $routeNameArray = explode('_', Route::currentRouteName());
    if (isset($routeNameArray[$depth]) && $routeNameArray[$depth] === $route) {
      return $output;
    }
    return '';
  }
