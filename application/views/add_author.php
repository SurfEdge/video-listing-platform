<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<?php $this->load->view('template/head.php'); ?>

		<?php $this->load->view('template/sidebar.php'); ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-5">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Author</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('author/add'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Description" name="description" value=""></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" placeholder="Image" name="image" value=""></input>
                                </div>
                                <button type="submit" name="submit" class="btn btn-md btn-success">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('template/footer_scripts.php'); ?>
