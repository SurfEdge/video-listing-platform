<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<?php $this->load->view('template/head.php'); ?>

		<?php $this->load->view('template/sidebar.php'); ?>
    <div id="page-wrapper">
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">Add New Author</h1>
					</div>
					<!-- /.col-lg-12 -->
			</div>
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
                        <?php echo form_open_multipart('author/add'); ?>
                            <fieldset>
                                <div class="form-group">
																		<label>Full Name</label>
                                    <input class="form-control" placeholder="Name" name="name" type="text" autofocus>
                                </div>
                                <div class="form-group">
																		<label>Description</label>
                                    <textarea class="form-control" placeholder="Description" name="description" value=""></textarea>
                                </div>
                                <div class="form-group">
																		<label>Author Image</label>
                                    <input type="file" name="image"></input>
                                </div>
                                <button type="submit" name="submit" class="btn btn-md btn-success">Submit</button>
                            </fieldset>
                        </form>
											</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div>

<?php $this->load->view('template/footer_scripts.php'); ?>
