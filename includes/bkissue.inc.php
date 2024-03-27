
<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $member = $_POST["mem_id"];
            $bookno = $_POST["bookid"];
            $bookname=$_POST["bookname"];
            $issue =$_POST[ "dateissued"];
            $due = $_POST[ "duedate"];

            try{
                echo getcwd();
                require_once "dbh.inc.php";
                var_dump($pdo);
                $query1 = "SELECT books_taken FROM member WHERE mem_id = :mem_id";  //checking how many books
                //echo $query1;
                // Correct the table name
                $stmt1 = $pdo->prepare($query1);
                var_dump($stmt1);
                $stmt1->execute(array(':mem_id' => "$member"));
                $results1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                //checking if the member has reached the max number of books
                if ($results1["books_taken"] >5)
                {   $stmt1=NULL;
                    $pdo=NULL;
                   echo "Book limit(5) exceeded ";
                   header("Location :../libraryportal.php");
                }
                else //proceed to issue book
                {
                $query2 = "SELECT availabilty from books WHERE isbn = :bookid ";
                //echo  "$query2 <br>";
                $stmt2 = $pdo->prepare($query2);
                $stmt2-> bindParam(":bkid", $bookno);
                $stmt2->execute();
                $results2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                    if ($results2[ "availabilty"] =="available")//issue book if  available
                    {//update books table 
                       $updatebooks = "UPDATE books SET availabilty='assigned' WHERE isbn = :bkid";
                       $stmt3 = $pdo->prepare($updatebooks); 
                       $stmt3-> bindParam(":bkid",$bookno);
                       $stmt3->execute();     

                       //update assigned books table
                       $updateassigned = "UPDATE assigned SET b_id=:bkid, b_name=:bname, member_id= :memid, issue_date=:iss , return_date =:ret";
                       $stmt4 = $pdo->prepare($updateassigned); 
                       $stmt4-> bindParam(":bkid",$bookno);
                       $stmt4-> bindParam(":bname",$bookname);
                       $stmt4-> bindParam(":memid",$member);
                       $stmt4-> bindParam(":iss",$issue);
                       $stmt4-> bindParam(":ret",$due); 
                       $stmt4->execute(); 

                       #update member table
                       $addtobooks = $results1["books_taken"] +1;
                       $updatemember = " UPDATE member SET books_taken=:updatedval  WHERE id=:memid";
                       $stmt5 ->bindParam(":updateval", $addtobooks);
                       $stmt->execute();

                       $stmt1=NULL;
                       $stmt2=NULL;
                       $stmt3=NULL;
                       $stmt4=NULL;
                       $stmt5=NULL;
                       $pdo=NULL;
                    }
                     else
                        {   $stmt1=NULL;
                            $stmt2=NULL;
                            $stmt3=NULL;
                            $stmt4=NULL;
                            $pdo= NULL;
                           
                            header("Location : ../libraryportal.php");
                            echo "Sorry, this book is not available.";
                            die();
                        }
                    }         
                die();
            }catch(PDOException $e)
            {
                echo "Query  failed to execute!". $e->getmessage();
            }
        }
    else{
        header("Location :../libraryportal.php");
    }
