window.addEventListener('DOMContentLoaded', function () {
    const publicN = document.getElementById('eventPublicN');
    const publicY = document.getElementById('eventPublicY');
    const div = document.getElementById('showGuests');

    publicN.addEventListener('change', function () {
        if (publicN.checked) {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    });


    publicY.addEventListener('change', function () {
        if (publicY.checked) {
            div.style.display = 'none';
        }
    });
});

