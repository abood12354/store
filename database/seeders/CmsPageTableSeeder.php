<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CmsPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cmsPagesRecords=[
            ['id'=>1,'title'=>'About Us','description'=>'welecome to our site',
            'url'=>'about-us','meta_title'=>'About Us','meta_description'=>'Content comming soon',
            'meta_keywords'=>'About us','status'=>1],

            ['id'=>2,'title'=>'Terms & Conditions','description'=>'welecome to our site',
            'url'=>'terms-conditions','meta_title'=>'Terms & Condition','meta_description'=>'Content comming soon',
            'meta_keywords'=>'terms','status'=>1],

            ['id'=>3,'title'=>'Privacy Policy','description'=>'welecome to our site',
            'url'=>'privacy-policy','meta_title'=>'Privacy Policy','meta_description'=>'Content comming soon',
            'meta_keywords'=>'Privacy Policy','status'=>1]
            
        ];
        CmsPage::insert($cmsPagesRecords);
    }
}
