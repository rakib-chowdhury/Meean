<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-content">

                <?php if (empty($message)): ?> 
                    <?php $msg = $this->session->userdata('message'); ?>
                    <div class="col-lg-12" align="center">
                        <div>
                            <strong>
                                <h2 style="color:red">
                                    <?php echo $msg;
                                    $this->session->unset_userdata('message'); ?>
                                </h2>
                            </strong> 
                        </div>
                    </div>
<?php endif; ?>

                <!-- /.page-header starts -->
                <div class="page-header">
                    <h1>
                        All Slider Images List

                    </h1>
                </div>
                <!-- /.page-header ends -->




                <div class="row">
                    <div class="col-xs-6" >
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" enctype="multipart/form-data" role="form" class="col-sm-6" action="admin/insert_slider" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Input images</label>
                                <div class="col-sm-9">
                                    <input id="fileupload" multiple name="userfile[]"  type="file"/>
                                    <div id="dvPreview"></div>
                                </div>
                            </div>


                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="submit" class="btn btn-info" name="Submit">

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="col-lg-12" align="center">
                            <div class="alert alert-dismissable alert-success">
                                <h3>Image size must be </h3>
                                <li><h4>width = 770 pixel</h4></li>
                                <li><h4>height = 450 pixel</h4></li>
                            </div>
                        </div>


                    </div>  


                    <div class="col-xs-6">
                        <div class="page-content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>													
<?php $i = 1;
foreach ($all_slider_info as $row): ?>
                                                <tr>
                                                    <td><?php echo $i;
    $i++; ?></td>
                                                    <td><img style="height:100px;width:100px;" src="uploads/<?= $row->image; ?>"></td>
                                                    <td><?php if ($row->status == 1) {
                                                        echo '<span class="label label-sm label-success">Active';
                                                    } else {
                                                        echo '<span class="label label-sm label-warning">inactive';
                                                    } ?></span></td>
                                                    <td>
    <?php if ($row->status == 1) {
        echo '<a  href="admin/update_slider/' . $row->id . '" type="button" class="btn btn-warning btn-xs">Inactive</a>';
    } else {
        echo '<a href="admin/update_slider/' . $row->id . '" type="button" class="btn btn-success btn-xs">Active</a>';
    } ?>
                                                        <a  href="admin/delete_slider/<?= $row->id; ?>" type="button" class="btn btn-danger btn-xs">Delete</a>
                                                    </td>
                                                </tr>
<?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.page-content -->
                    </div>
                </div>
            </div>
        </div>






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
                            null, null,
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

    <script language="javascript" type="text/javascript">
        window.onload = function () {
            var fileUpload = document.getElementById("fileupload");
            fileUpload.onchange = function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("dvPreview");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "100";
                                img.width = "100";
                                img.src = e.target.result;
                                dvPreview.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            }
        };
    </script> 
</body>
</html>
