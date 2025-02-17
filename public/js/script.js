document.addEventListener('DOMContentLoaded', () => {
  const flashMessage = document.querySelectorAll('.flash-message');
  flashMessage.forEach((message) => {
    message.classList.add('show');
  })
  setTimeout(() => {
    flashMessage.forEach((message) => {
      message.classList.add('hide');
      setTimeout(() => {
        message.style.display = 'none'
      }, 500);
    })
  }, 5000);
});

document.addEventListener('DOMContentLoaded', () => {
  const logoutBtn = document.getElementById('logout');

  logoutBtn.addEventListener('click', () => {
    window.location.href = '/logout'
  });
})

document.addEventListener('DOMContentLoaded', () => {
  const deleteBtn = document.querySelectorAll('[data-bs-target="#delete"]');
  const confirmBtn = document.getElementById('confirm');
  let selectedId = null;

  deleteBtn.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      selectedId = btn.dataset.id;
    });
  });

  confirmBtn.addEventListener('click', () => {
    window.location.href = 'delete/' + selectedId;
  });
});