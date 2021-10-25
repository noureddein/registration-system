<?php
session_start();
include 'connection.php';
?>
<?php
$search_query = $_POST['search_query'];
$search_by_list = $_POST['search_by_list'];
echo "
<table class='table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Gender</th>
                        <th colspan='2'>Action</th>
                    </tr>
                </thead>

";

if ($search_query != '') {
    $users_query = "CONCAT(first_name,last_name,email) LIKE '%$search_query%';";
    print_table_data($users_query, $conn);

} elseif ($search_by_list == 'male' || $search_by_list == 'female') {
    $users_query = "gender = '$search_by_list';";
    print_table_data($users_query, $conn);
} elseif ($search_query == '') {
    $users_query = "user_type = 'user';";
    print_table_data($users_query, $conn);
}

function print_table_data($query, $conn)
{
    $users_query = "SELECT * FROM users WHERE " . $query;
    $users_results = mysqli_query($conn, $users_query);
    $users_data = mysqli_fetch_all($users_results);
    if (count($users_data) == 0) {
        echo "<td colspan='7' style='text-align: center;' >No Records</td>";
    } else {
        foreach ($users_data as $values) {
            echo "<tr>
        <td>$values[0]</td>
        <td>$values[1]</td>
        <td>$values[2]</td>
        <td>$values[3]</td>
        <td>$values[5]</td>
        <td>$values[6]</td>
        <td><button name='delete' onclick='deleteUser($values[0])' class='btn btn-danger  delete'>Delete User</button></td>
        <td><button name='edit'  onclick='fetchData($values[0])' class='btn btn-secondary edit' data-target='#dialog_box' data-toggle='modal'>Edit User</button></td>
        </tr>";
        }
    }
    echo "</table>";
}
