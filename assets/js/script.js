document.addEventListener('DOMContentLoaded', function() {
  // Toggle between login and register forms
  const toggleForms = document.querySelectorAll('.toggle-form');
  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');
  const toggleText = document.querySelector('.toggle-text');

  toggleForms.forEach(toggle => {
      toggle.addEventListener('click', (e) => {
          e.preventDefault();
          loginForm.classList.toggle('d-none');
          registerForm.classList.toggle('d-none');
          toggleText.textContent = loginForm.classList.contains('d-none') ? 'Register' : 'Login';
      });
  });

  // Toggle password visibility
  const togglePassword = document.querySelectorAll('.toggle-password');
  togglePassword.forEach(toggle => {
      toggle.addEventListener('click', function() {
          const input = this.parentElement.querySelector('input');
          const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
          input.setAttribute('type', type);
          this.querySelector('i').classList.toggle('fa-eye');
          this.querySelector('i').classList.toggle('fa-eye-slash');
      });
  });

  // Form validation
  const forms = document.querySelectorAll('.needs-validation');
  forms.forEach(form => {
      form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
          }
          form.classList.add('was-validated');
      });
  });
});