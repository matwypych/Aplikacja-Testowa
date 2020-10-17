var modal = document.getElementById('pomocId');

// zamyka się gdy klikniemy gdziekolwiek
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}