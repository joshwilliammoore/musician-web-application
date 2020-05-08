<?php

$pdo = new PDO("mysql:host=kunet;dbname=dbMk1720552", "k1720552", "CabbagePatch",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

session_start();

function getAllPosts() {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Posts ORDER BY RAND()");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Posts");
    return $results;
}

function deletePost($postId){
    $query = "DELETE FROM Posts WHERE Post_ID=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$postId]);
}

function getAllType($type) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Users WHERE `Type`=? ORDER BY RAND()");
    $statement->execute([$type->Type]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Users");
    return $results;
}

function getUserPictures($userId) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Posts p INNER JOIN Users u ON u.User_ID=p.User_ID WHERE u.User_ID=? ORDER BY `Date` DESC");
    $statement->execute([$userId->User_ID]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Posts");
    return $results;
}

function getUserPost($postId) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM `Posts` WHERE `Post_ID`=? "
            . "ORDER BY `Date` DESC");
    $statement->execute([$postId->Post_ID]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Posts");
    return $results;
}

function getUserAccountDetails($userId) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM `Users` WHERE `User_ID`=?");
    $statement->execute([$userId->User_ID]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Users");
    return $results;
}

function userSignup($newUser) {

    $query = "INSERT INTO `Users` (`Username`, `Email_Address`, `Name`, "
            . "`Password`) VALUES (?,?,?,?); ";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$newUser->username,
        $newUser->email_address,
        $newUser->name,
        $newUser->password]);
}

function userLogin($username) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Users WHERE Username = ?");
    $statement->execute([$username]);
    $user = $statement->fetchAll(PDO::FETCH_CLASS, "Users");
    return $user;
}

function get3OtherProfiles($type, $not) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Users WHERE User_ID <> ? AND Type = ? ORDER BY RAND() LIMIT 3");
    $statement->execute([$not,$type]);
    $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Users');
    return $result;
}

function get3Profiles($type) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Users WHERE Type = ? ORDER BY RAND() LIMIT 3");
    $statement->execute([$type]);
    $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Users');
    return $result;
}


function getMaybeList($userId){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Users u "
            . "INNER JOIN User_Lists ul ON ul.Recipient_ID=u.User_ID INNER JOIN "
            . "Lists l ON l.List_ID=ul.List_ID WHERE ul.User_ID=? AND l.List='Pending'");
    $statement->execute([$userId]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Users');
    return $results;
}

function getAcceptedList($userId){
    global $pdo;
    $statement = $pdo->prepare("SELECT Profile_Picture, Username FROM Users u "
            . "INNER JOIN User_Lists ul ON ul.Recipient_ID=u.User_ID INNER JOIN "
            . "Lists l ON l.List_ID=ul.List_ID WHERE u.User_ID=? AND l.List='Added'");
    $statement->execute([$userId]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Users');
    return $results;
}

function changePassword($newPass){
    $query = "UPDATE Users SET `Password`=? WHERE `User_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$newPass->password ,$newPass->User_ID]);
}

function changeType($newType){
    $query = "UPDATE Users SET `Type`=? WHERE `User_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$newType->Type ,$newType->User_ID]);
}

function changeOccupation($newOccupation){
    $query = "UPDATE Users SET `Occupation`=? WHERE `User_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$newOccupation->Occupation ,$newOccupation->User_ID]);
}

function changeBio($newBio){
    $query = "UPDATE Users SET `Biography`=? WHERE `User_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$newBio->Biography ,$newBio->User_ID]);
}

function changeName($newName){
    $query = "UPDATE Users SET `Name`=? WHERE `User_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$newName->Name ,$newName->User_ID]);
}

function changeUsername($newUsername){
    $query = "UPDATE Users SET `Username`=? WHERE `User_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$newUsername->Username ,$newUsername->User_ID]);
}

function changeEmail($newEmail){
    $query = "UPDATE Users SET `Email_Address`=? WHERE `User_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$newEmail->Email_Address ,$newEmail->User_ID]);
}

function changePP($data,$newPP){
    $query = "UPDATE Users SET `Profile_Picture`=? WHERE `User_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$data ,$newPP->User_ID]);
}

function follow($userId,$followerId){
    $query = "INSERT INTO User_Followers (`Following`,`User_ID`,`Followers_ID`) VALUES ('Yes',?,?)";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$userId->User_ID,$followerId->User_ID]);
}

