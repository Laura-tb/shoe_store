(function () {
  const params = new URLSearchParams(location.search);

  // --- función toast ---
  const showToast = (type, text) => {
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.textContent = text;
    document.body.appendChild(toast);

    // animación de entrada
    requestAnimationFrame(() => toast.classList.add('show'));

    // desaparece después de 3 segundos
    setTimeout(() => {
      toast.classList.remove('show');
      setTimeout(() => toast.remove(), 400);
    }, 3000);
  };

  // Mensajes globales
  if (params.get('registered'))
    showToast('success', 'Registro correcto. Inicia sesión.');
  if (params.get('ok') === '1' && location.pathname.endsWith('login.php')) {
    showToast('success', 'Has iniciado sesión correctamente.');
  }

  // Mensajes de error
  const e = params.get('e');
  if (e) {
    if (e === 'dup') showToast('warning', 'Ese email ya existe.');
    else if (e === 'val') showToast('error', 'Datos no válidos.');
    else if (e === 'cred') showToast('error', 'Credenciales incorrectas.');
    else if (e === 'pass' && location.pathname.endsWith('register-start.php')) {
      showToast(
        'error',
        'La contraseña debe tener 8 caracteres, mayúscula, minúscula, número y carácter especial.'
      );
    } else showToast('error', 'Ha ocurrido un error.');
  }
})();
