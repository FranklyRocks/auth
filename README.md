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
### Register account
```javascript
  let formData = new FormData(document.querySelector("#registerForm"));
  fetch("./auth/register.php", {method: "POST", body: formData });
```
### Login account
```javascript
  let formData = new FormData(document.querySelector("#loginForm"));
  fetch("./auth/login.php", {method: "POST", body: formData });
```
### Get username of user logged in
```php
  echo $_SESSION["username"];
```
## Docs
### Register API (register.php)
    Params: user, pass
    Return:
      0: Error
        Username must be diferent from null or already exists
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
### Simple Auth Interface (examples/auth-interface.php)
![Auth Interface Screenshot](https://i.imgur.com/AqhRch6.png)

### Async login in JS
```javascript
let formData = new FormData();
formData.append("user", "jhon");
formData.append("pass", "123");

login(formData);

function login(formData) {
  fetch("./auth/login.php", {method: "POST", body: formData })
    .then(response => response.text())
    .then(result => verifyLogin(result));
}

function verifyLogin(result) {
  switch(result) {
    case 1:
      console.log("Logged in successfully");
      break;
    case 0:
      console.log("Error: username or password incorrect");
      break;
  }
}
```
