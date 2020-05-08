<?php require_once '../Controller/sidebarController.php'; ?>
<script>
     // wait for the DOM to be loaded
     $(function() {
       // bind 'myForm' and provide a simple callback function
       $('#list').ajaxForm(function() {
           alert("Thank you for your comment!");
       });
     });
   </script>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <form id="list" method="post">
        <input type="submit" name="maybe" value="Maybe" /><input type="submit" name="accepted" value="Accepted" />
    </form>
    <?php
    if (isset($_SESSION['userId'])):
        if (!empty($list)):
            foreach ($list as $maybe):
                $m = $maybe->Profile_Picture;
                if (empty($m)):
                    ?>
                    <div><img src="../images/profile-pic.png" style="width: 40px;"/></div>
                    <div><?= $maybe->Username ?></div>
                    <?php
                else:
                    ?>
                    <table class="table table-hover">
                        <tr><a href="../View/messaging.php?recipient_id=<?=$maybe->User_ID?>">
                            <td><img src="data:image/png;base64,<?= base64_encode($maybe->Profile_Picture) ?>" alt="profile-pic" id="pic-side" onerror="this.src='../images/profile-pic.png';"/></td>
                        <td><?= $maybe->Name ?>
                        <br><?= $maybe->Username ?></td>
                        </a></tr>
                    </table>
                <?php
                endif;
            endforeach;
        else:
            ?>
            <p>Nothing to show.</p>
        <?php
        endif;
    else:
        ?>
        <p>Sign in to access lists.</p>
    <?php endif ?>
</div>
<script src="../js/sidebarScript.js"></script> 