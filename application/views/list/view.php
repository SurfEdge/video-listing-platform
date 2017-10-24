<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>
<?php $this->load->view('template/head.php'); ?>

<div id="wrapper">

    <?php $this->load->view('template/sidebar.php'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><small># <?php echo $list->id?> </small><?php echo $list->title; ?> by <?php echo $author->name;?></h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Current Videos
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>YouTube ID</th>
                                        <th>Actions</th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($videos as $video) {
                                            echo "<tr>";
                                            echo "<td>".$video->position."</td>";
                                            echo "<td>".$video->title."</td>";
                                            echo "<td>".$video->youtube_id."</td>";
                                            echo "<td>
                                                    <button class='btn btn-success'>Edit</button>&nbsp;
                                                    ".form_open('lists/delete_video')."
                                                    <input name='video_id' value='".$video->id."' hidden/>
                                                    <input name='list_id' value='".$list->id."' hidden/>
                                                    <button class='btn btn-danger'>Delete</button></form></td>";
                                            echo "</form>";
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

            <div class="col-lg-6">
                <?php echo validation_errors(); ?>

                <?php echo form_open_multipart( 'lists/add_video');?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Add Videos to list
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <form role="form">

                                     <input style="display: none;" value="<?php echo $list->id;?>" class="form-control" id="list_id" name="list_id" >
                                        <div class="form-group">
                                            <label>Position</label>
                                            <input type="number" class="form-control" id="position" name="position" placeholder="Enter position of the video in the group">
                                        </div>
                                         <div class="form-group">
                                            <label>Video Title</label>
                                            <input class="form-control" id="title" name="title" placeholder="Enter Title">
                                        </div>
                                        <div class="form-group">
                                            <label>YouTube Video ID</label>
                                            <input class="form-control" id="youtube_id" name="youtube_id" placeholder="Enter Video ID only">
                                        </div>
                            <button type="submit" class="btn btn-success">Add Video</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Cover Photo
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <img width="100%" src="<?php echo base_url('uploads/lists/'.$list->cover_image); ?>" alt="">
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
                        <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                       Description
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <p><?php echo $list->description;?></p>
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