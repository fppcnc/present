// get <div>
const userCardTemplate = document.querySelector("[data-user-template]");
const userCardContainer = document.querySelector("[data-user-cards-container]");
const searchInput = document.querySelector("[data-search]");

let users = [];


searchInput.addEventListener("input", e => {
    //event will hide everything that doesn't match input field.
    //if input field is empty, display a random list of users
    const value = e.target.value.toLowerCase();
    users.forEach(user => {
        const isVisible = user.firstName.toLowerCase().includes(value) ||
            user.lastName.toLowerCase().includes(value);
        user.element.classList.toggle("hide", !isVisible);
    })
})

//search.php does the logic. calls in for User::search()
fetch("js/search.php")
    .then(res => res.json())
    .then(data => {
        users = data.map(user => {
            //gets single element of User "cards"
            const card = userCardTemplate.content.cloneNode(true).children[0];
            const header = card.querySelector("[data-header]");
            const email = card.querySelector("[data-email]");
            const dob = card.querySelector("[data-dob]");
            header.textContent = user.firstName + ' ' + user.lastName;
            email.textContent += user.email;
            dob.textContent += user.dateOfBirth;
            userCardContainer.append(card);
            return {firstName: user.firstName, lastName: user.lastName, email: user.email, dateOfBirth: user.dateOfBirth, element: card}
        })
    })