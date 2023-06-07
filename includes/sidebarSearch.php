<script src="js/searchbar.js" defer></script>
<nav class="search-sideBar">
    <div class="search-wrapper">
        <label for="search">Search Users </label>
        <input type="search" id="search" data-search>
    </div>
    <div class="user-cards" data-user-cards-container></div>
        <template data-user-template>
        <div class="card">
            <div class="header" data-header></div>
            <div class="body" data-body></div>
        </div>
        </template>
</nav>