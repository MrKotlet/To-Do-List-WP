//this function creates new task and displays it on the list
function createNewTask(event) {
    const newTaskInput = document.querySelector('input.add-todo-task');
    const otherTaskInputs = document.querySelectorAll('.active-input');

    if (event.key === 'Enter' && newTaskInput.value !== '' && otherTaskInputs.length === 0) {
        const taskList = document.getElementById('task-list')
        const inputValue = newTaskInput.value;

        const newTask = document.createElement('li');
        newTask.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center', 'm-0');
        newTask.innerHTML = ` <div>
                            <i class="fas fa-check text-success mx-2 toggle-task-done" role="button"></i>${inputValue}

                        </div>
                        <div>
                            <i class="fas fa-pen mx-2 task-option"></i><i class="fas fa-trash task-option"></i>
                        </div>`;

        taskList.appendChild(newTask);
        newTaskInput.value = '';
        addListeners();
    }
}

//this function deletes task
function deleteTask() {
    const taskListItem = this.parentNode.parentNode;
    taskListItem.parentNode.removeChild(taskListItem);
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
        taskName.textContent = taskInput.value;
        taskInput.value = '';
        taskInput.classList.add('d-none');
        taskInput.classList.remove('active-input');
        taskName.classList.remove('d-none');


    }

    window.removeEventListener('keydown', editTask);

}


// this functions changes appearance of a task depending on if it's done or not;

function toggleTaskStatus(listItem) {
    listItem.classList.toggle('text-decoration-line-through');
    listItem.classList.toggle('text-secondary');
    const taskOptionButtons = listItem.querySelectorAll('.task-option');
    taskOptionButtons.forEach(option => {
        console.log(option)
        option.classList.toggle('text-secondary')
    })
}


function toggleDoneStatus() {
    this.classList.toggle('fa-check');
    this.classList.toggle('text-success');
    this.classList.toggle('fa-times');
    this.classList.toggle('text-danger');
    toggleTaskStatus(this.parentNode)
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