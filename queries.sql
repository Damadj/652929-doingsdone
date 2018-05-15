INSERT INTO categories (project, user_id)
    VALUE ('Все', NULL),('Входящие', 2),('Учеба', 2),('Работа', 2),('Домашние дела', 1),('Авто', 1);
INSERT INTO users (registration_date, email, user_name, password, contact)
    VALUE (NULL, 'user1@email.com', 'User1', 'PASS', 'user1_skype'),(NULL, 'user2@email.com', 'User2', 'PASS', 'user2_skype');
INSERT INTO tasks (creation_date, completion_date, task_name, file_link, time_limit, user_id, project_id)
    VALUE (NULL, NULL, 'Собеседование в IT компании', NULL, '2018-06-01', 2, 4),
          (NULL, NULL, 'Выполнить тестовое задание', NULL, '2018-05-16', 1, 4),
          (NULL, NULL, 'Сделать задание первого раздела', NULL, '2018-04-21', 2, 3),
          (NULL, NULL, 'Встреча с другом', NULL, '2018-04-22', 1, 2),
          (NULL, NULL, 'Купить корм для кота', NULL, NULL, 2, 5),
          (NULL, NULL, 'Заказать пиццу', NULL, NULL, 1, 5);

/* получить список из всех проектов для одного пользователя; */
SELECT c.id, project, user_name FROM categories c
JOIN users u
ON c.user_id = u.id
WHERE c.user_id = 1;

/* получить список из всех задач для одного проекта; */
SELECT task_name, project_id FROM tasks t
JOIN categories c
ON t.project_id = c.id
WHERE t.project_id = 4;

/* пометить задачу как выполненную; */
UPDATE tasks SET completion_date = '2018-05-15'
WHERE task_name = 'Встреча с другом';

/* получить все задачи для завтрашнего дня; */
SELECT task_name FROM tasks
WHERE time_limit = (CURDATE() + INTERVAL 1 DAY);

/* обновить название задачи по её идентификатору. */
UPDATE tasks SET task_name = 'Новая задача'
WHERE id = 3;