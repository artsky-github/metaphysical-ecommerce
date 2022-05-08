window.onload = function(){
    const flash = document.getElementById("flash");
    const flash_content = document.getElementById("flash-message")
    if(getCookie("Error") != null){
        flash.classList.remove("visually-hidden");
        flash.classList.add("alert-danger")
        flash_content.innerText = getCookie("Error");
        setTimeout(()=>{
            flash.classList.add("visually-hidden");
            flash_content.innerText='';
        },5000)
    }
    if(getCookie("Success") != null){
        flash.classList.remove("visually-hidden");
        flash.classList.add("alert-success")
        flash_content.innerText = getCookie("Success");
        setTimeout(()=>{
            flash.classList.add("visually-hidden");
            flash_content.innerText='';
        },5000)
    }
}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
} 
