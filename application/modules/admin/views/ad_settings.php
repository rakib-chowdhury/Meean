<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-content">
                <!-- /.page-header starts -->
                <div class="ace-settings-container" id="ace-settings-container">

                </div> 

                <div class="page-header">
                    <h1>
                        All Ad Settings List

                    </h1>
                </div>
                <!-- /.page-header ends -->


                <?php if (!empty($message)): ?>  
                    <div class="col-lg-12" align="center">
                        <div class="alert alert-dismissable alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><?= $message ?></strong> 
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($message_error)): ?>  
                    <div class="col-lg-12">
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><?= $message_error ?></strong> 
                        </div>
                    </div>
                <?php endif; ?> 

                <div class="row">
                    <div class="col-xs-12" style="width:100%">
                        <?php if(count($settings_details)<2){?>
                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Insert Ad settings</button><br><br>
                        <?php }?>
                        <div class="container">
                            <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Information about your AD settings</h4>
                                </div>
                                <div class="modal-body">

                                <form action="admin/insert_ad" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                      <label for="example-search-input" class="col-xs-2 col-form-label">Type</label>
                                      <div class="col-xs-10">
                                        <select required name="ad_type">
                                            <option value="">Select your Type</option>
                                            <option value="0">Top AD</option>
                                            <option value="1">Bump AD</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Input Text</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" required type="text" name="ad_text">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Icon</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" required type="file" name="ad_icon">
                                      </div><span style="color: red;">Image size should be less than 1mb</span>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Price</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" required type="text" name="ad_price">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Duration</label>
                                      <div class="col-xs-5 form-inline">
                                        <input class="form-control" required type="text" name="ad_duration"> DAYS
                                      </div>
                                    </div>
                                    <div class="form-group row" align="center">
                                      <div class="col-xs-10">
                                        <input class="btn btn-success" type="submit" value="SUBMIT">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                </form>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="table-header">
                            Data Table For Ad Settings Details
                        </div>


                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th style="text-align:center;">SL</th>
                                        <th style="text-align:center;">Ad Name</th>
                                        <th style="text-align:center;">Ad Icon</th>
                                        <th style="text-align:center;">Ad Price</th>
                                        <th style="text-align:center;">Ad Duration</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=1; foreach ($settings_details as $row){?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $i;?></td>
                                            <td style="text-align:center;"><?php if($row['ad_type'] == 1){echo 'Bump Ad';}else{echo 'Top Ad';}?></td>
                                            <td style="text-align:center;"><img src="uploads/<?php echo $row['ad_icon']?>" style="width: 50px"></td>
                                            <td style="text-align:center;"><?php echo $row['ad_price']?></td>
                                            <td style="text-align:center;"><?php echo $row['ad_duration']?> Days</td>
                                            <td style="text-align:center;">
                                                <a href="admin/ad_settings/<?=$row['id']?>"><button type="submit" class="btn btn-primary btn-xs">Edit</button></a>

                                                <!-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Ad settings</button><br><br> -->
                        


                                                <a href="admin/delete_ad_setting/<?=$row['id']?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                 <input type="hidden" name="status" value="">
                                            </td>



                                            <div class="container">
                                                <div class="modal fade" id="myModaledit" role="dialog">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title">Update your ad settings</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="admin/update_ad" method="post" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                              <label for="example-search-input" class="col-xs-2 col-form-label">Type</label>
                                                              <div class="col-xs-10">
                                                                <select name="ad_type">
                                                                    <option value="">Select your Type</option>
                                                                    <option <?php if(isset($get_ad_info)){if($get_ad_info['ad_type']==0){echo "selected";}}?> value="0">Top AD</option>
                                                                    <option <?php if(isset($get_ad_info)){if($get_ad_info['ad_type']==1){echo "selected";}}?> value="1">Bump AD</option>
                                                                </select>
                                                              </div>
                                                            </div>
                                                            <div class="form-group row">
                                                              <label for="example-text-input" class="col-xs-2 col-form-label">Input Text</label>
                                                              <div class="col-xs-10">
                                                                <input class="form-control" type="text" name="ad_text" value="<?php if(isset($get_ad_info)){echo $get_ad_info['ad_text'];}?>">
                                                              </div>
                                                            </div>
                                                            <div class="form-group row">
                                                              <label for="example-text-input" class="col-xs-2 col-form-label">Icon</label>
                                                              <div class="col-xs-10">
                                                                <input class="form-control" type="file" name="ad_icon"><br>
                                                                <img style="height:80px;width:100px;" src="uploads/<?=$get_ad_info['ad_icon']?>">
                                                              </div><span style="margin-left: 50px;color: red;">Image size should be less than 1mb</span>
                                                            </div>
                                                            <div class="form-group row">
                                                              <label for="example-text-input" class="col-xs-2 col-form-label">Price</label>
                                                              <div class="col-xs-10">
                                                                <input class="form-control" type="text" name="ad_price" value="<?php if(isset($get_ad_info)){echo $get_ad_info['ad_price'];}?>">
                                                              </div>
                                                            </div>
                                                            <div class="form-group row">
                                                              <label for="example-text-input" class="col-xs-2 col-form-label">Duration</label>
                                                              <div class="col-xs-5 form-inline">
                                                                <input class="form-control" type="text" name="ad_duration" value="<?php if(isset($get_ad_info)){echo $get_ad_info['ad_duration'];}?>"> Days
                                                              </div>
                                                            </div>
                                                            <div class="form-group row" align="center">
                                                              <div class="col-xs-10">
                                                                <input type="hidden" name="edit_id" value="<?=$get_ad_info['id']?>">
                                                                <input type="hidden" name="ad_icon" value="<?=$get_ad_info['ad_icon']?>">
                                                                <input class="btn btn-success" type="submit" value="Update">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>


                                        </tr>
                                        
                                    <?php $i++; }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>
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
        $(document).ready(function(){
            var id = <?php echo $id?>;
            if(id!=null)
            {
                $("#myModaledit").modal('show');
            }
        });
    </script>

    <script type="text/javascript">
        jQuery(function ($) {

            var oTable1 =
                    $('#dynamic-table')

                    .dataTable({
                        bAutoWidth: false,
                        "aoColumns": [
                            {"bSortable": false},
                            null,null,null,
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