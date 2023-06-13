// get <div>
const guestCardTemplate = document.querySelector("[data-guest-template]");
const guestCardContainer = document.querySelector("[data-guest-cards-container]");
const searchGuestInput = document.querySelector("[data-searchGuest]");



let guests = [];

// search criteria. hide what doesn't match search input.
//showAll as default
searchGuestInput.addEventListener("input", e => {
    //event will hide everything that doesn't match input field.
    //if input field is empty, display a random list of users
    const value = e.target.value.toLowerCase();
    guests.forEach(user => {
        const isVisible = user.firstName.toLowerCase().includes(value) ||
            user.lastName.toLowerCase().includes(value);
        user.element.classList.toggle("hide", !isVisible);
    })
})

//search.php does the logic. calls in for User::search()
fetch("js/search.php")
    .then(res => res.json())
    .then(data => {
        guests = data.map(user => {
            //gets single element of User "cards"
            const card = guestCardTemplate.content.cloneNode(true).children[0];
            const checkboxButton = card.querySelector("[data-guest-invite]");
            const header = card.querySelector("[data-guestHeader]");
            const email = card.querySelector("[data-guestEmail]");
            const id = user.id;
            header.textContent = user.firstName + ' ' + user.lastName;
            email.textContent += user.email;
            checkboxButton.value = user.id;
            guestCardContainer.append(card);
            return {id: user.id, firstName: user.firstName, lastName: user.lastName, email: user.email, element: card}
            });

        })


