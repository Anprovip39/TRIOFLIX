<?php
include_once "database.php";
function getAllGenre()
{
    $sql = "SELECT film.*, category.catagory_name, category.img AS category_img, COUNT(*) AS count 
    FROM film 
    INNER JOIN category ON film.category_id = category.category_id 
    GROUP BY category.category_id";
    return pdo_query($sql);
}
function getGenre()
{
    $sql = "SELECT * from category";
    return pdo_query($sql);
}
function getAllFilm()
{
    $sql = "SELECT film.*,category.catagory_name,actor.actor_name,director.director_name FROM film INNER JOIN category
    ON film.category_id = category.category_id INNER JOIN actor
    ON film.actor_id = actor.actor_id INNER JOIN director
    ON film.director_id = director.director_id limit 15";
    return pdo_query($sql);
}
function getTopFilm()
{
    $sql = "SELECT film.*,category.catagory_name,actor.actor_name,director.director_name FROM film INNER JOIN category
    ON film.category_id = category.category_id INNER JOIN actor
    ON film.actor_id = actor.actor_id INNER JOIN director
    ON film.director_id = director.director_id ORDER BY views DESC limit 15";
    return pdo_query($sql);
}
function getNewFilm()
{
    $sql = "SELECT film.*,category.catagory_name,actor.actor_name,director.director_name FROM film INNER JOIN category
    ON film.category_id = category.category_id INNER JOIN actor
    ON film.actor_id = actor.actor_id INNER JOIN director
    ON film.director_id = director.director_id ORDER BY posted_date DESC limit 15";
    return pdo_query($sql);
}
function getFilm($id)
{
    $sql = "SELECT film.*,category.catagory_name,actor.actor_name,director.director_name FROM film INNER JOIN category
    ON film.category_id = category.category_id INNER JOIN actor
    ON film.actor_id = actor.actor_id INNER JOIN director
    ON film.director_id = director.director_id WHERE film_id = $id";
    return pdo_query($sql);
}
function getAllFilmByIdGenre($id, $release_year)
{
    $sql = "SELECT film.*,category.catagory_name,actor.actor_name,director.director_name FROM film INNER JOIN category
    ON film.category_id = category.category_id INNER JOIN actor
    ON film.actor_id = actor.actor_id INNER JOIN director
    ON film.director_id = director.director_id WHERE 1";
    $params = [];

    // Điều kiện lọc theo thể loại
    if (!empty($id)) {
        $sql .= " AND film.category_id = :category_id";
        $params[':category_id'] = $id;
    }

    // Điều kiện lọc theo năm phát hành
    if (!empty($release_year)) {
        $sql .= " AND film.relase_year = :relase_year";
        $params[':relase_year'] = $release_year;
    }
    return pdo_query($sql, $params);
}
function slider()
{
    $sql = "SELECT film.*,category.catagory_name,actor.actor_name,director.director_name FROM film INNER JOIN category
    ON film.category_id = category.category_id INNER JOIN actor
    ON film.actor_id = actor.actor_id INNER JOIN director
    ON film.director_id = director.director_id ORDER BY posted_date DESC LIMIT 5";
    return pdo_query($sql);
}
function getPackage()
{
    $sql = "SELECT * from pack";
    return pdo_query($sql);
}
function searchFilms($keyword)
{
    $keyword = "%" . addslashes($keyword) . "%";

    $sql = "SELECT 
                film.*,
                category.catagory_name,
                actor.actor_name,
                director.director_name
            FROM film
            INNER JOIN category ON film.category_id = category.category_id
            INNER JOIN actor ON film.actor_id = actor.actor_id
            INNER JOIN director ON film.director_id = director.director_id
            WHERE film.film_name LIKE ? 
               OR actor.actor_name LIKE ? 
               OR director.director_name LIKE ?
               OR category.catagory_name LIKE ?";
    return pdo_query($sql, [$keyword, $keyword, $keyword, $keyword]);
}
