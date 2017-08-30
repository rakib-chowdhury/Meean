<base href="<?= base_url(); ?>"></base>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>Meeean</title>

    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>


    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css"/>


    <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css"/>


    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>


    <script src="assets/js/ace-extra.min.js"></script>


    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css"/>
    <link rel="stylesheet" href="assets/css/chosen.min.css"/>
    <link rel="stylesheet" href="assets/css/datepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/daterangepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/colorpicker.min.css"/>

    <style>

        .scroll {
            width: 100%;
            max-height: 100px;
            overflow: hidden;
        }

        .scroll:hover {
            width: 100%;
            height: 100%;
            overflow: scroll;
        }

        .scroll::-webkit-scrollbar {
            width: 12px;
        }

        .scroll::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }
    </style>


</head>

<body class="no-skin">

<div id="navbar" class="navbar navbar-default" style="background-color:rgb(66, 202, 146) !important;">
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

                <li class="green">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <!--<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />-->
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?= $get_user_data[0]['reg_first_name']; ?>	
                                </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <!-- <li>
                                <a href="#">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Settings
                                </a>
                        </li>

                        <li>
                                <a href="profile.html">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                </a>
                        </li> -->
                        <li>
                            <a data-toggle="modal" style="cursor:pointer" st data-target="#change_info">
                                <i class="ace-icon fa fa-power-off"></i>
                                Edit Information
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a data-toggle="modal" style="cursor:pointer" data-target="#change_password">
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


    <!-- Modal -->

    <div class="modal fade" id="change_info" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change information</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('market/change_information'); ?>" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="reg_id"
                               value="<?= $get_user_data[0]['reg_id']; ?>">
                        <div class="form-group col-md-6">
                            <label for="pwd">First Name:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_first_name']; ?>"
                                   id="password1" name="reg_first_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Last Name:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_last_name']; ?>"
                                   id="password1" name="reg_last_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Company Name:</label>
                            <input type="text" class="form-control"
                                   value="<?= $get_user_data[0]['reg_company_name']; ?>" id="password1"
                                   name="reg_company_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Company phone:</label>
                            <input type="text" class="form-control"
                                   value="<?= $get_user_data[0]['reg_company_phone']; ?>" id="password1"
                                   name="reg_company_phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">User phone:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_phone']; ?>"
                                   id="password1" name="reg_phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Industry address:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_address']; ?>"
                                   id="password1" name="reg_address">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Industry Name:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['industry_name']; ?>"
                                   id="password1" name="industry_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Profile Image:</label>
                            <input type="file" class="form-control" id="password1" name="userfile">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Company Employee:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['com_employee']; ?>"
                                   id="password1" name="com_employee">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Company Eshtablished:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['com_establish']; ?>"
                                   id="password1" name="com_establish">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Website:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['website']; ?>"
                                   id="password1" name="website">
                        </div>
                        <input type="hidden" name="edit_id" value="<?= $get_user_data[0]['reg_id']; ?>">
                        <input type="hidden" name="profile_img" value="<?= $get_user_data[0]['profile_img']; ?>">

                        <div class="modal-footer">
                            <button type="submit" style="float:left" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">

            </div>
            <?php if ($msg == 'successful') { ?>
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10" style="margin: 0px auto">
                        <div class="jumbotron" style="text-align: center;">
                            <img src="assets/images/ok-icon-12.png" alt="ok"
                                 style="text-align: center; width: 50px; height: 50px;">
                            <h3>Your ad was successfully submitted for review</h3>
                            <p>Please note that it depends on admin of meeeanstar.com</p>
                            <p>You can keep track of your ad through "My ads"</p>

                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                </div>
            <?php } elseif ($msg == 'unsuccessful') { ?>
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10" style="margin: 0px auto">
                        <div class="jumbotron" style="text-align: center;">
                            <img src="assets/images/error.png" alt="ok"
                                 style="text-align: center; width: 50px; height: 50px;">
                            <h3>Your ad was unsuccessful</h3>
                            <p>Please note that it depends on admin of meeeanstar.com</p>
                            <p>You can keep track of your ad through "My ads"</p>

                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                </div>
            <?php } ?>
            <div class="page-header">
                <h1>
                    All Market Product List

                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->


                    <div class="row">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8">

                            <div class="table-header" style="background-color:green">
                                Product List Table
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">SL
                                        </th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th class="hidden-480">Description</th>

                                        <th class="hidden-480">Status</th>

                                        <th class="hidden-480">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $i = 1;
                                    foreach ($all_product_info as $row): ?>
                                        <tr>
                                            <td class="center"><?= $i;
                                                $i++; ?>
                                            </td>

                                            <td>
                                                <a target="_blank"
                                                   href="market_place/market_place_by_sub_category/<?php echo $row->market_place_id ?>"><?= $row->market_place_name; ?></a>
                                            </td>
                                            <td><?= $row->market_place_price; ?></td>
                                            <td class="hidden-480">
                                                <div class="scroll ">
                                                    <?php echo $row->market_place_description; //word_limiter($row->market_place_description, 10); ?>
                                                </div>
                                            </td>
                                            <td class="hidden-480">
                                                <?php if ($row->market_place_is_block == 0) {
                                                    echo '<span class="label label-sm label-success">Active';
                                                } else {
                                                    echo '<span class="label label-sm label-warning">inactive';
                                                } ?></span>
                                            </td>

                                            <td>
                                                <div class="hidden-sm hidden-xs action-buttons">
                                                    <a class="green"
                                                       href="market/edit_market_product/<?= $row->market_place_id; ?>">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                    </a>

                                                    <a class="red" onclick="return chkDelete()"
                                                       href="market/delete_market_product/<?= $row->market_place_id; ?>">
                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    </a>
                                                </div>

                                                <div class="hidden-md hidden-lg">
                                                    <div class="inline pos-rel">
                                                        <button class="btn btn-minier btn-yellow dropdown-toggle"
                                                                data-toggle="dropdown" data-position="auto">
                                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                            <!--<li>
                                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                            <span class="blue">
                                                                                    <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                            </span>
                                                                    </a>
                                                            </li>-->

                                                            <li>
                                                                <a href="" class="tooltip-success" data-rel="tooltip"
                                                                   title="Edit">
                                                                                <span class="green">
                                                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                                </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip"
                                                                   title="Delete">
                                                                                <span class="red">
                                                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                                </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>

    <?php $reg_id = $this->session->userdata('reg_id'); ?>
    <div align="center">
        <a href="market/add_market_place_product">
            <button type="button" class="btn btn-success">Add Product</button>
        </a>
        <?php if ($members_info == NULL) { ?>
            <a href="login/success_reply/<?php echo $reg_id; ?>">
                <button type="button" class="btn btn-success">Get Membership</button>
            </a>
        <?php } ?>
    </div>

