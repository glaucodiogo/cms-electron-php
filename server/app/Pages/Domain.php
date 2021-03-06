<?php

namespace App\Pages;

use App\ADR\Domain as BaseDomain;

class Domain extends BaseDomain
{
    public function siteData($slug)
    {
        $page = $this->model->where('slug', $slug)->first();
        $menus = $this->model->get();

        return compact('page', 'menus');
    }

    protected function setRules()
    {
        $this->filter->validate('title')->is('string');
        $this->filter->validate('title')->isNot('int');
        $this->filter->validate('title')->is('strlenMin', 3);

        $this->filter->validate('body')->isNotBlank();
        $this->filter->validate('body')->is('strlenMin', 10);
    }

    protected function setModel()
    {
        $this->model = new Model;
    }
}
