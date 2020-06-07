<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function en()
    {
        $locale = 'en';

        $this->setLocale($locale);

        session()->flash('success', 'Language Changed to English');

        return back();
    }

    public function fr()
    {
        $locale = 'fr';

        $this->setLocale($locale);

        session()->flash('success', 'Votre Langue est maintenant francais');

        return back();
    }

    private function setLocale($value)
    {
        $cookie_name = 'locale';

        //we will set the locale to english
        $current = Cookie::get($cookie_name);

        if(!is_null($current) && !empty($current))
        {
            //set its value to the new value
            Cookie::queue($cookie_name, $value, 2628000);
        }
        else {
            Cookie::queue($cookie_name, $value, 2628000);
        }

    }
}
