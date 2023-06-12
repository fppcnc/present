<script src="../js/searchbar.js" defer></script>
<nav class="search-sideBar-container">
    <div class="search-wrapper">
        <label for="search">Search Users </label>
        <input type="search" id="search" data-search>
    </div>
    <div class="user-cards" data-user-cards-container></div>
        <template data-user-template>

        <div class="card">
            <button data-user-seeProfile>
            <div class="header" data-header></div>
            <div class="body" data-email>Email : </div>
            <div class="body" data-dob>Birthday : </div>
            </div>
            </button>

        </template>

</nav>