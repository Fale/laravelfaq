<?php

namespace App\Controllers;

use File;
use Markdown;
use View;

use App\Models\Category;

class HomeController extends BaseController {

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function showIndex()
    {
        return View::make('index');
    }

    public function showCategory($category)
    {
        $c = $this->category->where('name', $category)->first();
        if (!$c)
            return 'error,404';
        return View::make('category', array('category' => $c, 'faqs' => $c->faqs()));
    }

    public function showFaq($category, $faq)
    {
        $file = base_path() . '/faq/' . $category . '/' . $faq . '.md';
        if (!File::exists($file))
            return 'error,404';
        $content = Markdown::transformExtra(File::get($file));
        $sidebar =  $this->showSidebar();
        print_r($sidebar);
        return View::make('faq', array('content' => $content, 'sidebar' => $sidebar));
    }

    public function showSidebar($category = NULL)
    {
        $out = Array();
        foreach($this->category->all() as $category)
            $out[] = $category->path;
        return implode('<br />', $out);
    }

}
