// get <div>
const userCardTemplate = document.querySelector("[data-user-template]");
const userCardContainer = document.querySelector("[data-user-cards-container]");
const searchInput = document.querySelector("[data-search]");


let users = [];

// search criteria. hide what doesn't match search input.
//showAll as default
searchInput.addEventListener("input", e => {
    //event will hide everything that doesn't match input field.
    //if input field is empty, display a random list of users
    const value = e.target.value.toLowerCase();
    //counter for displayed cards
    let count = 0;
    users.forEach(user => {
        const isVisible = user.firstName.toLowerCase().includes(value) ||
            user.lastName.toLowerCase().includes(value);
        user.element.classList.toggle("hide", !isVisible);
        if (isVisible) {
            if (count < 15) {
                user.element.classList.remove("hide");
                count++;
            } else {
                user.element.classList.add("hide");
            }
        }
    })
})

//search.php does the logic. calls in for User::search()
fetch("js/search.php")
    .then(res => res.json())
    .then(data => {
        users = data.map(user => {
            //gets single element of User "cards"
            const card = userCardTemplate.content.cloneNode(true).children[0];
            const searchButton = card.querySelector("[data-user-seeProfile]");
            const header = card.querySelector("[data-header]");
            const email = card.querySelector("[data-email]");
            const dob = card.querySelector("[data-dob]");
            const id = user.id;
            header.textContent = user.firstName + ' ' + user.lastName;
            email.textContent += user.email;
            dob.textContent += user.dateOfBirth;
            userCardContainer.append(card);
            //button redirects to friend´s page
            searchButton.addEventListener("click", function () {
                window.location.href = "index.php?choice=toProfile&area=friend&idFriend=" + encodeURIComponent(id);
            });
            return {
                id: user.id,
                firstName: user.firstName,
                lastName: user.lastName,
                email: user.email,
                dateOfBirth: user.dateOfBirth,
                element: card
            }
        });
        // hide all cards initially except the first 10
        users.forEach((user, index) => {
            if (index < 15) {
                user.element.classList.remove("hide");
            } else {
                user.element.classList.add("hide");
            }
        });
    })

