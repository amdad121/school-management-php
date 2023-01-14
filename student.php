<?php $page_title = 'All Student'; include_once 'inc/header.php'; ?>
<?php include_once 'classes/Student.php'; ?>
<?php if (isset($_SESSION['id'])) : ?>
    <div class="panel-body">
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
            <?php
                $stdn = new Student();

                $query = "SELECT * FROM students";

                //Pagination
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3;

                $sql = $stdn->pagi($query, $page, $perpage);

                $res = $stdn->viewStudent($sql);

                $pages = $stdn->pagination($query, $perpage);

                while ($row = $res->fetch(PDO::FETCH_OBJ)) :
             ?>
                <tr>
                    <th><?php echo /*$i++*/ $row->id; ?></th>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->phone; ?></td>
                    <td><a href="student-profile.php?id=<?php echo $row->id; ?>" class="btn btn-default btn-xs">View Details</a></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>

        <nav class="text-center" aria-label="Page navigation">
          <ul class="pagination pagination-sm" style="margin: 0;">
            <li style="<?php if ($page == 1) {echo "display: none;";} ?>">
              <a href="?page=<?php if ($page <= $pages) {echo $page - 1;} ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php for ($i=1; $i <= $pages; $i++) : ?>
            <li class="<?php if ($page === $i) {echo "active";} ?>"><a href="<?php echo '?page='.$i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <li style="<?php if (!($page < $pages)) {echo "display: none;";} ?>">
              <a href="?page=<?php if ($page < $pages) {echo $page + 1;} ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>

<?php include_once 'inc/footer.php'; ?>
<?php else: header('location: login.php'); endif;  ?>