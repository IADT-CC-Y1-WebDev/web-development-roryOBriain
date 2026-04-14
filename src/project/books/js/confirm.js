let deleteBookBtn = document.querySelector(".delete");
 
deleteBookBtn.addEventListener("click", function(evt){
    let btn = evt.target.closest(".deleteLink");
    if (btn !== null) {
        if((confirm("Are you sure you want to delete this book?"))) {
            console.log("Deleting book")
        } else {
            evt.preventDefault();
        }
    }
});
 