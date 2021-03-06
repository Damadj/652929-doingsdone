<h2 class="content__main-heading">Список задач</h2>

<form class="search-form" action="index.html" method="post">
    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">
    <input class="search-form__submit" type="submit" name="" value="Искать">
</form>
<div class="tasks-controls">
    <nav class="tasks-switch">
        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
        <a href="/" class="tasks-switch__item">Повестка дня</a>
        <a href="/" class="tasks-switch__item">Завтра</a>
        <a href="/" class="tasks-switch__item">Просроченные</a>
    </nav>
    <label class="checkbox">
        <input class="checkbox__input visually-hidden show_completed" type="checkbox" <? if ($show_complete_tasks == 1): ?> checked <? endif; ?> >
        <span class="checkbox__text">Показывать выполненные</span>
    </label>
</div>
<table class="tasks">
    <? foreach ($tasks as $val): ?>
        <tr class="tasks__item task <? if ($val['completion_date']): ?>task--completed<? endif; ?> <?=time_alert($val['time_limit'], $val['completion_date'])  ?>">
            <td class="task__select">
                <label class="checkbox task__checkbox">
                    <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                    <span class="checkbox__text"><?=htmlspecialchars($val['task_name'])?></span>
                </label>
            </td>
            <td class="task__file">
                <?=htmlspecialchars($val['time_limit'])?>
            </td>
            <td class="task__date">
                <?=htmlspecialchars($val['project'])?>
            </td>
        </tr>
    <? endforeach; ?>
</table>