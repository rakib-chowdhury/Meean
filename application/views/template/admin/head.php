<body class="no-skin">

    <div id="navbar" class="navbar navbar-default">
        <script type="text/javascript">
            try {
                ace.settings.check('navbar', 'fixed')
            } catch (e) {
            }
        </script>

        <div class="navbar-container" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <div class="navbar-header pull-left">
                <a href="market_place">

                    <img style="height:100%;width:150px" src="uploads/<?= $logo_info->logo; ?>" alt="logo">

                </a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="light-blue">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <!--<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />-->
                            <span class="user-info">
                                <small>Welcome,</small>
                                Admin
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a data-toggle="modal" data-target="#change_password">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Change Password
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="login/logout">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.navbar-container -->
    </div>