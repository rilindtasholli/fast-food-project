<div id="messages" class=" table" >
            <h1 class="usersTitle">Messages</h1>
            <table class="t01">
                
                    <tr class="th">
                        <td>ID</td>
                        <td>Full Name</td>
                        <td>Email</td>
                        <td>Subject</td>
                        <td>Message</td>
                        <td>Delete</td>
                    </tr>
                
                <tbody>
                    <?php
                    foreach ($messagesList as $message) {
                    ?>
                        <tr>
                            <td><?php echo $message['msg_ID']; ?></td>
                            <td><?php echo $message['msg_fullname']; ?></td>
                            <td><?php echo $message['msg_email']; ?></td>
                            <td><?php echo $message['msg_subject']; ?></td>
                            <td><?php echo $message['msg_message']; ?></td>
                            <td><a class="removeButton" href=<?php echo "../backend/deleteMessages.php?id=" . $message['msg_ID'];
                                        ?>>Delete</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>