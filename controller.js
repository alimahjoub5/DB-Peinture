const form = document.getElementById('testimonials-form');
const nom = document.getElementsByName('nom')[0];
const email = document.getElementsByName('email')[0];
const message = document.getElementsByName('message')[0];
const note = document.getElementsByName('note')[0];
const errorMessages = document.querySelectorAll('.error-message');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  // Vérifier que le champ nom n'est pas vide
  if (nom.value.trim() === '') {
    errorMessages[0].textContent = 'Le champ Nom est vide';
  } else {
    errorMessages[0].textContent = '';
  }

  // Vérifier que le champ email n'est pas vide et est valide
  if (email.value.trim() === '') {
    errorMessages[1].textContent = 'Le champ Email est vide';
  } else if (!isValidEmail(email.value)) {
    errorMessages[1].textContent = "L'adresse email n'est pas valide";
  } else {
    errorMessages[1].textContent = '';
  }

  // Vérifier que le champ message n'est pas vide
  if (message.value.trim() === '') {
    errorMessages[2].textContent = 'Le champ message est vide';
  } else {
    errorMessages[2].textContent = '';
  }

  // Vérifier que le champ note a une valeur sélectionnée
  if (note.value === '') {
    errorMessages[3].textContent = 'Veuillez sélectionner une note';
  } else {
    errorMessages[3].textContent = '';
  }

  // Si tous les champs sont valides, envoyer le formulaire
  if (isFormValid()) {
    form.submit();
  }
});

function isValidEmail(email) {
  const emailRegex = /^\S+@\S+\.\S+$/;
  return emailRegex.test(email);
}

function isFormValid() {
  let isValid = true;

  errorMessages.forEach((message) => {
    if (message.textContent !== '') {
      isValid = false;
    }
  });

  return isValid;
}
