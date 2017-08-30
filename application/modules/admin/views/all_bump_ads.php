<div class="main-content">
    <div class="main-content-inner">

        <div class="page-content">
            <!-- /.page-header starts -->
            <div class="ace-settings-container" id="ace-settings-container">

            </div> 

            <div class="page-header">
                <h1>
                    All Bump Ads Product List

                </h1>
            </div>
            <!-- /.page-header ends -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->


                    <div class="row">
                        <div class="col-xs-12">

                            <div class="table-header">
                                Data Table For Market Product Details
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->



                            <!-- Modal -->


                            <div>
                                <div class="text-right col-md-12">
                                    <p style="color:red">Search by product name, price, category, subcategory</p>
                                </div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th  style="text-align: center">SL</th>
                                            <th  style="text-align: center">Product Name</th>
                                            <th  style="text-align: center">Price</th>
                                            <th  style="text-align: center" class="hidden-480">Category</th>
                                            <th  style="text-align: center" class="hidden-480">Sub Category</th>
                                            <th  style="text-align: center">Innovative product</th>
                                            <th  style="text-align: center" class="hidden-480">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1;
                                        $j = 1;
                                        foreach ($all_product_info as $row): 
                                            if($row->bump_ad ==1){
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $i;
                                            $i++; ?>
                                                </td>

                                                <td>
                                                    <a data-toggle="modal" data-target="#myModal<?= $row->market_place_id; ?>"><?= $row->market_place_name; ?></a>


                                                    <!-- Modal starts -->
                                                    <div class="modal fade" id="myModal<?= $row->market_place_id; ?>">" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Product Information</h4>
                                                                </div>
                                                                <div class="modal-body">															          
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-4">
                                                                            <p><img style="height:150px;width:150px" src="assets/product_images/<?= $row->market_place_image ?>"></p>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <th>Product Name</th>
                                                                                    <th> : </th>
                                                                                    <td><?= $row->market_place_name; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Product Price</th>
                                                                                    <th> : </th>
                                                                                    <td><?= $row->market_place_price; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Location</th>
                                                                                    <th> : </th>
                                                                                    <td><?= $row->market_place_location; ?></td>
                                                                                </tr>

                                                                            </table>
                                                                            <p style="text-align:center;">User's Information</p>
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <th>User Name</th>
                                                                                    <th> : </th>
                                                                                    <td> <?= $row->reg_first_name; ?> <?= $row->reg_last_name; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>User's Email</th>
                                                                                    <th> : </th>
                                                                                    <td> <?= $row->reg_email; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>User's Phone</th>
                                                                                    <th> : </th>
                                                                                    <td> <?= $row->reg_phone; ?></td>
                                                                                </tr>

                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <h4>Product Description</h4>
                                                                        <hr>
                                                                        <p style="text-aligin:justify;"><?= $row->market_place_description; ?></p>
                                                                    </div>
                                                                    <div align="center">

                                                                        <p><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal Ends -->

                                                </td>
                                                <td><?= $row->market_place_price; ?></td>
                                                <td><?= $row->market_category_name; ?></td>
                                                <td><?= $row->market_sub_cat_name; ?></td>
                                                
                                                <td class="hidden-480">
                                                    <?php if ($row->market_place_is_block == 0) {
                                                        echo '<span class="label label-sm label-success">Active';
                                                    } else {
                                                        echo '<span class="label label-sm label-warning">inactive';
                                                    } ?>
                                                </td>

                                                <td>
                                                    <?php if ($row->market_place_is_block == 0) {
                                                        echo '<a  href="admin/update_market_product/' . $row->market_place_id . '" type="button" class="btn btn-warning btn-xs">Inactive</a>';
                                                    } else {
                                                        echo '<a href="admin/update_market_product/' . $row->market_place_id . '" type="button" class="btn btn-success btn-xs">Active</a>';
                                                    } ?>
                                                   

                                                </td>
                                            </tr>
                                            <?php }endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
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


<script type="text/javascript">
    jQuery(function ($) {

        var oTable1 =
                $('#dynamic-table')

                .dataTable({
                    bAutoWidth: false,
                    "aoColumns": [
                        {"bSortable": false},
                        null, null, null, null, null,
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
