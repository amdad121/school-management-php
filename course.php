<?php $page_title = 'Course'; include_once 'inc/header.php'; ?>
<?php include_once 'classes/Course.php'; ?>
<?php if (isset($_SESSION['id'])) : ?>
    <div class="panel-body">
    <?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];} $_SESSION['msg'] = ''; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $crs = new Course();
                $query = "SELECT * FROM courses";
                //Pagination
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 12;
                $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

                $res = $crs->viewCourse($query, $start, $perpage);
                
                $i = 1;
                while ($row = $res->fetch(PDO::FETCH_OBJ)) :
                ?>
                <tr>
                    <th><?php echo $i++ ?></th>
                    <td><?php echo $row->name; ?></td>
                    <td>
                        <a href="course-edit.php?action=edit&id=<?php echo $row->id; ?>" class="btn btn-success btn-xs">Edit</a> 
                        <a href="?action=delete&id=<?php echo $row->id; ?>" class="btn btn-danger btn-xs">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
<?php include_once 'inc/footer.php'; ?>
<?php else: header('location: login.php'); endif;  ?>