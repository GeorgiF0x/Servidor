document.addEventListener('DOMContentLoaded', function () {
    const readMoreButtons = document.querySelectorAll('.read-more-btn');
    readMoreButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const cardBody = this.closest('.card-body');
            const descriptionShort = cardBody.querySelector('.description-short');
            const descriptionLong = cardBody.querySelector('.description-long');
            
            if (descriptionShort.style.display === 'none') {
                descriptionShort.style.display = 'inline';
                descriptionLong.style.display = 'none';
                this.textContent = 'Leer más';
            } else {
                descriptionShort.style.display = 'none';
                descriptionLong.style.display = 'inline';
                this.textContent = 'Leer menos';
            }
        });
    });
});
