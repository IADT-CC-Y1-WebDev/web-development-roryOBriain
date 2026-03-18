let deleteLink = document.getElementById("deleteLink");
deleteLink.addEventListener("click", function(evt) {
    if (confirm("Are you sure you want to delete?")) {
        alert("Deleting . . .");
    }
    else {
        evt.preventDefault();
    }
});