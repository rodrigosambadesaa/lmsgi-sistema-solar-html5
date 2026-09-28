document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('#contactForm');
  const errorBox = document.querySelector('#form-errors');
  if (!form || !errorBox) return;
  form.addEventListener('submit', (event) => {
    const errors = [];
    const nombre = form.elements.nombre.value.trim();
    const apellidos = form.elements.apellidos.value.trim();
    const correo = form.elements.correo.value.trim();
    const opinion = form.elements.opinion.value.trim();
    if (!/^[\p{L} .'-]{2,60}$/u.test(nombre)) errors.push('El nombre debe tener entre 2 y 60 letras.');
    if (!/^[\p{L} .'-]{2,100}$/u.test(apellidos)) errors.push('Los apellidos no son válidos.');
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(correo)) errors.push('El correo electrónico no es válido.');
    if (opinion.length < 10 || opinion.length > 1000) errors.push('La opinión debe tener entre 10 y 1000 caracteres.');
    if (!form.querySelector('input[name="edad"]:checked')) errors.push('Selecciona un intervalo de edad.');
    if (errors.length) { event.preventDefault(); errorBox.textContent = errors.join(' '); errorBox.focus(); }
  });
});