function unFollow($userId,$followerId){
    $query = "UPDATE User_Followers SET `Following`='No' WHERE `User_ID`=? AND `Followers_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$userId->User_ID,$followerId->User_ID]);
}

function findFollowing($userId,$followingId){
    $query = "SELECT Following FROM User_Followers WHERE User_ID=? AND Followers_ID=? "
            . "ORDER BY User_Followers_ID DESC LIMIT 1";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$userId->User_ID,$followingId->User_ID]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'User_Followers');
    return $results;
}

function getMessages($senderId,$recipientId){
    global $pdo;
    $statement = $pdo->prepare("SELECT m.*, u.* FROM Messages m INNER JOIN "
            . "Message_Recipient mr ON mr.Message_ID=m.Message_ID INNER JOIN Users u ON "
            . "u.User_ID=m.Creator_ID WHERE m.Creator_ID=? AND mr.Reciever_ID=? OR m.Creator_ID=? "
            . "AND mr.Reciever_ID=? ORDER BY m.Message_ID ASC");
    $statement->execute([$senderId,$recipientId,$recipientId,$senderId]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Messages');
    return $results;
}

function sendMessage($messageId,$message,$enquiry,$parentId,$senderId){
    $query = "INSERT INTO Messages (`Message_ID`,`Message`,`Enquiry`,`Parent_Message_ID`, `Creator_ID`) VALUES (?,?,?,?,?)";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$messageId,$message,$enquiry,$parentId,$senderId]);
}

function findMessageId(){
    $query = "SELECT m.Message_ID FROM Messages m ORDER BY m.Message_ID DESC LIMIT 1";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Messages');
    return $results;
}

function findParentId($senderId,$recipientId){
    $query = "SELECT mr.Message_ID FROM Message_Recipient mr INNER JOIN Messages m "
            . "ON m.Message_ID=mr.Message_ID WHERE m.Creator_ID=? AND "
            . "mr.Reciever_ID=? OR m.Creator_ID=? AND mr.Reciever_ID=? ORDER BY "
            . "m.Message_ID ASC LIMIT 1";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$senderId,$recipientId,$recipientId,$senderId]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Message_Recipient');
    return $results;
}

function saveMessage($messageId,$recipientId){
    $query = "INSERT INTO Message_Recipient (`Message_ID`, `Reciever_ID`) VALUES (?,?)";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$messageId,$recipientId]);
}

function uploadPost($data,$caption,$date,$userId){
    $query = "INSERT INTO Posts (`Picture`, `Caption`, `Date`, `User_ID`) VALUES (?,?,?,?)";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$data,$caption,$date,$userId]);
}

function saveComment($comment){
    $query = "INSERT INTO Comments (`Comment`, `Date`, `User_ID`, `Post_ID`) VALUES (?,?,?,?)";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$comment->Comment,$comment->Date,$comment->User_ID,$comment->Post_ID]);
}

function getComments($post){
    $query = "SELECT c.*, u.Profile_Picture FROM Comments c INNER JOIN Users u ON "
            . "u.User_ID=c.User_ID WHERE Post_ID=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$post->Post_ID]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Comments');
    return $results;
}

function getPostsCount($profileId){
    $query = "SELECT COUNT(Post_ID) FROM Posts WHERE User_ID=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$profileId->User_ID]);
    $results = $statement->fetchAll(PDO::FETCH_NUM);
    return $results;
}

function getFollowersCount($profileId){
    $query = "SELECT COUNT(User_ID) FROM User_Followers WHERE Followers_ID=? AND Following='Yes'";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$profileId->Followers_ID]);
    $results = $statement->fetchAll(PDO::FETCH_NUM);
    return $results;
}

function getFollowingCount($profileId){
    $query = "SELECT COUNT(Followers_ID) FROM User_Followers WHERE User_ID=? AND Following='Yes'";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$profileId->User_ID]);
    $results = $statement->fetchAll(PDO::FETCH_NUM);
    return $results;
}

function addUserLists($userList){
    $query = "INSERT INTO User_Lists (`User_ID`,`List_ID`,`Recipient_ID`) VALUES (?,?,?)";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$userList->User_ID,$userList->List_ID,$userList->Recipient_ID]);
}

function changeUserLists($userList){
    $query = "UPDATE User_Lists SET `List_ID`=? WHERE `User_ID`=? AND `Recipient_ID`=?";
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute([$userList->List_ID,$userList->Recipient_ID,$userList->User_ID]);
}