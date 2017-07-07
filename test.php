<?
    $connect=mysql_connect("us-cdbr-iron-east-03.cleardb.net","bcec7a14b74598","33573e82") or die("Unable to Connect");
    mysql_select_db("heroku_eebb563a480856c") or die("Could not open the db");
    $showtablequery="SHOW TABLES FROM dbname";
    $query_result=mysql_query($showtablequery);
    while($showtablerow = mysql_fetch_array($query_result))
    {
    echo $showtablerow[0]." ";
    } 
    ?>