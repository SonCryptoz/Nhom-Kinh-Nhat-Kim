function success() {
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();
    const submitButton = document.getElementById("submit");

    if (checkUserName(username) && checkUserPassword(password)) {
        submitButton.disabled = false;
        submitButton.classList.remove("btns--disabled"); 
    } else {
        submitButton.disabled = true;
        submitButton.classList.add("btns--disabled");
    }
}

function checkUserName(username) {
    return username.length >= 5; // Yêu cầu tên tài khoản tối thiểu 5 ký tự
}

function checkUserPassword(password) {
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/;
    return passwordRegex.test(password); // Yêu cầu có ít nhất 1 chữ, 1 số và 1 ký tự đặc biệt
}

async function login() {
    const formData = new FormData();
    document.querySelectorAll(".form_data").forEach((element) => {
        formData.append(element.name, element.value);
    });

    const submitButton = document.getElementById("submit");
    submitButton.disabled = true;
    submitButton.classList.add("btns--disabled");

    try {
        const response = await fetch("/database/adminLogin.php", {
            method: "POST",
            body: formData,
        });

        const result = await response.text();
        console.log(result); // Debug response

        submitButton.disabled = false;
        submitButton.classList.remove("btns--disabled");

        if (result.trim() === "1") {
            window.location.href = "admin.php";
        } else if (result.trim() === "2") {
            window.location.href = "index.php";
        } else {
            displayNotification(result);
        }
    } catch (error) {
        console.error("Lỗi:", error);
        displayNotification("Có lỗi xảy ra. Vui lòng thử lại.");
    }
}

function displayNotification(message) {
    const notifyText = document.getElementById("auth-form__notify-text");
    notifyText.innerHTML = message;
    notifyText.style.color = "red";
    notifyText.style.marginBottom = "10px";
    setTimeout(() => {
        notifyText.innerHTML = "";
        notifyText.style.marginBottom = "0";
    }, 5000);
}
