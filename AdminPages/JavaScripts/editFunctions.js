function showEditArea(type) {
    const textContent = document.getElementById(type);
    const editArea = document.getElementById(`editArea${capitalizeFirstLetter(type)}`);
    
    editArea.value = textContent.innerText;
    textContent.style.display = 'none';
    editArea.style.display = 'block';
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function saveEdit(type) {
    const textContent = document.getElementById(type);
    const editArea = document.getElementById(`editArea${capitalizeFirstLetter(type)}`);
    
    textContent.innerText = editArea.value;
    textContent.style.display = 'block';
    editArea.style.display = 'none';
}

function cancelEdit(type) {
    const textContent = document.getElementById(type);
    const editArea = document.getElementById(`editArea${capitalizeFirstLetter(type)}`);
    
    editArea.value = textContent.innerText;
    textContent.style.display = 'block';
    editArea.style.display = 'none';
}