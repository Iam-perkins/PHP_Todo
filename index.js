const checked = document.getElementById('checked');
const time = document.getElementById('time');
const task = document.getElementById('task');
var show = document.querySelectorAll('td');

checked.addEventListener('click', () => {

    task.style.textDecoration = 'line-through';
    task.style.color = 'gray'
    time.style.textDecoration = 'line-through';
    time.style.color = 'gray'

    if (checked.checked === false){
        task.style.textDecoration = 'none'
        time.style.textDecoration = 'none'
        time.style.color = 'black'
        task.style.color = 'black'

    }
})




