<?php
session_start();
function addUser($email, $firstName, $lastName, $password) {
    //TODO: refactor user db
    $userId = 1;
    $usersDb = fopen("db/users.db", "a+");
    if($usersDb) {
        fseek($usersDb, 0);
        while(!feof($usersDb)) {
            $userId++;
            fgets($usersDb);
        }
    }
    fseek($usersDb, 0, SEEK_END);
<<<<<<< HEAD
    $line = json_encode([
=======

    $user = [
>>>>>>> 90b3c3c76bc70cc0b04efdd7678183602f6f7774
        'id' => $userId,
        'email' => $email,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'password' => sha1( $password ),
<<<<<<< HEAD
    ]);
=======
    ];
    $line = json_encode($user);

>>>>>>> 90b3c3c76bc70cc0b04efdd7678183602f6f7774
    if($usersDb) {
        fwrite($usersDb, $line . PHP_EOL);
        fclose($usersDb);
        return $user;
    }
    return false;
}
function userExist($email) {
    //TODO: refactor user db
    $usersDb = fopen("db/users.db", "r");
    if(!$usersDb) {
        return false;
    } else {
        while(!feof($usersDb)) {
            $line = fgets($usersDb);
            if($line) {
                $line = json_decode($line, true);
                if($email == $line['email']) {
                    fclose($usersDb);
                    return true;
                }
            }
        }
        fclose($usersDb);
        return false;
    }
}
function checkUser($email, $password) {
    $password = sha1($password);
    //TODO: refactor user db
    $usersDb = fopen("db/users.db", "r");
    if(!$usersDb) {
        return false;
    } else {
        while(!feof($usersDb)) {
            $line = fgets($usersDb);
            if($line) {
                $line = json_decode($line, true);
                if(
                    $line["email"] == $email &&
                    $line["password"] == $password
                ) {
                    fclose($usersDb);
                    return $line;
                }
            }
        }
        fclose($usersDb);
        return false;
    }
}
function getUserById($id) {
    //TODO: refactor user db
    $usersDb = fopen("db/users.db", "r");
    if(!$usersDb) {
        return false;
    } else {
        while(!feof($usersDb)) {
            if($line = fgets($usersDb)) {
                $user = json_decode($line, true);
                if($user['id'] == $id) {
                    return $user;
                }
            }
        }
    }
    return false;
}
<<<<<<< HEAD
=======

>>>>>>> 90b3c3c76bc70cc0b04efdd7678183602f6f7774
function addPost($userId, $title, $body, $filePath = false, $fileName = false) {
    $userDb = fopen("db/$userId.db", "a+");

    if(!$userDb) {
        return false;
    }

    $name = false;

    if(
        $filePath &&
        is_uploaded_file($filePath)
    ) {
        $imageInfo = getimagesize($filePath);
        if($imageInfo) {
            $pathInfo = pathinfo($fileName);
            $name = "img_" .
                time() . "." .
                $pathInfo['extension'];
<<<<<<< HEAD
=======

>>>>>>> 90b3c3c76bc70cc0b04efdd7678183602f6f7774
            move_uploaded_file(
                $filePath, "img/" . $name
            );
        }
    }
    fwrite($userDb, json_encode([
<<<<<<< HEAD
            'title' => $title,
            'body' => $body,
            'image' => $name,
            'createdAt' => date("d.m.Y H:i:s"),
        ]) . PHP_EOL);
    fclose($userDb);
    return true;
}
function getPostsCount($userId) {
    $posts = fopen("db/" . $userId . ".db", "r");
    $counter = 0;
    while(!feof($posts)) {
        if(fgets($posts)) {
            $counter++;
        }
    }
    fclose($posts);
    return $counter;
}
function getPostsByUserId($userId, $page = 1) {
    $pageCount = 2;
    $shift = ($page - 1) * $pageCount;
=======
        'title' => $title,
        'body' => $body,
        'image' => $name,
        'createdAt' => date("d.m.Y H:i:s"),
    ]) . PHP_EOL);

    fclose($userDb);
    return true;
}

function getPostsByUserId($userId, $page = 1) {
    $pageCount = 20;
>>>>>>> 90b3c3c76bc70cc0b04efdd7678183602f6f7774
    $posts = fopen("db/" . $userId . ".db", "r");
    $results = [];
    $counter = 0;
    while(!feof($posts) && $counter < $pageCount) {
        if($line = fgets($posts)) {
<<<<<<< HEAD

            $post = json_decode($line, true);
            $results[] = $post;
        }
        $counter++;
    }
=======
            $post = json_decode($line, true);
            $results[] = $post;
        }
    }

>>>>>>> 90b3c3c76bc70cc0b04efdd7678183602f6f7774
    fclose($posts);
    return $results;
}