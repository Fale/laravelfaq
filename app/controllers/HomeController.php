<?php

namespace App\Controllers;

use Markdown;
use View;

use App\Models\Category;
use App\Models\Faq;

class HomeController extends BaseController {

    protected $layout = 'layout';

    protected $category;

    protected $faq;

    public function __construct(Category $category, Faq $faq)
    {
        $this->category = $category;
        $this->faq = $faq;
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
        $f = $this->faq->where('path', $category . '/' . $faq)->first();
        if (!$f)
            return 'error,404';
        $this->layout->sidebar = $this->showSidebar();
        $this->layout->title = $f->question; 
        $this->layout->content = View::Make('faq', array('content' => Markdown::transformExtra($f->answer)));
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
