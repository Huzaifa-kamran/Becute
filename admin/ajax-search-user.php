<?php
include "config.php";
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script> window.location.href = 'adminlogin.php' </script>";
}

$searchUser = $_POST['searchUser'];

$users = "SELECT * FROM `users` WHERE `userName` LIKE '%$searchUser%'";
$res = mysqli_query($conn, $users);

$output = "";

if (mysqli_num_rows($res) > 0) {
    $output .= '<table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>';

    $count = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $count += 1;
        $output .=  '<tr>
                        <th scope="row">' . $count . '</th>
                        <td>' . $row['userName'] . '</td>
                        <td>' . $row['userContact'] . '</td>
                        <td>' . $row['userEmail'] . '</td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fadeIn animated bx bx-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="delete-userduct.php?delid=' . $row['userID'] . '"><i class="bx bx-trash me-1"></i> Delete</a></li>
                                    <li><a class="dropdown-item" href="update-userduct.php?updateid=' . $row['userID'] . '"><i class="bx bx-edit me-1"></i>Edit</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>';
    }

    $output .= '</tbody>
            </table>';
    echo $output;
} else {
    $output .= "<h5 class='ms-5 ps-4'>No Result Found</h5>";
    echo $output;
}
?>
