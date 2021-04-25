let exampleModal = document.getElementById('editModal');
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  let button = event.relatedTarget
  // Extract info from data-bs-* attributes
  let questionID = button.getAttribute('data-bs-questionID')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  let modalTitle = exampleModal.querySelector('.modal-title')
  let question = exampleModal.querySelector('.modal-body input')
  let answer = exampleModal.querySelector('.modal-body textarea')

  modalTitle.textContent = 'Edit FAQ with ID ' + questionID
  //question.value = ...
  question.value = 'I can\'t select the button to ask for partner.';
  //answer.value = ...
  answer.value = 'In order to apply for partner you must have at least 100,000 points of reputation.';
});
