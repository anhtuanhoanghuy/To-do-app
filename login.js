const submitBtn = document.getElementById("submit-btn");
const username = "admin";
const password = "admin";

 
document.getElementById("username").focus();
document.getElementById("username").onkeyup = function(e) {
    e.preventDefault();
    if(e.keyCode == 13) {
        e.preventDefault();
        document.getElementById("password").focus();
    }
};

document.getElementById("password").onkeyup = function(e) {
    if(e.keyCode == 13) {
        submitBtn.click();
        document.getElementById("password").blur();
    }
};

submitBtn.onclick = function() {
    if (document.getElementById("username").value == "") {
        document.getElementById("loiusername").innerHTML = "Vui lòng nhập tên đăng nhập";
    } else {
        document.getElementById("loiusername").innerHTML = "";
    }
    if (document.getElementById("password").value == "") {
        document.getElementById("loipassword").innerHTML = "Vui lòng nhập mật khẩu";
    } else {
        document.getElementById("loipassword").innerHTML = "";
    }
    if (document.getElementById("username").value == "admin" 
    &&document.getElementById("password").value == "admin") {
        // alert("Đăng nhập thành công");
        
        location.replace("admin.html");
    } else if (document.getElementById("username").value != "admin" 
    && document.getElementById("username").value != "" 
    && document.getElementById("password").value != "admin"
    && document.getElementById("password").value != "")  {
        alert("Sai tài khoản");
    }
};
