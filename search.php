<?php $page_title = 'Search'; include_once 'inc/header.php'; ?>
<?php include_once 'classes/Student.php'; ?>
<?php if (isset($_SESSION['id'])) : ?>
<?php 
    $stdn = new Student();
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
        $stdnSer = $stdn->search($_GET['search']);
    }
 ?>
    <div class="panel-body">
    <?php if ($_GET['search'] && $stdnSer->fetch()): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            while ($row = $stdnSer->fetch(PDO::FETCH_OBJ)) : ?>
                <tr>
                    <th><?php echo $i++; ?></th>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->phone; ?></td>
                    <td><a href="student-profile.php?id=<?php echo $row->id; ?>" class="btn btn-default btn-xs">View Details</a></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: echo '<div class="alert alert-danger text-center">No Result Found</div>'; ?>
        <?php endif ?>
    </div>
<?php include_once 'inc/footer.php'; ?>
<?php else: header('location: login.php'); endif;  ?>