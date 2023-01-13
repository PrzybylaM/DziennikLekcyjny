function validateForm() {
    if (document.getElementById('value').value== "Wybierz ocenę")
    {
        alert('Proszę wprowadzić ocenę');
        document.getElementById('value').style.borderColor = "red";
        return false;
    }

    if (document.getElementById('select').value== "Wybierz ucznia")
    {
        alert('Proszę wybrać ucznia');
        document.getElementById('select').style.borderColor = "red";
        return false;
    }

    if (document.getElementById('comment').value== "")
    {
        alert('Sekcja nie może być pusta');
        document.getElementById('comment').style.borderColor = "red";
        return false;
    }
}

function isTeacher() {
    const roleSelect = document.getElementById('role'),
        teacherElement = document.getElementById('teacher');

    console.log(roleSelect.value);
    if (roleSelect.value === "nauczyciel")
    {
        teacherElement.style.display = "flex";
    } else {
        teacherElement.style.display = "none";
    }
}

isTeacher();
