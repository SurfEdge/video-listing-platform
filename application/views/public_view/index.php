<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('template/head.php', $title); ?>

<style>
    .glyphicon {
        margin-right: 5px;
    }

    .thumbnail {
        margin-bottom: 20px;
        padding: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
    }

    .item.list-group-item {
        float: none;
        width: 100%;
        background-color: #fff;
        margin-bottom: 10px;
    }

    .item.list-group-item:nth-of-type(odd):hover, .item.list-group-item:hover {
        background: #428bca;
    }

    .item.list-group-item .list-group-image {
        margin-right: 10px;
    }

    .item.list-group-item .thumbnail {
        margin-bottom: 0px;
    }

    .item.list-group-item.caption {
        padding: 9px 9px 0px 9px;
    }

    .row {
        margin-left: auto;
        margin-right: auto;
    }

    .item.list-group-item:nth-of-type(odd) {
        background: #eeeeee;
    }

    .item.list-group-item:before, .item.list-group-item:after {
        display: table;
        content: " ";
    }

    .item.list-group-item img {
        position: relative;
        float: left;
        width: 400px;
        height: 250px;
    }

    .item img {
        position: relative;
        width: 400px;
        height: 250px;
    }

    .item.list-group-item:after {
        clear: both;
    }

    .list-group-item-text {
        margin: 0 0 11px;
    }
</style>

<div id="wrapper">

    <?php $this->load->view('template/sidebar.php'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Current Video Lessons</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="well well-sm">
            <strong>Display</strong>
            <div class="btn-group">
                <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                            class="glyphicon glyphicon-th"></span>Grid</a>
            </div>
        </div>
        <div id="products" class="row list-group list-group-item">
            <?php
            foreach ($videoList as $videoList_item) {
                echo "<div class=\"item list-group-item col-xs-4 col-lg-4\">";
                echo "<div class=\"thumbnail\">";
                echo "<img class=\"group list-group-image\" src=\"" . base_url('./uploads/videolists/' . $videoList_item['cover_image']) . "\" alt=\"\" />";
                echo "<div class=\"caption row\">";
                echo "<h4 class=\"group inner list-group-item-heading\">" . $videoList_item['title'] . "</h4>";
                echo "<p class=\"group inner list-group-item-text\">" . $videoList_item['description'] . "</p>";
                echo "</div></div></div>";
            }
            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<?php $this->load->view('template/footer_scripts.php'); ?>
<script>
    $(document).ready(function () {
        $('#list').click(function (event) {
            event.preventDefault();
            $('#products .item').addClass('list-group-item');
        });
        $('#grid').click(function (event) {
            event.preventDefault();
            $('#products .item').removeClass('list-group-item');
            $('#products .item').addClass('grid-group-item');
        });
    });
</script>


