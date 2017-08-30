<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo site_url('admin/index'); ?>">Home</a>
                </li>
                <li class="active">Dashboard</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header" align="center">
                <h1>
                    Eaanstar statistical review
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="page-content">
                        <div class="page-header" align="center">
                            <h1>
                                Eeanstar Viewers
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="space-6"></div>

                            <div class="vspace-12-sm"></div>

                            <div class="col-sm-8 col-md-offset-2">
                                <div class="widget-box">
                                    <div class="widget-header widget-header-flat widget-header-small">
                                        <h5 class="widget-title">
                                            <i class="ace-icon fa fa-signal"></i>
                                            Total Viewers Preview
                                        </h5>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">

                                            <table class="table table-bordered table-responsive">
                                                <thead>
                                                <th style="text-align:center;">Date</th>
                                                <th style="text-align:center;">Today</th>
                                                <th style="text-align:center;">Weekly</th>
                                                <th style="text-align:center;">Monthly</th>
                                                <th style="text-align:center;">Total</th>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr align="center">
                                                        <td><?php echo date('Y-m-d');?></td>
                                                        <td><?php echo $count_viewers?></td>
                                                        <td><?php echo $wk_count_viewers;?></td>
                                                        <td><?php echo $mn_count_viewers;?></td>
                                                        <td><?php echo $total_count_viewers;?></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div><!-- /.widget-box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                    
                    <div class="row">
                        <div class="space-6"></div>
                        <div class="page-header" align="center">
                            <h1>
                                Eeanstar Preview
                            </h1>
                        </div>
                        <div class="vspace-12-sm"></div>

                        <div class="col-sm-8 col-md-offset-2">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Eaanstar Preview
                                    </h5>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">

                                        <table class="table table-bordered">
                                            <thead>
                                            <th style="text-align:center;"><a href="admin/all_user">Total buyer's</a></th>
                                            <th style="text-align:center;"><a href="admin/all_user">Total seller's</a></th>
                                            <th style="text-align:center;"><a href="admin/all_product">Total Product</a></th>
                                            <th style="text-align:center;"><a href="admin/all_trade">Total Trade Show</a></th>
                                            </thead>
                                            <tbody>
                                                <tr align="center">
                                                    <td><a href="admin/all_user"><?= $buyer_user_number; ?></a></td>
                                                    <td><a href="admin/all_user"><?= $seller_user_number; ?></a></td>
                                                    <td><a href="admin/all_product"><?= $product_num; ?></a></td>
                                                    <td><a href="admin/all_trade"><?= $trade_num; ?></a></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row --><br>

                    <div class="page-content">
                        <div class="page-header" align="center">
                            <h1>
                                Market Place statistical review
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="space-6"></div>

                            <div class="vspace-12-sm"></div>

                            <div class="col-sm-8 col-md-offset-2">
                                <div class="widget-box">
                                    <div class="widget-header widget-header-flat widget-header-small">
                                        <h5 class="widget-title">
                                            <i class="ace-icon fa fa-signal"></i>
                                            Market Place Preview
                                        </h5>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">

                                            <table class="table table-bordered">
                                                <thead>
                                                <th style="text-align:center;"><a href="admin/all_user">Total Market Member's</a></th>
                                                <th style="text-align:center;"><a href="admin/market_sponsor">Total Market Sponsor's</a></th>
                                                <th style="text-align:center;"><a href="admin/all_market_product">Total Market Place Product</a></th>
                                                </thead>
                                                <tbody>
                                                    <tr align="center">
                                                        <td><a href="admin/all_user"><?= $market_user_number; ?></a></td>
                                                        <td><a href="admin/market_sponsor"><?= $market_sponsor_number; ?></a></td>
                                                        <td><a href="admin/all_market_product"><?= $market_product_number; ?></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div><!-- /.widget-box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

