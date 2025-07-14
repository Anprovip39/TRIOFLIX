<?php
include_once "model/database.php";
function getAllFilm()
{
    $sql = "SELECT film.*,category.catagory_name,actor.actor_name,director.director_name FROM film INNER JOIN category
    ON film.category_id = category.category_id INNER JOIN actor
    ON film.actor_id = actor.actor_id INNER JOIN director
    ON film.director_id = director.director_id order by posted_date desc";
    return pdo_query($sql);
}



function getAllpack()
{
    $sql = "SELECT *from pack";
    return pdo_query($sql);
}

function getAlluser()
{
    $sql = "SELECT *from user";
    return pdo_query($sql);
}

function getAllpurchase()
{
    $sql = "SELECT purchase.*, user.username, pack.pack_name, pack.pack_time 
            FROM purchase 
            INNER JOIN user ON purchase.user_id = user.user_id 
            INNER JOIN pack ON purchase.pack_id = pack.pack_id
            ORDER BY purchase_id";
    return pdo_query($sql);
}

function getAllcomment()
{
    $sql = "SELECT comment.*,film.film_name, user.username FROM comment INNER JOIN film
        ON comment.film_id = film.film_id
        INNER JOIN user
        ON comment.user_id = user.user_id order by time desc";
    return pdo_query($sql);
}

function updatepack($pack_id, $pack_name, $descripe, $price, $pack_time)
{
    $sql = "UPDATE pack SET pack_name = :pack_name, descripe = :descripe,  price = :price, pack_time = :pack_time
    WHERE pack_id = :pack_id";

    return pdo_execute($sql, [
        ':pack_name' => $pack_name,
        ':descripe' => $descripe,
        ':price' => $price,
        ':pack_time' => $pack_time,
        ':pack_id' => $pack_id,
    ]);
}

function addFilm($filmName, $categoryId, $actorName, $directorName, $urlVideo, $duration, $description, $releaseYear, $img, $bgImg)
{

    $director = pdo_query_one("SELECT director_id 
    FROM director WHERE director_name = :name", [':name' => $directorName]);
    if (!$director) {

        $result = pdo_execute("INSERT INTO director (director_name) 
        VALUES (:name)", [':name' => $directorName]);
        if (!$result) {
            return false;
        }

        $director = pdo_query_one("SELECT director_id FROM director 
        WHERE director_name = :name", [':name' => $directorName]);
    }
    $directorId = $director['director_id'];


    $actor = pdo_query_one("SELECT actor_id FROM actor 
    WHERE actor_name = :name", [':name' => $actorName]);
    if (!$actor) {

        $result = pdo_execute("INSERT INTO actor (actor_name) 
        VALUES (:name)", [':name' => $actorName]);
        if (!$result) {
            return false;
        }

        $actor = pdo_query_one("SELECT actor_id FROM actor 
        WHERE actor_name = :name", [':name' => $actorName]);
    }
    $actorId = $actor['actor_id'];


    $result = pdo_execute("INSERT INTO film (film_name, category_id, actor_id, director_id, urlvideo, duration, descripe, relase_year, posted_date, img, bgimg) 
    VALUES (:film_name, :category_id, :actor_id, :director_id, :urlvideo, :duration, :descripe, :relase_year, CURRENT_DATE, :img, :bgimg)", [
        ':film_name' => $filmName,
        ':category_id' => $categoryId,
        ':director_id' => $directorId,
        ':actor_id' => $actorId,
        ':urlvideo' => $urlVideo,
        ':duration' => $duration,
        ':descripe' => $description,
        ':relase_year' => $releaseYear,
        ':img' => $img,
        ':bgimg' => $bgImg
    ]);

    if (!$result) {
        return 'Thêm phim thất bại';
    }

    return 'Thêm phim thành công';
}
function updateFilm($filmId, $filmName, $categoryId, $actorName, $directorName, $urlVideo, $duration, $description, $releaseYear, $img, $bgImg)
{
    // Kiểm tra và thêm đạo diễn nếu chưa tồn tại
    $director = pdo_query_one("SELECT director_id FROM director
     WHERE director_name = :name", [':name' => $directorName]);
    if (!$director) {
        $result = pdo_execute("INSERT INTO director (director_name) 
        VALUES (:name)", [':name' => $directorName]);
        if (!$result) {
            return 'Không thể thêm đạo diễn';
        }
        $director = pdo_query_one("SELECT director_id FROM director 
        WHERE director_name = :name", [':name' => $directorName]);
    }
    $directorId = $director['director_id'];

    // Kiểm tra và thêm diễn viên nếu chưa tồn tại
    $actor = pdo_query_one("SELECT actor_id FROM actor 
    WHERE actor_name = :name", [':name' => $actorName]);
    if (!$actor) {
        $result = pdo_execute("INSERT INTO actor (actor_name) 
        VALUES (:name)", [':name' => $actorName]);
        if (!$result) {
            return 'Không thể thêm diễn viên';
        }
        $actor = pdo_query_one("SELECT actor_id FROM actor WHERE actor_name = :name", [':name' => $actorName]);
    }
    $actorId = $actor['actor_id'];

    // Cập nhật thông tin phim
    $result = pdo_execute("UPDATE film 
                           SET film_name = :film_name, category_id = :category_id, actor_id = :actor_id, director_id = :director_id, 
                               urlvideo = :urlvideo, duration = :duration, descripe = :descripe, relase_year = :relase_year, 
                               img = :img, bgimg = :bgimg 
                           WHERE film_id = :film_id", [
        ':film_name' => $filmName,
        ':category_id' => $categoryId,
        ':actor_id' => $actorId,
        ':director_id' => $directorId,
        ':urlvideo' => $urlVideo,
        ':duration' => $duration,
        ':descripe' => $description,
        ':relase_year' => $releaseYear,
        ':img' => $img,
        ':bgimg' => $bgImg,
        ':film_id' => $filmId
    ]);

    if (!$result) {
        return 'Cập nhật phim thất bại';
    }

    return 'Cập nhật phim thành công';
}
function deleteFilm($idFilm)
{
    $sql = "DELETE FROM film WHERE film_id = :film_id";
    pdo_execute($sql, [
        ':film_id' => $idFilm,
    ]);
}
