<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\ClassModel;

class ClassTest extends TestCase
{
    /** @test */
    public function check_if_class_columns_is_correct(): void
    {
        $classModel= new ClassModel;

        $expected = [
            'id_lesson',
            'id_student'
        ];

        $arrayCompared = array_diff($expected, $classModel->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
