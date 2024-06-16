$(document).ready(function() {
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        var password = $('#registerPassword').val();
        var confirmPassword = $('#confirmPassword').val();
        if (password !== confirmPassword) {
            showError('#register-error-message', '密碼不匹配');
            return false;
        }
        $.ajax({
            type: 'POST',
            url: 'includes/register.php',
            data: {
                username: $('#registerUsername').val(),
                password: password
            },
            success: function(response) {
                if (response === '註冊成功') {
                    showSuccess('#register-success-message', response);
                } else {
                    showError('#register-error-message', response);
                }
            },
            error: function() {
                showError('#register-error-message', '註冊過程中發生錯誤');
            }
        });
    });

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'includes/login.php',
            data: {
                username: $('#loginUsername').val(),
                password: $('#loginPassword').val()
            },
            success: function(response) {
                if (response === 'Success') {
                    window.location.href = 'dashboard.php';
                } else {
                    showError('#login-error-message', response);
                }
            },
            error: function() {
                showError('#login-error-message', '登錄過程中發生錯誤');
            }
        });
    });

    function showError(element, message) {
        $(element).text(message).show();
    }

    function showSuccess(element, message) {
        $(element).text(message).show();
    }
});
