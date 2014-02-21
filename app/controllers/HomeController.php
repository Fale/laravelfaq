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
        $this->layout->title = "Laravel FAQ";
        $this->layout->sidebar = View::make('sidebar');
        $this->layout->content = View::make('index');
    }

    public function showCategory($category)
    {
        $c = $this->category->where('name', $category)->first();
        if (!$c)
            return 'error,404';
        $this->layout->title = ucfirst($c->name);
        $this->layout->sidebar = View::make('sidebar');
        $this->layout->content = View::make('category', array('category' => $c));
    }

    public function showFaq($category, $faq)
    {
        $f = $this->faq->where('path', $category . '/' . $faq)->first();
        if (!$f)
            return 'error,404';
        $this->layout->title = $f->question; 
        $this->layout->sidebar = View::make('sidebar');
        $this->layout->content = View::Make('faq', array('content' => Markdown::transformExtra($f->answer)));
    }

}
