<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, 
                        initial-scale=1"> 
        <link rel="stylesheet" href = "css/form.css">
        <link rel='stylesheet' href='css/main.css'>
        <title> Librarian portal</title>
    </head>

    
    <body>
    <h1>Welcome to the librarian portal</h1>

        <section class ="wrapper main">
        <h3> Find member</h3>
        <div id="memsearch">
            <form class = "searchform" action="search.inc.php" method="post">
                <label for =  membername  >Enter Membership ID: </label><br />
                <input id = "search"  type="text" name="membername"  placeholder="Search member"/>
                <br/>
                <button type="submit">Search Member</button>
            </form>
              
        </div> 

        <h3> Book details</h3>
        <div id="booksearch"> 
            <form class = "searchform" action="search.php" method="post">    
                <label for =  bookname  >Enter Book name: </label><br />
                <input id = "search"  type="text" name="bookname"  placeholder="Search book"/>
                <br/>
                <button type="submit">Search Book</button>
            </form>
        </div>    
        </section>

        <h3> Issue Books</h3>
        <div id="issuebook"> 

        </div>    
        </section>
    </body>

</html>