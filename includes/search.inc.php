<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, 
                        initial-scale=1"> 

        <link rel="stylesheet" href = "css/main.css">
        <link rel="stylesheet" href = "css/form.css">
        <title> search</title>
    </head>

<body>
    <h3>Search results</h3>

   <?php 
    if (empty($results1))
    {
        echo"<div>";
        echo "<p>No members found with that name.</p>";
        echo"</div>";
    }
    elseif(empty($results2)){
        echo"<div>";
        echo "No book found with that title.";
        echo"</div>";
    }
    elseif (!empty($results1) && empty(results2))
        {
            foreach ($results1 as $row){
                echo"<div>";
                echo htmlspecialchars($row["mem_id"]) . ", " . htmlspecialchars($row["name"]) . ", " . htmlspecialchars($row["books_taken"]) . ", " . htmlspecialchars($row["FINE"]) . "<br>";
                echo"</div>";
            }
        }
    else
      {foreach ($results2 as $row){
        echo"<div>";
        echo htmlspecialchars($row["isbn"]) . ", " . htmlspecialchars($row["book_name"]) . ", " . htmlspecialchars($row["author_name"]) . ", " . htmlspecialchars($row["genre"]) . ", " . htmlspecialchars($row["availability"]) . "<br>";
        echo"</div>";    
    }}  
    ?>           
</body>
