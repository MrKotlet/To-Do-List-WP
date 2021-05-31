<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-md-11 mx-auto my-4">
            <div class="todolist not-done">
                <h1 class="text-center my-4">Todo List</h1>
                <?php   $tasks = get_option('todo_task_list');?>
                <input type="text" class="form-control add-todo-task" placeholder="Write Todo and hit enter" data-count="<?php echo array_key_last($tasks)?>">


                <hr>
                <ul id="task-list" class="list-group">
                    <?php
                    foreach ($tasks as $key => $task):
                        if (!$task['done']):
                            ?>

                            <li class="list-group-item d-flex justify-content-between align-items-center m-0">
                                <div>
                                    <i class="fas fa-check text-success mx-2 toggle-task-done" role="button"></i>
                                    <input type="text" class="d-none" data-key="<?php echo $key ?>">
                                    <span><?php echo esc_html($task['name']) ?></span>

                                </div>
                                <div>
                                    <i class="fas fa-pen mx-2 task-option"></i><i class="fas fa-trash task-option"></i>
                                </div>
                            </li>
                    <?php endif;endforeach;?>
                </ul>
                <br>
                <h3>Done Tasks</h3>
                <hr>

                    <ul id="task-list-2" class="list-group">
                        <?php
                        foreach ($tasks as $key => $task):
                            if (!$task['done']):
                                ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center m-0 ">
                                <div class="text-decoration-line-through text-secondary ">
                                    <i class="fas fa-times text-danger mx-2 toggle-task-done" role="button"></i>
                                    <input type="text" class="d-none" data-key="<?php echo $key ?>">
                                    <span><?php echo esc_html($task['name']) ?></span>

                                </div>
                                <div>
                                    <i class="fas fa-pen mx-2 task-option"></i><i class="fas fa-trash task-option"></i>
                                </div>
                            </li>

                        <?php endif;endforeach; ?>

                </ul>

            </div>
        </div>

    </div>
</div>