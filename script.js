
function truncateTable() {
    alert(`Truncating`);
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'truncate.php', false);
    xhr.onprogress = function () {
        alert(`Progress`);
    }
    xhr.onload = function () {
        alert("Response While Truncating Is " + xhr.responseText);
        location.reload();
    }
    xhr.send();
}
