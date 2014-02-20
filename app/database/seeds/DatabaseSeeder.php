<?php

use App\Models\Category;
use App\Models\Faq;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('App\Database\Seeds\CategoriesTableSeeder');
		$this->call('App\Database\Seeds\FaqsTableSeeder');
		$this->call('App\Database\Seeds\TagsTableSeeder');
        foreach (Category::all() as $category) {
            $category->faqs_number = Faq::where('category_id', $category->id)->count();
            $category->save();
        }
	}

}
