<?php

$username = 'root';
$password = 'root';
$hostname = 'localhost';

$dsn = "mysql:host=$hostname;dbname=yz746";

try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $error){ //just Exception shold get all typs of possible errors
    echo '<h3>DB Error</h3>'; //header tag for error
    echo $error->getMessage(); //this gets the message and prints it
    exit();
}catch (Exception $error){ //this is for generic errors it catches all possible errors and prints the code
    echo '<h3>Generic Error</h3>';
    echo $error->getMessage();
    exit();
}


$query = "SELECT * FROM todos WHERE ownerid < :ownerid" ; // this is your SQL Query statement
$statement = $db->prepare($query); // this prepares the statement
$statement->bindValue(':ownerid', 6); // bind value is for setting a value to a id
$statement->execute();
$todos = $statement->fetchAll();
$statement->closeCursor();





/*
function getCoinsBasedOnTag($tag){

$query = "SELECT * FROM coinsTable WHERE tag = :tag";
$statement = $db->prepare($query);
$statement = $db->bindValue(':tag',$tag);
$statement = $db->execute();
$coinInfo = $statement->fetchAll();
$statement->closeCursor();

return $coinInfo;//array this has all of the the info for that coin tag and everything inside
//of it.

}

$coinInfoNeeded = getCoinsBasedOnTag($tag);

foreach ($coinInfoNeeded as $coinInfo):
    echo $coinInfo;
endforeach;
*/
//print_r($todos);
?>
<!DOCTYPE html5>
<html>
<head><title>Assignment 3 PDO homework</title><link rel="stylesheet" type="text/css" href="main.css"></head>
<body>
<main>
    <h2>user id messages < 6 </h2>
    <table>
        <tr>
            <th>Message</th>
        </tr>
        <?php foreach ($todos as $todo): ?>
            <tr>
                <td><?php echo $todo['message']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </section>
    <br>


</main>
</body>
</html>

