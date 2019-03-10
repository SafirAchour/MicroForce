<?php
namespace MicroForce\Controller;

use MicroForce\Engine\EngineSingleton;
use MicroForce\Model\Student;

class HomepageController
{
    public function homepage()
    {
        // 
        $students = Student::findAll();
        return EngineSingleton::getEngine()->render(
            'homepage.html.php',
            [
                //'theTemplateVariableName' => $students
                'students' => $students
            ]
            
        );
    }
}