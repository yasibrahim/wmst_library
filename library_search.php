<!--README: Comments in html are written this way. These are notes to help guide future works-->
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
      <title>WMST Library Search</title>
    </head>
    <body>
	   <p>You  may search either by a book's Title, and Author's first or last name, or ISBN/ISSN barcode</p> <!-- allow users to search the book database by book_title, primary_author_or_editor,
     other_authors_or_editors, or isbn_or_issn -->
	   <form  method="post" action="library_search.php?go"  id="searchform">
	     Title <input  type="text" name="title"> <!-- input box for book title search -->
       Primary Author <input  type="text" name="name1"> <!-- input box for book primary author name search -->
       Other Author <input  type="text" name="name2"> <!-- input box for book other authors name search -->
       ISBN/ISSN Barcode<input  type="text" name="barcode"> <!-- input box for isbn/issn barcode search -->
	     <input  type="submit" name="submit" value="Search"> <!-- search button, submits the data the user searches for to the php to be queried -->
	    </form>
      <?php //being php section of script, comments are written with two slashes in php
      if(isset($_POST['submit'])){ //checks to see that the user has selected to submit button
        if(isset($_GET['go'])){ //checks to see that there is the 'go' keyword in the url, meaning that the form will check back with itself to retrieve the information the user is searching for
          if(preg_match("/^[a-zA-Z]+/", $_POST['name1'] && $_POST['name2'])){ //uses Regular Expressions to check that the user has entered upper case OR lower case letters to search using the any of the authors' names
            $name1 = $_POST['name1']; //creates a variable 'name1' to store the primary author's name search given that it meets the above conditions
            $name2 = $_POST['name2']; //creates a variable 'name1' to store the other authors' names search given that it meets the above conditions
            $title = $_POST['title']; //creates a variable 'title' to store the book title searched by the user
            $barcode = $_POST['barcode']; //creates a variable 'barcode' to store the ISBN/ISSN barcode searched by the user
            //connect to the database and select the database to use, localhost is the server name, root is the server username, there is no server password so there are empty quotes, and wmst_library_db is the database to be used
            $conn = new mysqli("localhost","root","","wmst_library_db");
            //check the database connection and throw error if cannot connect
            if (mysqli_connect_errno()){
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            } // end of if (mysqli_connect_errno())
            //-query  the database table, find the information that the user is searching for in the form in the .html section
            $sql = "SELECT book_title, primary_author_or_editor, other_authors_or_editors, isbn_or_issn
            FROM all_book_info
            WHERE primary_author_or_editor LIKE '%" . $name1 .  "%' OR other_authors_or_editors LIKE '%" . $name2 ."%'"; //conditions to ensure that every entry in the database with the authors the user searched for will appear in the results
            //-run the query against the mysqli query function
            if($result = mysqli_query($conn, $sql)){
            //-create while loop and loop through result set to get all of the elements
              while($row = mysqli_fetch_assoc($result)){
                $title = $row['title'];
                $name1 = $row['name1'];
                $name2 = $row['name2'];
                $barcode = $row['barcode'];
                  //-display the results
                  echo "<ul>\n";
                  echo "<li>" . "<a  href=\"library_search.php?code=$barcode\">"   .$title . " " .$name1 .  " "  .$name2 . " "  .$barcode . "</a></li>\n";
                  echo "</ul>";
               } //end of while loop
             } // end of if($result = mysqli_query($conn, $sql))
             mysqli_close($conn); //close the sql connection
            } // end of if(preg_match("/^[a-zA-Z]
          else{ //if the user does not enter a search query, none of the above script will run, and the user will be prompted to enter a search query
            echo  "<p>Please enter a search query</p>";
          } // end of else statement
        } // end of if(isset($_GET['go']))
      } //end of if(isset($_POST['submit']))
    ?> <!-- end of php section of script-->
  </body> <!--end of body section of script-->
</html> <!--end of script-->
