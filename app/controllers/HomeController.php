<?php namespace App\Controllers;

use Markdown;
use View;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Tag;

class HomeController extends BaseController {

    protected $layout = 'layout';

    protected $category;

    protected $faq;

    protected $tag;

    public function __construct(Category $category, Faq $faq, Tag $tag)
    {
        $this->category = $category;
        $this->faq = $faq;
        $this->tag = $tag;
    }

    public function showIndex()
    {
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
        $out ="<h3>Categories</h3>";
        $out.= "<ul>";
        foreach($this->category->all() as $c)
            $out .= "<li><a href=\"/" . $c->path . "\">" . ucfirst($c->name) . "</a> (" . $c->faqs_number .")</li>";
        $out.="</ul>";
        $out.="<h3>Tags</h3>";
        $out.="<ul>";
        foreach($this->tag->all() as $t)
            $out .= "<li>" . ucfirst($t->name) . " (" . $t->faqs_number .")</li>";
        $out.="</ul>";
        return $out;
    }

}
