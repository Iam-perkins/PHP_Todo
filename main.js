const  inputBox = document.getElementById("input-box");
const button = document.getElementById("add-task");
const listContainer = document.getElementById("list-container");
 button.addEventListener('click', (e)=>{
    if( inputBox.ariaValueText === ''){
        alert("field cannnot be empty");
    }
    else{
        let li = document.createElement("li");
        li.innerHTML = inputBox.value;
        listContainer.appendChild(li);

    }
    inputBox.value= " ";
 })