<?php namespace Vis\Viewed;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

class Viewed
{
    public function setViewed($class)
    {
        $nameClass = strtolower(get_class($class));

        if (isset($class->id) && $class->id) {
            $idPage = $class->id;
            $nameCookie = md5($nameClass . "_viewed");
            $cookies = unserialize(Cookie::get($nameCookie));

            if (is_array($cookies)) {
                array_unshift($cookies, $idPage);
                array_slice($cookies, 0,
                    Config::get("viewed.config.limit_count"));
            } else {
                $cookies[] = $idPage;
            }

            $cookies = array_unique($cookies);
            Cookie::queue($nameCookie, serialize($cookies),
                Config::get("viewed::config.time_cookie"));
        }
    }

    public function getViewed($class)
    {
        $nameClass = strtolower(get_class($class));
        $nameCookie = md5($nameClass . "_viewed");
        $cookies = unserialize(Cookie::get($nameCookie));

        return $cookies;
    }
}
