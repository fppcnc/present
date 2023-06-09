<?php
// connection to DB
const DB_DSN = 'mysql:host=localhost;dbname=present';

// root privileges. Better avoid using this to prevent irreversible actions
const DB_USER_ROOT = 'root';
const DB_PASSWD_ROOT = '';


//USER with INSERT only privilege
const DB_USER_INSERT = 'user_insert';
const DB_PASSWD_INSERT = 'insert_user';


// USER with SELECT only privilege
const DB_USER_SELECT = 'user_select';
const DB_PASSWD_SELECT = 'select_user';


// USER with UPDATE and SELECT privileges
const DB_USER_UPDATE = 'user_update';
const DB_PASSWD_UPDATE = 'update_user';

// USER with DELETE privilege
const DB_USER_DELETE = 'user_delete';
const DB_PASSWD_DELETE = 'delete_user';
