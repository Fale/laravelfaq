<?php namespace App\Controllers;

use View;

use App\Models\Tag;

class TagController extends BaseController {

    protected $layout = 'layout';

    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function showIndex()
    {
        $this->layout->sidebar = View::make('sidebar');
        $this->layout->content = View::make('tags.index');
    }

    public function showTag($tag)
    {
        $t = $this->tag->where('name', $tag)->first();
        if (!$t)
            return 'error,404';
        $this->layout->title = ucfirst($t->name);
        $this->layout->sidebar = View::make('sidebar');
        $this->layout->content = View::make('tags.show', array('tag' => $t));
    }

}
