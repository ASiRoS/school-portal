<?php

use App\Entities\ClassEntity;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alphabet = ['а', 'б', 'в', 'г', 'д'];

        for($i = 0; $i <= 11; $i++) {
            for($j = 0; $j < 4; $j++) {
                $class = new ClassEntity();
                $class->letter = $alphabet[$j];
                $class->grade = $i + 1;
                $class->save();
            }
        }
    }
}
