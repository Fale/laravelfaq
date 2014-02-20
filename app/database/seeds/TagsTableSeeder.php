<?php namespace App\Database\Seeds;

use Seeder;
use DB;
use File;

use App\Models\Faq;
use App\Models\Tag;

class TagsTableSeeder extends Seeder {

    public function run()
    {
        $tags = Array();

        foreach (Faq::all() as $faq) {
            foreach ($this->getTags($faq->path) as $tag) {
                if (!Tag::where('name', $tag)->pluck(1))
                    $tagId = DB::table('tags')->insertGetId(Array('name' => $tag));
                else
                    $tagId = Tag::where('name', $tag)->pluck(1);
                $tags[] = Array('faq_id' => $faq->id, 'tag_id' => $tagId);
            }
        }

        if (count($tags))
            DB::table('faq_tag')->insert($tags);
    }

    public function getTags($path)
    {
        preg_match( "/({\"tags\": ?\[.*\]\})/is", File::get(base_path() . '/faq/' . $path . ".md"), $match);
        if (count($match)) {
            $json = json_decode($match[1]);
            return $json->tags;
        }
        else
            return Array();
    }
}
