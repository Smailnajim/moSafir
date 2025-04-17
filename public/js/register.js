const form = document.getElementById('registerForm');
        const usernameInput = document.getElementById('username');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const usernameError = document.getElementById('usernameError');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        const togglePassword = document.getElementById('togglePassword');

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        togglePassword.addEventListener('change', () => {
            const type = togglePassword.checked ? 'text' : 'password';
            passwordInput.type = type;
            confirmPasswordInput.type = type;
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            let valid = true;

            usernameError.textContent = '';
            emailError.textContent = '';
            passwordError.textContent = '';
            confirmPasswordError.textContent = '';

            if (usernameInput.value.trim() === '') {
                usernameError.textContent = 'Username is required.';
                valid = false;
            }

            if (!validateEmail(emailInput.value)) {
                emailError.textContent = 'Please enter a valid email address.';
                valid = false;
            }

            if (passwordInput.value.length < 8) {
                passwordError.textContent = 'Password must be at least 8 characters.';
                valid = false;
            }

            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordError.textContent = 'Passwords do not match.';
                valid = false;
            }

            if (valid) {
                alert('Registration successful!');
                form.reset();
            }
        });