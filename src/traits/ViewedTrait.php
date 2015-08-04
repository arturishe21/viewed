<?php namespace Vis\Viewed;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

trait ViewedTrait
{
    public function setViewed()
    {
        $nameClass = strtolower(get_class($this));
        $idPage = $this->id;
        $nameCookie = $nameClass."_viewed";
        $cookies = unserialize(Cookie::get($nameCookie));

        if (is_array($cookies)) {
            array_unshift($cookies, $idPage);
            array_slice($cookies, 0, Config::get("viewed.config.limit_count"));
        } else {
            $cookies[] = $idPage;
        }

        $cookies = array_unique($cookies);
        Cookie::queue($nameCookie, serialize($cookies), Config::get("viewed.config.time_cookie"));
    }

    public function getViewed()
    {
        $nameClass = strtolower(get_class($this));
        $nameCookie = $nameClass."_viewed";
        $cookies = unserialize(Cookie::get($nameCookie));

        return $cookies;
    }
}
