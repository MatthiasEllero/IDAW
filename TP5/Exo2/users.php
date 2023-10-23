<?php
require_once("init_pdo.php");
function get_users($db)
{
    $sql = "SELECT * FROM USERS";
    $exe = $db->query($sql);
    $res = $exe->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function insert_user($db, $name, $email)
{
    $sql = "INSERT INTO USERS (name, email) VALUES (:name, :email)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    try {
        $stmt->execute();

        return $db->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

function delete_user($db, $id)
{
    $sql = "DELETE FROM USERS WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        return true; // Succès de la suppression
    } catch (PDOException $e) {
        return false; // Erreur lors de la suppression
    }
}

function setHeaders()
{
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json; charset=utf-8');
}

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $result = get_users($pdo);
        setHeaders();
        exit(json_encode($result));
    case 'POST':
        $result = insert_user($pdo, $_POST['name'], $_POST['email']);
        if ($result !== false) {
            http_response_code(201);
            exit(json_encode($result));
        } else {
            http_response_code(500);
        }
    case 'DELETE':
        $id = $_GET['id']; // Récupérez l'ID de l'enregistrement à supprimer
        $result = delete_user($pdo, $id);

        if ($result !== false) {
            http_response_code(200); // OK
            exit(json_encode(['status' => 'success', 'message' => 'Enregistrement supprimé avec succès.']));
        } else {
            http_response_code(500); // Erreur serveur
            exit(json_encode(['status' => 'error', 'message' => 'Erreur lors de la suppression de l\'enregistrement.']));
        }
        break;
}
