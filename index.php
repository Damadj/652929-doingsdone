<?php

$categories = ['Все', 'Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$tasks = [
  [
    'title' => 'Собеседование в IT компании',
    'end_date' => '01.06.2018',
    'categories' => 'Работа',
    'completed' => False
  ],
  [
    'title' => 'Выполнить тестовое задание',
    'end_date' => '25.05.2018',
    'categories' => 'Работа',
    'completed' => False
  ],
  [
    'title' => 'Сделать задание первого раздела',
    'end_date' => '21.04.2018',
    'categories' => 'Учеба',
    'completed' => True
  ],
  [
    'title' => 'Встреча с другом',
    'end_date' => '22.04.2018',
    'categories' => 'Входящие',
    'completed' => False
  ],
  [
    'title' => 'Купить корм для кота',
    'end_date' => False,
    'categories' => 'Домашние дела',
    'completed' => False
  ],
  [
    'title' => 'Заказать пиццу',
    'end_date' => False,
    'categories' => 'Домашние дела',
    'completed' => False
  ]

];




require_once ('functions.php');


$main_content = include_template('templates/index.php', ['tasks' => $tasks]);
$layout_content = include_template('templates/layout.php', ['categories' => $categories,
    'title' => 'Дела в порядке', 'content' => $main_content, 'tasks' => $tasks]);

print($layout_content);
?>
