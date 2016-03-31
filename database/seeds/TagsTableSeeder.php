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
            ),
            array(
                'name'=>'Python',
            ),
            array(
                'name'=>'Ruby on Rails',
            ),
            array(
                'name'=>'AngularJS',
            ),
            array(
                'name'=>'NodeJS',
            ),
            array(
                'name'=>'Meteor',
            )
        );
        foreach ($tags as $t) {
            $tag = new Tag();
            $tag->name = $t['name'];
            $tag->save();
        }
    }
}
