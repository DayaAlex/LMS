<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, 
                        initial-scale=1"> 
        
        <link rel="stylesheet" href = "css/reset.css">
        <link rel="stylesheet" href = "css/main.css">
        <link rel="stylesheet" href = "css/form.css">
        <title> Welcome to Library Management System !</title>

    </head>

    <body>
        <h1> LIBRARY MANAGEMENT SYSTEM</h1>
        <h3>  Enter your credentials: </h3>
        <form action = "includes/login.inc.php "method = "post">
            <label>Username:</label>
            <input type= "text"  name="librarian" placeholder = "Username">
            <label>Password:</label>
            <input type= "password" name ="pwd" placeholder = "Password">
            <br/>
            <button>Signin</button>
        </form>

    </body>

</html>
