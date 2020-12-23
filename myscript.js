$(document).ready(function () {


    // parrent data updated:

    function edit_data(idhours_lk, text, column_name) {
        $.ajax({
            url: "edit.php",
            method: "POST",
            data: {
                idhours_lk: idhours_lk,
                text: text,
                column_name: column_name
            },
            dataType: "text",
            success: function (data) {
                alert(data);
            }
        });
    }

    $(document).on('blur', '.lk_nm', function () {

        var idhours_lk = $(this).data('id1');
        var lk_nm = $(this).val();
        edit_data(idhours_lk, lk_nm, "lk_nm");


    });

    $(document).on('blur', '.lk_nm_desc', function () {


        var idhours_lk = $(this).data('id2');
        var lk_nm_desc = $(this).val();

        edit_data(idhours_lk, lk_nm_desc, "lk_nm_desc");

    });

    // parrent data deleted:

    $(document).on('click', '.btn_delete', function () {

        var idhours_lk = $(this).data("delid");
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url: "delete-data.php",
                method: "POST",
                data: { idhours_lk: idhours_lk },
                dataType: "text",
                success: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        }
    });


    // add sub field:
 $(".add_sub_field").click(function (e) {
        e.preventDefault();
        var mainID = $(this).closest('div').parent().attr('data-offerid');

        var html = '<input type="hidden" id="idhours_lk" name="idhours_lk" value="' + mainID + '"/>';
        html += '<div id="sub-fields-container" class="sub-temp' + tempId + '" >';
        html += '<div><label for="itname">IT Name</label><input type="text"  class="lk_val" id="lk_sub_val" name="lk_sub_val" /></div>'
        html += '<div><label for="itdesc">IT Description</label><input type="text"  class="lk_val_desc" id="lk_val_desc" name="lk_val_desc" /></div>'
        html += '<div class="blank-div"><i class="fa fa-plus-circle insert_sub_field" style="font-size:24px;color:green;"></i><i class="fa fa-minus-circle deleteTemp" data-id='+ tempId +'  style="font-size:24px;color:red"></i></div>'
        html += '</div>'

        $(this).closest('div').parent().after(html);

        tempId++;

        $(".deleteTemp").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('.sub-temp' + id).remove();   
        });

    });


    // insert sub field value:
    $(document).on('click', '.insert_sub_field', function () {


        var lk_val = $('#lk_sub_val').val();
        var lk_val_desc = $('#lk_val_desc').val();
        var idhours_lk = $('#idhours_lk').val();



        if (lk_val == '') {
            alert("Enter lk_val");
            return false;
        }
        if (lk_val_desc == '') {
            alert("Enter lk_val_desc");
            return false;
        }

        $.ajax({
            url: "insert.php",
            method: "POST",
            data: { idhours_lk: idhours_lk, lk_val: lk_val, lk_val_desc: lk_val_desc },
            dataType: "text",
            success: function (data) {

                alert(data);
                location.reload();
            }
        })
    });

    // sub field data updated:

    $(document).on('blur', '.edit_lk_val', function () {

        var idhours_lk_val = $(this).data('sub1');
        var lk_val = $(this).val();
        edit_sub_data(idhours_lk_val, lk_val, "lk_val");


    });

    $(document).on('blur', '.edit_lk_val_desc', function () {


        var idhours_lk_val = $(this).data('sub2');
        var lk_val_desc = $(this).val();
        edit_sub_data(idhours_lk_val, lk_val_desc, "lk_val_desc");

    });

    function edit_sub_data(idhours_lk_val, text, column_name) {

        $.ajax({
            url: "sub-edit.php",
            method: "POST",
            data: {
                idhours_lk_val: idhours_lk_val,
                text: text,
                column_name: column_name
            },
            dataType: "text",
            success: function (data) {
                alert(data);

            }
        });
    }

    // sub field data deleted:
    $(document).on('click', '.sub_btn_delete', function () {

        var idhours_lk_val = $(this).data("delsub");


        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url: "sub-delete.php",
                method: "POST",
                data: { idhours_lk_val: idhours_lk_val },
                dataType: "text",
                success: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        }
    });

    //show hide sub filed
    $(".fa-caret-right").click(function () {
        var id = $(this).data('id');
        $('.sub-fields-container-' + id).toggle('1000');

    });


    //sorting main fields   
    $("#main-container").sortable({
        placeholder: "ui-state-highlight",
        update: function (event, ui) {
            var idhours_lk = new Array();
            $('#main-container div').each(function () {
                idhours_lk.push($(this).attr("id"));
            });
            $.ajax({
                url: "update-order.php",
                method: "POST",
                data: { idhours_lk: idhours_lk },
                success: function (data) {
                    alert(data);
                }
            });
        }

    });





});
