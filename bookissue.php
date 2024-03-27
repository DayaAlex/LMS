<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, 
                        initial-scale=1"> 

        <link rel="stylesheet" href = "css/main.css">
        <link rel="stylesheet" href = "css/form.css">
        <title>Book Issuance portal</title>

    </head>

    <body>
    <h1>Book Issuance Portal </h1>    
    <h3>Enter Details</h3>
    <form action = "includes/bkissue.inc.php "method = "post">
            <label>Enter Book ISBN</label>
            <input type= "int"  name="bookid" placeholder = "Book ID">
            <br/>
            <label>Enter Member ID:</label>
            <input type= "int" name ="mem_id" placeholder = "Member ID">
            <br/>
            <label>Book Name</label>
            <input type = "text" name="bookname" placeholder = "Book Name">
            <br/>
            <label>Issue Date(dd/mm/yyyy) :</label>
            <input type = "date" id="dateissued" name="dateissued"/>
            <br/>
            <label>Return Date(dd/mm/yyyy) :</label>
            <input type = "date" id="duedate" name="duedate"/>
            <br/>
            <button>Submit</button>
        </form>

    </body>