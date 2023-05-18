const selectElement = document.querySelector("#dropdown-form");
const message = document.getElementById("form-message");
const datetime = document.getElementById("form-datetime");
const submit = document.getElementById("submit");

selectElement.addEventListener("change", (event) => {
    if(event.target.value === "reservation"){
        message.style.display = "none";
        datetime.style.display = "flex";
        submit.value = "Book a reservation";
    }
    else{
        message.style.display = "flex";
        datetime.style.display = "none";
        submit.value = "Send";
    }
});