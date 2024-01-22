<?php

function smarty_function_plugin_url($params, $smarty){
    $name = isset($params['name']) ? $params['name'] : '';
    return SITE_URL . $name;
}
