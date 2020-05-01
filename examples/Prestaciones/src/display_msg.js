
function display_error(error, time){
    if(error === "") return;
    const errorMsg = document.getElementById("display-msg");
    errorMsg.className="container-fluid alert alert-danger col-lg-8"
    errorMsg.textContent = error;
    if(time){
        setTimeout(() => {
            successMsg.style.display="none";
        }, time*1000)
    }
}

function display_success(success, time){
    if(success === "") return;
    const successMsg = document.getElementById("display-msg");
    successMsg.className ="container-fluid alert alert-success col-lg-8"
    successMsg.textContent= success;
    if(time){
        setTimeout(() => {
            successMsg.style.display="none";
        }, time*1000)
    }
}