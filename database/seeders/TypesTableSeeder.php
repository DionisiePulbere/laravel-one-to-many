<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['HTML', 'CSS', 'JS', 'BLADE', 'PHP', 'VUE'];

        foreach ($types as $typeName) {
            $newType = new Type();
            $newType->name = $typeName;
            $newType->slug = Str::slug($newType->name, '-');
            $newType->save();
        }
    }
}
