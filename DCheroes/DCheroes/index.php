<?php
include("conn.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>CoolCars</title>
</head>
    <body>
        <header id="header"><h1 id="header-text">CoolCars</h1></header>
        <div id="main-container">
            <div id="left-container">
            <?php 
            // get teams
            $sql="SELECT * FROM `teams`";
            $sql2="SELECT COUNT(CarId) FROM `cars` WHERE";
            $result=mysqli_query($connect,$sql);
            // loop through result and print links
            while($row=mysqli_fetch_assoc($result))
            {   
                //echo "<div class='list-button-div'>";
                echo "<a class='list-button'href=\"index.php?teamId=$row[teamId]\">$row[teamName] (</a>";
                
            }
            ?> 
            </div>    
            
            <div id="center-container"><?php
            // chweck if there's a team id available in url
            if(isset($_GET['teamId']))
            {
                $sql="SELECT * FROM `cars` WHERE `teamId` = " . $_GET['teamId'];
            }
            else
            {
                // if not..
                // get all..
                $sql="SELECT * FROM `cars` WHERE `teamId` = 1";
            }

            $result=mysqli_query($connect,$sql);
            // loop through cars..
            while($row=mysqli_fetch_assoc($result))
            { 
                echo "<div class='list-item'>";
                echo "<h2 class='list-item-name'>$row[CarName]</h2>";
                echo "<img class='list-item-pic' src='images/$row[CarPic1]'>";
                echo "<a class='list-item-link' href=\"index.php?teamId=$row[teamId]&CarId=$row[CarId]\">more info</a>";
                echo "</div>";

            }
            
            ?>  </div>

            <div id="right-container">
                <?php
                
                //WHERE `teamId` = " . $_GET['teamId']. "
                if (isset($_GET['CarId'])) {
                    $sql="SELECT * FROM `cars` where `Carid` =".$_GET['CarId'];
                $result=mysqli_query($connect,$sql);
                   while($row=mysqli_fetch_assoc($result))
                {    
                    echo "<h2 class='item-title'>$row[CarName]</h2>";
                    echo "<img class='item-pic' src='images/$row[CarPic2]'>";
                    echo "<p class='item-info'> $row[CarInfo]</p>";
                    echo "<div class='item-ratingbox'>";
                    echo "<input class='item-commentbox' type='text' name='comment'>";
                    echo "<input type='submit' value='submit' class='item-submitbutton'>";
                    echo "</div>";
                } # code...
                }
                else{
                    
                }
                
                ?>
                

            </div>
        </div>

    </body>
</html>