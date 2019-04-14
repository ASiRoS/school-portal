<?php

use App\Entities\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            'Математика' => range(1, 6),
            'Русский' => range(1, 11),
            'Химия' => range(8, 11),
            'Физкультура' => range(1, 11),
            'Кыргызский' => range(1, 11),
            'Труд' => range(1, 4),
            'Чистописание' => [1],
            'Природоведение' => range(1,5 ),
            'Начальная военная подготовка' => [11],
            'Астрономия' => [11],
            'Экология' => [10, 11],
            'Философия' => [10, 11],
            'Правоведение' => [10, 11],
            'Основы экономики' => [10, 11],
            'Естествознание' => [10, 11],
            'Физика' => range(7, 11),
            'Алгебра' => range(7, 11),
            'Геометрия' => range(7, 11),
            'Черчение' => [7, 8],
            'Обществознание' => range(6, 11),
            'Информатика' => range(6, 11),
            'Биология' => range(6, 1),
            'География' => range(6, 11),
            'Литература' => range(5, 11),
            'История' => range(5, 11),
            'Иностранный язык' => range(4, 11),
            'ИЗО' => range(1, 11),
            'Музыка' => range(1, 6),
        ];

        foreach($subjects as $subjectName => $classes) {
            $subject = new Subject();
            $subject->title = $subjectName;
            $subject->class_grades = $classes;
            $subject->save();
        }
    }
}
