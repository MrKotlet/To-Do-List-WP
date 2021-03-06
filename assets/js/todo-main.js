//this function creates new task and displays it on the lista
function createNewTask(event) {
    const newTaskInput = document.querySelector('input.add-todo-task');
    const otherTaskInputs = document.querySelectorAll('.active-input');

    if (event.key === 'Enter' && newTaskInput.value !== '' && otherTaskInputs.length === 0) {
        const taskList = document.getElementById('task-list')
        const inputValue = sanitizeHTML(newTaskInput.value);

        manageTasksAjax(event, inputValue);


        let lastTaskKey = newTaskInput.dataset.count;
        lastTaskKey++;
        newTaskInput.dataset.count = lastTaskKey;


        const newTask = document.createElement('li');
        newTask.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center', 'm-0');
        newTask.innerHTML = ` <div>     
                            <input type="text" class="d-none" data-key="${lastTaskKey}">
                            <span>${inputValue}</span>
                        </div>
                        <div>
                        <button class="btn btn-outline-success mx-4 toggle-task-done">Done</button>
                            <i class="fas fa-pen mx-2 task-option"></i><i class="fas fa-trash task-option"></i>
                        </div>`;

        taskList.appendChild(newTask);
        newTaskInput.value = '';
        addListeners();
    }
}

//this function deletes task
function deleteTask(event) {
    const taskListItem = this.parentNode.parentNode;
    const keyValue = taskListItem.querySelector('input').dataset.key
    taskListItem.parentNode.removeChild(taskListItem);


    manageTasksAjax(event, '', keyValue, 'delete')
}

//this function displays input which allows to modify task
function openTaskEditor() {
    const taskInput = this.parentNode.parentNode.querySelector('input');
    const taskName = this.parentNode.parentNode.querySelector('span');


    taskName.classList.add('d-none');

    taskInput.classList.remove('d-none');
    taskInput.classList.add('active-input');
    taskInput.value = taskName.textContent;


    window.addEventListener('keydown', editTask.bind(this));


}

// this function edits task
function editTask(event) {
    const taskInput = this.parentNode.parentNode.querySelector('input');
    const taskName = this.parentNode.parentNode.querySelector('span');
    if (event.key === 'Enter' && taskInput.value !== '') {
        taskName.textContent = sanitizeHTML(taskInput.value);
        const keyValue = taskInput.dataset.key
        manageTasksAjax(event, taskInput.value, keyValue,)


        taskInput.value = '';
        taskInput.classList.add('d-none');
        taskInput.classList.remove('active-input');
        taskName.classList.remove('d-none');


    }

    window.removeEventListener('keydown', editTask);

}


// this functions changes appearance of a task depending on if it's done or not;

function toggleTaskStatus(listItem) {
    const doneList = document.getElementById('task-list-2');
    const notDoneList = document.getElementById('task-list');



    if (listItem.classList.contains('text-secondary')) {



        doneList.removeChild(listItem);
        notDoneList.appendChild(listItem);
    } else {
        notDoneList.removeChild(listItem);
        doneList.appendChild(listItem);

    }


    listItem.classList.toggle('text-secondary');

}


function toggleDoneStatus(event) {
    if (this.classList.contains('btn-outline-success')) {
        this.textContent = 'Not Done';
    } else {
        this.textContent = 'Done';
    }

    this.classList.toggle('btn-outline-success');
    this.classList.toggle('btn-outline-secondary');


    const keyValue = this.parentNode.parentNode.querySelector('input').dataset.key;
    manageTasksAjax(event, '', keyValue, 'change');
    toggleTaskStatus(this.parentNode.parentNode)
}


//This function is loaded when dthe site loads. It adds event listeners to all elements on todo list;
function addListeners() {
    const doneButtons = document.querySelectorAll('.toggle-task-done');
    doneButtons.forEach(button => {
        button.addEventListener('click', toggleDoneStatus)
    })

    const trashButtons = document.querySelectorAll('i.fa-trash');
    trashButtons.forEach(button => {
        button.addEventListener('click', deleteTask)
    })

    const penButtons = document.querySelectorAll('i.fa-pen');
    penButtons.forEach(button => {
        button.addEventListener('click', openTaskEditor)
    })


    window.addEventListener('keydown', createNewTask);
}

window.addEventListener('load', addListeners)

//sanitizer helper function

function sanitizeHTML (str) {
    return str.replace(/javascript:/gi, '').replace(/[^\w-_. ]/gi, function (c) {
        return `&#${c.charCodeAt(0)};`;
    });
}