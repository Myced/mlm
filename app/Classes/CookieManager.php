<?php
namespace App\Classes;

use Cookie;
use App\UserCookie;


class CookieManager
{
    protected $cookieValue;

    private $cookiePresent = false;

    private $expire = 2628000; // 5 years  almost forever; minutes

    function __construct()
    {
        $this->init();
    }

    private function init()
    {
        if(Cookie::has(UserCookie::NAME))
        {
            $this->cookiePresent = true;
        }
    }

    public function setCookie()
    {
        if ($this->cookiePresent) {
            return;
        }
        else {
            $this->createCookie();
        }
    }

    private function createCookie()
    {
        $cookieValue = $this->generateCookie();

        if(!$this->cookieExist($cookieValue))
        {
            $this->cookieValue = $cookieValue;
            $this->saveCookie();
            $this->storeCookie();
        }
        else {
            do {
                $cookieValue = $this->generateCookie();
            } while ($this->cookieExist($cookieValue));

            $this->cookieValue = $cookieValue;
            $this->saveCooke();
            $this->storeCookie();
        }

        return;
    }

    private function generateCookie($length = 32)
    {
        return str_random($length);
    }

    private function cookieExist($cookie)
    {
        $status = UserCookie::where('cookie', '=', $this->cookieValue)->first();

        if($status == null)
        {
            return false;
        }

        return true;
    }

    private function saveCookie()
    {
        Cookie::queue(UserCookie::NAME, $this->cookieValue, $this->expire);
    }

    private function storeCookie()
    {
        $cookie = new UserCookie();

        $cookie->cookie = $this->cookieValue;

        $cookie->save();
    }
}


?>
