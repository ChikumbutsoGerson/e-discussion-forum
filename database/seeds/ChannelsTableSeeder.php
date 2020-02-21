<?php

use App\Channel;
use Illuminate\Database\Seeder;


class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 6.8',
            'slug' => \Str::slug('Laravel 6.8')
        ]);
        Channel::create([
            'name' => 'Vue js 3',
            'slug' => \Str::slug('Vue js 3')
        ]);
        Channel::create([
            'name' => 'Angular 8',
            'slug' => \Str::slug('Angular 8')
        ]);
        Channel::create([
            'name' => 'Node js',
            'slug' => \Str::slug('Node js')
        ]);
    }
}
