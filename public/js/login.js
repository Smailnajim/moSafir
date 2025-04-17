        const form = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }


        form.addEventListener('submit', (e) => {
            let valid = true;

            emailError.textContent = '';
            passwordError.textContent = '';

            if (!validateEmail(emailInput.value)) {
                emailError.textContent = 'Please enter a valid email address.';
                valid = false;
            }

            if (passwordInput.value.length < 8) {
                passwordError.textContent = 'Password must be at least 8 characters.';
                valid = false;
            }

            
        });
