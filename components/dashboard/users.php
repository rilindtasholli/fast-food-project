<div id="users" class="table">
            <h1 class="usersTitle">Users</h1>
            <table class="t01">
                
                    <tr class="th">
                        <td>ID</td>
                        <td>Full Name</td>
                        <td>Email</td>
                        <!--<td>Details</td>-->
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                
                <tbody>
                    <?php
                    foreach ($userList as $user) {
                    ?>
                        <tr>
                            <td><?php echo $user['usr_ID']; ?></td>
                            <td><?php echo $user['usr_fullname']; ?></td>
                            <td><?php echo $user['usr_email']; ?></td>
                            <!--<td><a class="detailsButton" href=<?php echo "../businessLogic/detailsUser.php?id=" . $user['usr_ID']; //to be continued by students
                                        ?>>Details</a></td>-->
                            <td><a class="editButton" href=<?php echo "../pages/Edit-User.php?id=" . $user['usr_ID'];
                                        ?>>Edit</td>
                            <td><a class="removeButton" href=<?php echo "../backend/deleteUser.php?id=" . $user['usr_ID'];
                                        ?>>Delete</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>