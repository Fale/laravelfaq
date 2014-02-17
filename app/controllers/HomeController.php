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
        return View::make('faq', array('content' => $content, 'sidebar' => $this->showSidebar()));
    }

    public function showSidebar($category = NULL)
    {
        $out = Array();
        foreach($this->category->all() as $category)
            $out[] = $category->path;
        var_dump($out);
        var_dump(implode('<br />', $out));
        return implode('<br />', $out);
    }

}
