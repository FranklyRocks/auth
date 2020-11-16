# Auth
  Self hosted simple Auth API
## Features
   - Login: verify user identity
   - Register: create unique users with password
## Get started
### 1. Configure
    Create a database with the name you want (ex. users)
    Edit connectDB.php with connection data to your database
### 2. Install
    Move auth folder to your server root directory
    Go to mydomain.com/auth/install.php in your browser and press install
    For security reasons remove install.php and users.sql before you install
## How to use
    Register account:
      mydomain.com/auth/register.php?user=jhon&pass=123
    Login account: 
      mydomain.com/auth/login.php?user=jhon&pass=123
## Docs
### Register API (register.php)
    Params: user, pass
    Return:
      0: Error
        User must be diferent from null or already exists
      1: Success
        User registered and session started
### Login API (login.php)
    Params: user, pass
    Return:
      0: Error
        Username or password incorrect
      1: Success
        User logged in and session started
## Examples
### Async login in JS
```javascript
login("jhon", "123");

function login(user, pass) {
  fetch("./auth/login.php?user=" + user + "&pass=" + pass)
    .then(response => response.text())
    .then(result => verifyLogin(result));
}

function verifyLogin(result) {
  switch(result) {
    case 1:
      console.log("Logged in succesfully");
      break;
    case 0:
      console.log("Error: username or password incorrect");
      break;
  }
}
```
