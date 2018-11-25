<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        cache()->flush();

        $categories = collect([
            'Education',
            'Environment',
            'Sports',
            'Entrepreneurship',
         ])->map(function (String $category) {
             return ['name'=>$category];
         });
        try {
            DB::table('categories')->insert($categories->toArray());
        } catch (\Exception $e) {
        }
    }
}
