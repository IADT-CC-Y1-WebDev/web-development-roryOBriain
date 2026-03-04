document.getElementById('confirmMe').addEventListener('click', (e) => {
    e.preventDefault();
    confirmIt()
});

function confirmIt() {
    return confirm("Are you sure you want to navigate away?");
}