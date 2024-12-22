document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            const name = form.querySelector('input[name="name"]').value;
            const description = form.querySelector('textarea[name="description"]').value;

            if (!name || !description) {
                alert('Пожалуйста, заполните все поля.');
                event.preventDefault();
            }
        });
    }
});