
<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST")
        {   
            $member = $_POST["mem_id"];
            $bookno = $_POST["isbn"];
         
            $bookname=$_POST["book_name"];
            $issue =$_POST[ "issue_date"];
            $due = $_POST[ "return_date"];

            try{
                //echo getcwd();
                require_once "dbh.inc.php";
                //var_dump($pdo);
                
                $query1 = 'SELECT books_taken FROM member WHERE mem_id = :mem_id';  //checking how many books
                
                $stmt1 = $pdo->prepare($query1);
              
                $stmt1->bindParam(':mem_id', $member, PDO::PARAM_INT);
                //var_dump($stmt1);
                //echo "hello";
                $stmt1->execute();

                //echo "stm1 executed";
                $results1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                //checking if the member has reached the max number of books
                if ($results1["books_taken"] >4)
                {   $stmt1=NULL;
                    $pdo=NULL;
                   echo "Book limit(5) exceeded ";
                   //header("Location :../libraryportal.php");
                }
                else //proceed to issue book
                {
                $query2 = 'SELECT availabilty from books WHERE isbn = :isbn ';
                //echo  "$query2 <br>";
                $stmt2 = $pdo->prepare($query2);
                $stmt2-> bindParam(":isbn", $bookno, PDO::PARAM_STR);

                //echo "here";
                $stmt2->execute();
                echo "stm2 executed";
                $results2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                    if ($results2[ "availabilty"] =="available")//issue book if  available
                    {//update books table
                        //echo "ddddddhere";  
                       $updatebooks = 'UPDATE books SET availabilty="assigned" WHERE isbn = :isbn';
                       $stmt3 = $pdo->prepare($updatebooks); 
                       $stmt3-> bindParam(":isbn",$bookno, PDO::PARAM_STR);
                       
                       $stmt3->execute();   
                       echo "update of books table completed";
  
                       echo "stm3 executed";
                       
                       //update assigned books table
                       $insertAssignment = 'INSERT INTO assignment (isbn, mem_id, book_name, issue_date, return_date) VALUES (:isbn, :mem_id, :book_name, :issue_date, :return_date)';
                       $stmt4 = $pdo->prepare($insertAssignment);

                       $stmt4-> bindParam(":isbn",$bookno, PDO::PARAM_STR);
                       echo "isbn bound";
                       $stmt4-> bindParam(":book_name",$bookname, PDO::PARAM_STR);
                       echo "book_name bound";
                       $stmt4-> bindParam(":mem_id",$member, PDO::PARAM_INT);
                       echo "mem_id bound";
                       $stmt4-> bindParam(":issue_date",$issue, PDO::PARAM_STR);
                       echo "Issue date Bound";
                       $stmt4-> bindParam(":return_date",$due, PDO::PARAM_STR); 
                       echo "return date Bound"; 
                       

                       try {
                                $stmt4->execute();
                                echo "Assignment successfully added";
                            } catch (PDOException $e) {
                                if ($e->getCode() == 23000) { // 23000 is the SQLSTATE code for integrity constraint violation
                                    echo "This book has already been assigned to this member.";
                                } else {
                                    echo "Error: " . $e->getMessage();
                                }
                            }
                       #update member table
                       $addtobooks = $results1["books_taken"] +1;
                       $updatemember = 'UPDATE member SET books_taken=:books_taken  WHERE mem_id=:mem_id';
                       $stmt5 = $pdo->prepare($updatemember);
                       $stmt5 ->bindParam(":books_taken", $addtobooks,  PDO::PARAM_INT);
                       echo "books count increment value bound";
                       $stmt5 ->bindParam(':mem_id', $member, PDO::PARAM_INT);
                       echo "mem_id value bound";
                       #var_dump($stmt5);
                       $stmt5->execute();

                       $stmt1=NULL;
                       $stmt2=NULL;
                       $stmt3=NULL;
                       $stmt4=NULL;
                       $stmt5=NULL;
                       $pdo=NULL;
                       echo "Book is issued";
                    }
                     else
                        {   //echo "nooooo";
                            $stmt1=NULL;
                            $stmt2=NULL;
                            $stmt3=NULL;
                            $stmt4=NULL;
                            $pdo= NULL;
                           
                            echo "Sorry, this book is not available.";
                            //header("Location : ../libraryportal.php");
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
