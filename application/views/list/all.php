<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>

<?php $this->load->view('template/head.php'); ?>

<div id="wrapper">

    <?php $this->load->view('template/sidebar.php'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Current Lists</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Existing lists
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Author</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($lists as $list) {
                                            echo "<tr>";
                                            echo "<td>".$list->id."</td>";
                                            echo "<td><h5>".$list->title."</h5></td>";
                                            echo '<td><img width="250px" src="'.base_url('uploads/lists/'.$list->cover_image).'" alt=""></td>';
                                            echo "<td>AA</td>";
                                            echo '<td><a href="lists/view/'.$list->id.'" type="button" class="btn btn-success">View List</a></td>';
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php $this->load->view('template/footer_scripts.php'); ?>