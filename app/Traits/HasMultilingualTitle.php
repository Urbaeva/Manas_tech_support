<?php

namespace App\Traits;

trait HasMultilingualTitle
{
    public function getTitle()
    {
        $lang = app()->getLocale();

        if ($lang == 'tr') {
            return $this->title_tr;
        }

        return $this->title;
    }
}
