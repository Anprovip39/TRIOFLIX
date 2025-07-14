<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteUser($id);
    header("Location: ?ctrl=page&view=user");
    exit;
}
