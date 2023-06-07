//  dynamic. fetch needs to go somewhere

const userCardTemplate = document.querySelector("[data-user-template]");
const userCardContainer = document.querySelector("[data-user-cards-container]");
// const searchInput = document.querySelector("[data-search]");

let users = [];

// load results matching input
searchInput.addEventListener("input", (e) => {
    const value = e.target.value.toLowerCase();
    users.forEach(user => {
        const isVisible = user.firstName.toLowerCase().includes(value) ||
            user.lastName.toLowerCase().includes(value);
        user.element.classList.toggle("hide", !isVisible);
    })
})

fetch("#")
    .then(res => res.json())
    .then(data => {
        users = data.map(user => {
            const card = userCardTemplate.content.cloneNode(true).children[0];
            const header = card.querySelector("[data-header]");
            const body = card.querySelector("[data-body]");
            header.textContent = user.firstName + user.lastName;
            body.textContent = user.email + "<br>" + user.dateOfBirth;
            userCardContainer.append(card);
            return {firstName: user.firstName, lastName: user.lastName, email: user.email, dateOfBirth: user.dateOfBirth, element: card}
        })
    })