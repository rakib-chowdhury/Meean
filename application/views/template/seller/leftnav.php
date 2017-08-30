<?php
//echo "<pre>";
//print_r($this->session);
//die;
?>


<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <div id="sidebar" class="sidebar                  responsive">
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {
            }
        </script>


        <ul class="nav nav-list">
            
<?php
            if ($this->session->userdata('type') == 2) {///iti
            
                ?>
               <!-- <li class="active">
                <a href="seller">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li> -->
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
                        Products
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="seller/all_product">
                            <i class="menu-icon fa fa-caret-right"></i>
                            All Products
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="seller/add_product">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Add Product
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>
 <?php }
            if ($this->session->userdata('type') == 3) {///iti
            
                ?>

            <!-- <li class="active">
                <a href="buyer">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li> -->
<li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
                        Products
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="buyer/all_product">
                            <i class="menu-icon fa fa-caret-right"></i>
                            All Products
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="buyer/add_product">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Add Product
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>


            <?php }
            if ($this->session->userdata('type') == 4) {///iti
            
                ?>
             <!--    <li class="active">
                <a href="market">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li> -->
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-desktop"></i>
                        <span class="menu-text">
                            Market Place
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="market/all_market_product">
                                <i class="menu-icon fa fa-caret-right"></i>
                                All Marketplace
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="market/add_market_place_product">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add Marketplace
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>

            <?php } ?>






        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {
            }
        </script>
    </div>
