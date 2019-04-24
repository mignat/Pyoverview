<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: http://$_SERVER[HTTP_HOST]/lib/login.php"); /* Redirect browser */
    exit();
    }
    if ($_SESSION['privileges'] != 1) {
        #include("../error.php?errortype=Access_denied");
        header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
        exit();
    }
require_once("lib/sqlQuery.php");
$user_list = sqlexec("SELECT * FROM `pyover_users`");
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

?>
<div class="container">
    <div class="container-fluid">
        <?php include("settings-ui-users-add.php"); ?>
        <?php echo $_SESSION['permissions']; ?>
    </div>
    <hr class='my-4'>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
    <table class="table table-hover align-content-center" align="center">
        <thead class="thead-dark">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">USERNAME</th>
            <th scope="col">NAME</th>
            <th scope="col">TYPE</th>
            <th scope="col">OPTIONS</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        foreach ($user_list as $row) {
            switch ($row['privileges']) {
                case 1:
                    $user_type = "Admin";
                    break;
                case 0:
                    $user_type = "Viewer";
                    break;
                default:
                    $user_type = "Unknown";
                    break;
            }
            echo "<tr scope=\"row\">
							<td>{$no}</td>
							<td>{$row['username']}</td>
							<td>{$row['full_name']}</td>
							<td>{$user_type}</td>
							<td class='user_options'>
							<div class='btn-group' role='group'>
							    <div><a class='btn btn-primary btn-sm' href=\"viewStation.php.station={$row['name']}\">View</a> </div>
							    <div><a class='btn btn-primary btn-sm' href=\"editStation.php?station={$row['name']}\">Edit</a></div>
							    <div><button type=\"button\" class=\"btn btn-danger btn-sm\" data-container=\"body\" data-toggle=\"popover\" data-trigger=\"focus\" data-placement=\"right\" data-html=\"true\" title=\"<b>Are you sure ?</b>\" data-content=\"<div><a class='btn btn-danger btn-sm btn-block' href= '/lib/be_users.php?delete={$row['username']}' >Confirm</a></div>\">Remove</button></div>
							    </div>
                            </td>
						</tr>";
            $no++;
        } ?>
        </tbody>
        <tfoot>
        <tr>
        </tr>
        </tfoot>
    </table>
</div>