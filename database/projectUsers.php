<?php

function removeAllProjectUsers($dbh,$project_id){
    $stmt = $dbh->prepare('DELETE FROM projectUsers WHERE projectRef = ?');
    $stmt->execute(array($project_id));
    return 0;
}

function insertUserIntoProject($dbh, $userid, $projectid, $permissions){
    $stmt = $dbh->prepare('INSERT INTO projectUsers (projectRef, userRef, permissions) VALUES (?,?,?)');
    $stmt->execute(array($projectid,$userid,$permissions));
}
function setUserPermissions($dbh, $userid, $projectid, $permissions){
    $stmt = $dbh->prepare('UPDATE projectUsers SET permissions = ? WHERE userRef = ? AND projectRef = ?');
    $stmt->execute(array($permissions,$userid,$projectid));
}
function getProjectUsers($dbh, $project_id){
    $stmt = $dbh->prepare('SELECT userRef from projectUsers WHERE projectRef = ?');
    $stmt->execute(array($project_id));
    return $stmt->fetchAll();
}
function getAllProjectsForUser($dbh, $user_id){
    $stmt = $dbh->prepare('SELECT projectRef from projectUsers WHERE userRef = ?');
    $stmt->execute(array($user_id));
    return $stmt->fetchAll();
}
?>