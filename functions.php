<?php
include 'db_connection.php';

if(isset($_POST['action'])) {
    $action = $_POST['action'];

    switch($action) {
        case 'get':
            getDados();
            break;
        case 'add':
            addDados($_POST['dataDia'], $_POST['tempMax'], $_POST['tempMin'], $_POST['volumeMm']);
            break;
        case 'delete':
            deleteDados($_POST['id']);
            break;
        case 'update':
            updateDados($_POST['id'], $_POST['dataDia'], $_POST['tempMax'], $_POST['tempMin'], $_POST['volumeMm']);
            break;
        default:
            break;
    }
}

function getDados() {
    global $conn;
    $sql = "SELECT * FROM dados";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td class='estado'>{$row['estado']}</td>
                    <td>
                        <button class='editDados' data-id='{$row['id']}'>Edit</button>
                        <button class='deleteDados' data-id='{$row['id']}'>Delete</button>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No data found</td></tr>";
    }
}

function addDados($dataDia, $tempMax, $tempMin, $volumMm) {
    global $conn;
    $sql = "INSERT INTO dados () VALUES ('$dataDia', '$tempMax', '$tempMin', '$volumMm')";
    $conn->query($sql);
}

function deleteDados($id) {
    global $conn;
    $sql = "DELETE FROM dados WHERE id='$id'";
    $conn->query($sql);
}

function updateDados($id, $dataDia, $tempMax, $tempMin, $volumMm) {
    global $conn;
    $sql = "UPDATE dados SET dataDia='$dataDia', tempMax='$tempMax', tempMin='$tempMin', volumeMm='$volumeMm' WHERE id='$id'";
    $conn->query($sql);
}
?>
