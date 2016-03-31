<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array(
            array(
                'name'=>'PHP',
            ),
            array(
                'name'=>'HTML',
            ),
            array(
                'name'=>'JavaScript',
            ),
            array(
                'name'=>'CSS',
            ),
            array(
                'name'=>'Java',
            )
        );
        foreach ($tags as $t) {
            $tag = new Tag();
            $tag->name = $t['name'];
            $tag->save();
        }
    }
}
