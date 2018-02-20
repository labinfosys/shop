<?php
namespace common\helpers;

use core\Shop;

class Url
{
    /**
     * @example Url::to('product/view', ['id' => 34])
     */
    public static function to($route, $params = [])
    {
        $prettyUrl = Shop::$app->config['prettyUrl'];
        if (!$prettyUrl) {
            $params = count($params) == 0 ? '' : '&' . http_build_query($params);
            return '?r=' . $route . $params;
        }
        return '/' . $route  . '/' . implode('/', $params);
    }
}