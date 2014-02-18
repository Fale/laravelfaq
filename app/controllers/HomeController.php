<?php

namespace App\Controllers;

use File;
use Markdown;
use View;

use App\Models\Category;

class HomeController extends BaseController {

    protected $layout = 'layout';

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function showIndex()
    {
        $this->layout->title = "Home page";
        $this->layout->sidebar = $this->showSidebar();
        $this->layout->content = View::make('index');
    }

    public function showCategory($category)
    {
        $c = $this->category->where('name', $category)->first();
        if (!$c)
            return 'error,404';
        $this->layout->title = ucfirst($c->name);
        $this->layout->sidebar = $this->showSidebar();
        $this->layout->content = View::make('category', array('category' => $c));
    }

    public function showFaq($category, $faq)
    {
        $file = base_path() . '/faq/' . $category . '/' . $faq . '.md';
        if (!File::exists($file))
            return 'error,404';
        $this->layout->title = "Title";
        $this->layout->sidebar = $this->showSidebar();
        $this->layout->content = View::Make('faq', array('content' => Markdown::transformExtra(File::get($file))));
    }

    public function showSidebar($category = NULL)
    {
        $out = "<ul>";
        foreach($this->category->all() as $c)
            $out .= "<li><a href=\"/" . $c->path . "\">" . ucfirst($c->name) . "</a></li>";
        $out.="<ul>";
        return $out;
    }

}
