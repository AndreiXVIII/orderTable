<?php
return [
    "name" => [
        "title" => "Имя",
        "name" => "name",
        "type_input" => "text",
		"placeholder" => "Обязательное поле, только буквы",
        "pegExpr" => "[A-Za-zА-Яа-яЁё]+"
    ],
    "last_name" => [
        "title" => "Фамилия",
        "name" => "last_name",
        "type_input" => "text",
		"placeholder" => "Обязательное поле, только буквы",
        "pegExpr" => "[A-Za-zА-Яа-яЁё]+"
    ],
    "phone" => [
        "title" => "Телефон",
        "name" => "phone",
        "type_input" => "tel",
		"placeholder" => "Обязательное поле, только цифры",
        "pegExpr" => "\+?\d{10,12}$"
    ],
    "email" => [
        "title" => "Электронная почта",
        "name" => "email",
        "type_input" => "text",
		"placeholder" => "Обязательное поле, валидация email",
        "pegExpr" => "([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})\""
    ],
    "city" => [
        "title" => "Город",
        "name" => "city",
        "type_input" => "text",
		"placeholder" => "Обязательное поле, только буквы",
        "pegExpr" => "[A-Za-zА-Яа-яЁё \s]+"
    ],
    "sum" => [
        "title" => "Сумма",
        "name" => "sum",
        "type_input" => "number\" step=\"any\"",
		"placeholder" => "Обязательное поле, только цифры",
        "pegExpr" => ""
    ],

];