</div><!-- /.main-content -->


<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>


<script src="assets/js/jquery.2.1.1.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>


<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="assets/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/dataTables.colVis.min.js"></script>


<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<script>
    function chkDelete() {
        var chk = confirm("Are You Sure To Delete This ?");
        if (chk) {
            return true;
        }
        else {
            return false;
        }
    }
</script>


<script type="text/javascript">
    jQuery(function ($) {

        var oTable1 =
            $('#dynamic-table')

                .dataTable({
                    bAutoWidth: false,
                    "aoColumns": [
                        {"bSortable": false},
                        null, null, null, null,
                        {"bSortable": false}
                    ],
                    "aaSorting": [],
                });

        TableTools.classes.container = "btn-group btn-overlap";
        TableTools.classes.print = {
            "body": "DTTT_Print",
            "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
            "message": "tableTools-print-navbar"
        }


        var tableTools_obj = new $.fn.dataTable.TableTools(oTable1, {
            "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf",
            "sRowSelector": "td:not(:last-child)",
            "sRowSelect": "multi",
            "fnRowSelected": function (row) {

                try {
                    $(row).find('input[type=checkbox]').get(0).checked = true
                }
                catch (e) {
                }
            },
            "fnRowDeselected": function (row) {

                try {
                    $(row).find('input[type=checkbox]').get(0).checked = false
                }
                catch (e) {
                }
            },
            "sSelectedClass": "success",
            "aButtons": [
                {
                    "sExtends": "copy",
                    "sToolTip": "Copy to clipboard",
                    "sButtonClass": "btn btn-white btn-primary btn-bold",
                    "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
                    "fnComplete": function () {
                        this.fnInfo('<h3 class="no-margin-top smaller">Table copied</h3>\
                                                            <p>Copied ' + (oTable1.fnSettings().fnRecordsTotal()) + ' row(s) to the clipboard.</p>',
                            1500
                        );
                    }
                },
                {
                    "sExtends": "csv",
                    "sToolTip": "Export to CSV",
                    "sButtonClass": "btn btn-white btn-primary  btn-bold",
                    "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
                },
                {
                    "sExtends": "pdf",
                    "sToolTip": "Export to PDF",
                    "sButtonClass": "btn btn-white btn-primary  btn-bold",
                    "sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
                },
                {
                    "sExtends": "print",
                    "sToolTip": "Print view",
                    "sButtonClass": "btn btn-white btn-primary  btn-bold",
                    "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",
                    "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",
                    "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
                                                              <p>Please use your browser's print function to\
                                                              print this table.\
                                                              <br />Press <b>escape</b> when finished.</p>",
                }
            ]
        });

        $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

        //also add tooltips to table tools buttons
        //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
        //so we add tooltips to the "DIV" child after it becomes inserted
        //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
        setTimeout(function () {
            $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function () {
                var div = $(this).find('> div');
                if (div.length > 0)
                    div.tooltip({container: 'body'});
                else
                    $(this).tooltip({container: 'body'});
            });
        }, 200);


        //ColVis extension
        var colvis = new $.fn.dataTable.ColVis(oTable1, {
            "buttonText": "<i class='fa fa-search'></i>",
            "aiExclude": [0, 6],
            "bShowAll": true,
            //"bRestore": true,
            "sAlign": "right",
            "fnLabel": function (i, title, th) {
                return $(th).text();//remove icons, etc
            }

        });

        //style it
        $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')

        //and append it to our table tools btn-group, also add tooltip
        $(colvis.button())
            .prependTo('.tableTools-container .btn-group')
            .attr('title', 'Show/hide columns').tooltip({container: 'body'});

        //and make the list, buttons and checkboxed Ace-like
        $(colvis.dom.collection)
            .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
            .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
            .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');


        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function () {
                var row = this;
                if (th_checked)
                    tableTools_obj.fnSelect(row);
                else
                    tableTools_obj.fnDeselect(row);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]', function () {
            var row = $(this).closest('tr').get(0);
            if (!this.checked)
                tableTools_obj.fnSelect(row);
            else
                tableTools_obj.fnDeselect($(this).closest('tr').get(0));
        });


        $(document).on('click', '#dynamic-table .dropdown-toggle', function (e) {
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();
        });


        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function () {
                var row = this;
                if (th_checked)
                    $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else
                    $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]', function () {
            var $row = $(this).closest('tr');
            if (this.checked)
                $row.addClass(active_class);
            else
                $row.removeClass(active_class);
        });


        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                return 'right';
            return 'left';
        }

    })
</script>
</body>
</html>
