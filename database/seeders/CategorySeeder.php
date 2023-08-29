<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     
     */
    public function run(): void
    {

        // Category::factory()->hasAttached(Category::factory()
        // ->count(3),[],'subcategories')
        // ->count(20)->create();

        $categoryRecords=[
                ['id'=>1,'parent_id'=>0,'category_name'=>'Clothing',
                'category_discount'=>0,'description'=>'Clothing section','url'=>'clothing','status'=>1],

                ['id'=>2,'parent_id'=>0,'category_name'=>'Electronics',
                'category_discount'=>0,'description'=>'Electronics section','url'=>'electronics','status'=>1],

                ['id'=>3,'parent_id'=>0,'category_name'=>'Appliances',
                'category_discount'=>0,'description'=>'Appliances section','url'=>'appliances','status'=>1],

                ['id'=>4,'parent_id'=>1,'category_name'=>'Men',
                'category_discount'=>0,'description'=>'Men section','url'=>'men','status'=>1],

                ['id'=>5,'parent_id'=>1,'category_name'=>'Women',
                'category_discount'=>0,'description'=>'Women section','url'=>'women','status'=>1],

                ['id'=>6,'parent_id'=>1,'category_name'=>'Kids',
                'category_discount'=>0,'description'=>'Kids section','url'=>'kids','status'=>1],
        ];
        Category::insert($categoryRecords);
}
    }
