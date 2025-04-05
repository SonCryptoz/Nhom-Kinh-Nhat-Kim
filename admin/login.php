<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhất Kim Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Template Stylesheet -->
    <link href="./assets/css/login.css" rel="stylesheet" />
    <link href="./assets/css/admin-base.css" rel="stylesheet" />
    <link href="./assets/css/admin-responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="auth-form">
        <div class="auth-form__container">
            <img src="./assets/images/nhat-kim-logo.png" class="auth-form__heading">
            <h3 class="auth-form__heading-1">Đăng nhập Admin</h3>
            <div id="auth-form__notify-text"></div>
            <form id="login-form" class="flip-card__form">
                <input id="username" name="username" type="text" class="auth-form__input form_data"
                    placeholder="Tên tài khoản" />
                <input id="password" name="password" type="password" onkeyup="success()"
                    class="auth-form__input form_data" placeholder="Mật khẩu của bạn" />

                <input type="button" class="btns auth-form__controls-back btns--normal"
                    onclick="location.href='../public/index.php'" value="TRỞ LẠI" />
                <input class="btns btns--disabled btns--primary" type="submit" name="submit" id="submit"
                    onclick="login(); return false" value="ĐĂNG NHẬP" disabled />
                <i class="fas fa-eye-slash auth-form__toggle-password" onclick="togglePassword()"></i>
            </form>
        </div>
    </div>
</body>
<!-- Template Javascript -->
<script src="./assets/js/adminLogin.js"></script>
<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.querySelector(".auth-form__toggle-password");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }
</script>

</html>