<?php $page_title = 'Student Profile'; include_once 'inc/header.php'; ?>
<?php include_once 'classes/Student.php'; ?>
<?php if (isset($_SESSION['id'])) : ?>
    <div class="panel-body">
        <?php
            if (isset($_GET['id'])) :
                $id = $_GET['id'];
                $std = new Student();
                $res = $std->studentById($id);
         ?>
        <div class="col-sm-3 text-center">
            <img src="assets/img/<?php echo $res['image']; ?>" style="margin-top: 40px;" class="img-thumbnail" alt="Profile" width="100%">
            <br><br>
            <a href="<?php echo $res['facebook']; ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-link"></span></a>
            <a href="student-edit.php?id=<?php echo $res['id']; ?>" class="btn btn-default">Profile Edit</a>
        </div>
        <div class="col-sm-9">
            <fieldset>
                <legend style="border-bottom: none;margin-bottom: 10px;">Personal Info</legend>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Student Name: </td>
                            <td><?php echo $res['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Father's Name: </td>
                            <td><?php echo $res['fname']; ?></td>
                        </tr>
                        <tr>
                            <td>Gender: </td>
                            <td><?php echo $res['gender']; ?></td>
                        </tr>
                        <tr>
                            <td>Bath of Birth: </td>
                            <td><?php echo $res['dob']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone NO.: </td>
                            <td><?php echo $res['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Skype ID: </td>
                            <td><?php echo $res['skype']; ?></td>
                        </tr>
                        <tr>
                            <td>Email ID: </td>
                            <td><?php echo $res['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Present Address: </td>
                            <td><?php echo $res['preaddress']; ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td>Permanent Address: </td>
                            <td><?php echo $res['paraddress']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset>
                <legend style="border-bottom: none;margin-bottom: 10px;">Course Info</legend>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Batch NO.: </td>
                            <td><?php echo $res['batch']; ?></td>
                        </tr>
                        <tr>
                            <td>Student ID: </td>
                            <td><?php echo $res['sid']; ?></td>
                        </tr>
                        <tr>
                            <td>Course Start: </td>
                            <td><?php echo $res['cstart']; ?></td>
                        </tr>
                        <tr>
                            <td>Course End: </td>
                            <td><?php echo $res['cend']; ?></td>
                        </tr>
                        <tr>
                            <td>Course Name: </td>
                            <td>
                            <?php $sql = "SELECT * FROM courses";
                                $result = $stdn->viewStudent($sql);
                                while ($row = $result->fetch(PDO::FETCH_OBJ)) : ?>

                                <?php if ($res['courses'] == $row->id) {
                                    echo $row->name;
                                }; ?>

                                <?php endwhile; ?>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td>Payment: </td>
                            <td>৳ <?php echo $res['payment']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
        <?php else: header('location: login.php'); endif; ?>
    </div>
<?php include_once 'inc/footer.php'; ?>
<?php else: header('location: login.php'); endif;  ?>