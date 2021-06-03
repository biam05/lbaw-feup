const ban_forever = document.getElementById('Report-modal-date-forever');
const ban_date = document.getElementById('Report-modal-date');
ban_forever.addEventListener( 'change', function() {
    ban_date.disabled = !!this.checked;
    ban_date.value = "";
});
