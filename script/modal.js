const close_btn = document.querySelector('.modal-notice_close');

close_btn.addEventListener('click', () => {
  document.querySelector('.modal').style.display = 'none';
});
