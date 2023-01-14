<?php include_once 'classes/Student.php'; ?>
                        <?php
                            $stdn = new Student();
                            $cnt = $stdn->totalCount();
                            $count = $cnt->rowCount();

                            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
                                $search = $_GET['search'];
                            }
                         ?>
                    <nav class="navbar navbar-default" style="margin-bottom: 5px;">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="dashbord.php">SM</a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="add-student.php">Add Student</a></li>
                                    <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add New <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="add-batch.php">Add Betch</a></li>
                                            <li><a href="batch.php">View Betch</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="add-course.php">Add Course</a></li>
                                            <li><a href="course.php">View Course</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="add-instractor.php">Add Instractor</a></li>
                                            <li><a href="instractor.php">View Instractor</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="student.php">Student <span class="badge"><?php echo $count; ?></span></a></li>
                                </ul>
                                <form action="search.php" method="GET" class="navbar-form navbar-left">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="search" placeholder="Student Search" value="<?php if (isset($search)) { echo $search; } ?>">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="password-reset.php">Password Change</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>