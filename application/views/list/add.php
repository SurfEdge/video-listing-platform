<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('template/head.php'); ?>

    <div id="wrapper">

		<?php $this->load->view('template/sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create New List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo validation_errors(); ?>

                                    <?php echo form_open_multipart('lists/create'); ?>


                                    <form role="form">
                                        <div class="form-group">
                                            <label>List Title</label>
                                            <input class="form-control" id="title" name="title" placeholder="Enter Title">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Select Author</label>
                                            <select class="form-control" id="author" name="author">

                                                <?php
                                                    foreach ($authors as $author ) {
                                                       echo "<option value=".$author->id.">".$author->name."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Cover Image</label>
                                            <input type="file" name="image" id="image">
                                        </div>

                                        <button type="submit" class="btn btn-success">Submit Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php $this->load->view('template/footer_scripts.php'); ?>
