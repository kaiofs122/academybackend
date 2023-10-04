<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Lesson;

class LessonTest extends TestCase
{
    /** @test */
    public function check_if_lesson_columns_is_correct(): void
    {
        $lesson = new Lesson;

        $expected = [
            'id_instructor',
            'lesson_description',
            'lesson_max_students'
        ];

        $arrayCompared = array_diff($expected, $lesson->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}
