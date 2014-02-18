<?php

namespace App\Database\Seeds;

use Seeder;
use DB;
use File;

use App\Models\Category;

class FaqsTableSeeder extends Seeder {

    public function run()
    {
        $faqs = Array();

        foreach (File::allFiles(base_path() . '/faq') as $element)
        {
            $filename = explode('.', $element->getFileName());
            $pathname = explode('.', $element->getRelativePathname());
            $faqs[] = Array(
                'order' => 0,
                'name' => $filename[0],
                'path' => $pathname[0],
                'question' => $this->getQuestion($pathname[0]),
                'category_id' => Category::where('path', $element->getRelativePath())->pluck('id'),
            );
        }

        if (count($faqs))
            DB::table('faqs')->insert($faqs);
    }

    public function getQuestion($path)
    {
        preg_match( "/^#([[:print:]]*)\n(.*)/is", File::get(base_path() . '/faq/' . $path . ".md"), $match);
        return $match[1];
    }
}
