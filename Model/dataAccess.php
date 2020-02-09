<?php

$pdo = new PDO("mysql:host=kunet;dbname=dbMk1720552", "k1720552", "Jm120698312", 
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

session_start();



function getAllPosts(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Posts");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Posts");
    return $results;
}

function getUserPictures($username){
    global $pdo;
    $statement = $pdo->prepare("SELECT Picture FROM Posts p INNER JOIN Users u ON u.User_ID=p.User_ID WHERE u.Username=? ORDER BY `Date` DESC");
    $statement->execute([$username]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Posts");
    return $results;
}

function getUserAccountDetails($username){
    global $pdo;
    $statement = $pdo->prepare("SELECT `Profile_Picture`, `Name`, `Username` FROM `Users` WHERE `Username`=?");
    $statement->execute([$username]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Users");
    return $results;
}

function getPP($username){
    global $pdo;
    $statement = $pdo->prepare("SELECT `Profile_Picture` FROM `Users` WHERE `Username`=?");
    $statement->execute([$username]);
    $img = $statement->fetch(PDO::FETCH_CLASS,"Users");
    
    header("Content-Type: image/png");
    return $img;
}

function userSignup($newUser) {
    
             $query="INSERT INTO `Users` (`Username`, `Email_Address`, `Name`, `Password`) VALUES (?,?,?,?); ";
             global $pdo;
             $statement = $pdo->prepare($query);
             $statement->execute([  $newUser->email_address,
                                    $newUser->name,
                                    $newUser->username,
                                    $newUser->password]);
        
         
         
    }
    
    function userLogin($username)
	{
		global $pdo;
		$statement = $pdo->prepare("SELECT `User_ID` FROM Users WHERE Username = ?");
		$statement->execute([$username]);
		$user = $statement->fetchAll(PDO::FETCH_CLASS,"Users");
		return $user;
	}
    
    function getUsernameAndPassword($username,$password)
    {
	global $pdo;
	$statement = $pdo->prepare("SELECT * FROM `Users` WHERE `Username` = ? AND `Password` = ?");
	$statement->execute([$username,$password]);
	$result = $statement->fetchAll(PDO::FETCH_CLASS, 'Users');

	if(count($result)!=0)
	{
		return $result[0];
	}
	else
	{
		return false;
	}
    }


