<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, 
                        initial-scale=1"> 
        <link rel="stylesheet" href = "css/reset.css">
        <link rel="stylesheet" href = "css/form.css">
        <link rel='stylesheet' href='css/main.css'>
        <title> Librarian portal</title>
    </head>

    
    <body>

    <header>     </header>
    <h1>Welcome to the librarian portal</h1>

        <section class ="wrapper main">

        <h3> Find member</h3>
        <div id="memsearch">
            <form class = "searchform" action="search.inc.php" method="post">
                <label for =  membername  >Enter Membership ID: </label>
                <input id = "search"  type="text" name="membername"  placeholder="Search member"/>
                <button type="submit">Search Member</button>
            </form>
        </div> 
</br></br>

        <h3> Book details</h3>
        <div id="booksearch"> 
            <form class = "searchform" action="search.php" method="post">    
                <label for =  bookname  >Enter Book name: </label>
                <input id = "search"  type="text" name="bookname"  placeholder="Search book"/>
                <button type="submit">Search Book</button>
            </form>
        </div>    
        </section>
</br></br>
        <h3> Issue Books</h3>
        <div id="issuebook"> 

            <a id = "bkissue_anchor" href="bookissue.php"> Book Issuance Portal </a>

        </div>    

        </section>

    <footer></footer>
    </body>

</html>