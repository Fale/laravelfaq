<?php

namespace App\Controllers;

use File;
use Markdown;
use View;

use App\Models\Category;

class HomeController extends BaseController {

    public function showIndex()
    {
        return View::make('index');
    }

    public function showCategory($category)
    {
        $file = base_path() . '/faq/' . $category;
        if (!File::exists($file))
            return 'error,404';
        return View::make('category');
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
        foreach(Category::all() as $category)
            $out[] = $category->path;
        var_dump($out);
        var_dump(implode('<br />', $out));
        return implode('<br />', $out);
    }

}
