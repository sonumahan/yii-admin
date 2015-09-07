<?php
use yii\bootstrap\Nav;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Content</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/page']) ?>"><span class="fa fa-file-code-o"></span>Manage Pages</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Redirects</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Campaign Pages</a>
                    <li><a href="<?= \yii\helpers\Url::to(['/landingpage']) ?>"><span class="fa fa-dashboard"></span> Manage Landing Pages</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Stories</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Donation Forms</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Edge Page Slide</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Edge Bottom PDFS</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Edge Right PDFS</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Homepage Slides</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Comments</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Team Page</a>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-dashboard"></span> Manage Board Page</a>
                    </li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Activity</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Trips</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Volunteer Applications</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage User Messages</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Admin Massages</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Blog</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Blog Groups</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Resources</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Memebers</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/partner']) ?>"><span class="fa fa-file-code-o"></span>Manage Partners</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['/volunteer']) ?>"><span class="fa fa-file-code-o"></span>Manage Volunteers</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['/grant']) ?>"><span class="fa fa-file-code-o"></span>Manage Grant Recipients</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Volunteer Responses</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['/rating']) ?>"><span class="fa fa-file-code-o"></span>Manage Partners Ratings</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Financial</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Donations</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Transfers</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Finance</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Manage Receipts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Applications</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Review Partner Applications</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Volunteer Grant Applications</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Archieved Partner Applications</a></li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Logs</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>Download Logs</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['#']) ?>"><span class="fa fa-file-code-o"></span>View Email Logs</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="/admin/edge">
                    <i class="fa fa-share"></i> <span>EdGE</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Help</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Volunteer Bulk Upload</span>
                </a>
            </li>
        </ul>

    </section>

</aside>
