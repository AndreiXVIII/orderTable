<?php

    class Course 
    {
        public function getCourse($curr = 'USD')
        {
            $data = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=3');
            $courses = json_decode($data, true);
            $currentCourse = false;

            foreach ($courses as $course) {
                if ($course['ccy'] == $curr) {
                    $currentCourse = $course['buy'];
                    break;
                }
            }
            return $currentCourse;
        }
    }