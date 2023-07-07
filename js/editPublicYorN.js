window.addEventListener('DOMContentLoaded', function () {
    const publicN = document.getElementById('eventPublicN');
    const publicY = document.getElementById('eventPublicY');
    const div = document.getElementById('showGuests');
    console.log(publicY)
    console.log(publicN)

    if (publicN.checked) {
        div.style.display = 'block';
    } else {
        div.style.display = 'none';
    }
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

// get <div>
const guestCardTemplate = document.querySelector("[data-guest-template]");
const guestCardContainer = document.querySelector("[data-guest-cards-container]");
const searchInputGuest = document.querySelector("[data-searchGuest]");

let guests = [];

// search criteria. hide what doesn't match search input.
searchInputGuest.addEventListener("input", e => {
    const value = e.target.value.toLowerCase();
    let count = 0;
    guests.forEach(guest => {
        const isVisible = guest.firstName.toLowerCase().includes(value) ||
            guest.lastName.toLowerCase().includes(value);
        guest.element.classList.toggle("hide", !isVisible);

        if (isVisible) {
            if (count < 21) {
                guest.element.classList.remove("hide");
                count++;
            } else {
                guest.element.classList.add("hide");
            }
        }
    })
});

// search.php does the logic. calls in for User::search()
fetch("js/search.php")
    .then(res => res.json())
    .then(data => {
        guests = data.map(guest => {
            const card = guestCardTemplate.content.cloneNode(true).querySelector(".card");
            const checkbox = card.querySelector("[data-guest-invite]");
            const header = card.querySelector("[data-guestHeader]");
            const email = card.querySelector("[data-guestEmail]");
            const dob = card.querySelector("[data-guest-dob]");
            const id = guest.id;

            header.textContent = guest.firstName + ' ' + guest.lastName;
            email.textContent = "Email: " + guest.email;
            dob.textContent = "Date of Birth: " + guest.dateOfBirth;

            guestCardContainer.append(card);

            // assign guest ID as the checkbox value
            checkbox.value = id;


            return {
                id: guest.id,
                firstName: guest.firstName,
                lastName: guest.lastName,
                email: guest.email,
                dateOfBirth: guest.dateOfBirth,
                element: card
            }
        })
        guests.forEach((guest, index) => {
            if (index < 21) {
                guest.element.classList.remove("hide");
            } else {
                guest.element.classList.add("hide");
            }
        });
    });