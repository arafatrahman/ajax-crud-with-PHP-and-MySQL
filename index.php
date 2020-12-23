<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="myscript.js"></script>
</head>

<body>

    <div class="btn-container">
        <div><button type="button" class="aerion-btn">Update </button></div>
        <div><button type="button" class="aerion-btn">Reset </button></div>
        <div><button type="button" class="aerion-btn">Expand </button></div>
        <div><button type="button" class="aerion-btn">Collapse </button></div>
    </div>

    <div class="it-values-head">IT Values</div>

    <div id="main-container">

        <?php
        include 'db-connect.php';
        $result = mysqli_query($conn, "SELECT * FROM hours_lk");
        $result = mysqli_query($conn, "SELECT * FROM hours_lk ORDER BY disp_order ASC");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>


            <div class="it-values-fields-container" id="<?php echo $row["idhours_lk"]; ?>" data-offerid="<?php echo $row["idhours_lk"]; ?>">
                <div class="it-values-fields-action-btn"><i class="fas fa-caret-right" data-id="<?php echo $row["idhours_lk"]; ?>" style="font-size:32px;color:#4573f0;"></i></div>
                <div class="it-values-fields"><label for="itname">IT Name</label><input type="text" data-id1="<?php echo $row["idhours_lk"]; ?>" class="lk_nm" id="it-name-main" name="it-name-main" value="<?php echo $row['lk_nm'] ?>" /></div>
                <div class="it-values-fields"><label for="itdesc">IT Description</label><input type="text" data-id2="<?php echo $row["idhours_lk"]; ?>" class="lk_nm_desc" id="it-name-main" name="it-name-main" value="<?php echo $row['lk_nm_desc'] ?>" /></div>
                <div><b>Last updates</b> <br><br><span>Admin 11-12-20 08:15pm</span></div>
                <div class="it-values-fields-action-btn"><i class="fa fa-sort btn_sort" style="font-size:24px;color:#4573f0"></i><i class="fa fa-minus-circle  btn_delete" data-delid="<?php echo $row["idhours_lk"]; ?>" style="font-size:24px;color:red"></i><i class="fa fa-plus-circle add_sub_field" style="font-size:24px;color:green;"></i></div>
            </div>

        
            <?php
            $id = $row["idhours_lk"];
           
            $subSQL = "SELECT * FROM hours_lk_val WHERE idhours_lk = $id ORDER BY disp_order ASC";
            $subResult = mysqli_query($conn, $subSQL);

            while ($subRow = mysqli_fetch_assoc($subResult)) { ?>

                <div class="sub-fields-container-<?php echo $id; ?> fields-container"  style="display: none;">
                    <div><label for="itname">IT Name</label><input type="text" data-sub1="<?php echo $subRow["idhours_lk_val"]; ?>" class="edit_lk_val" id="lk_val" name="edit_lk_val" value="<?php echo $subRow['lk_val'] ?>" /></div>
                    <div><label for="itdesc">IT Description</label><input type="text" data-sub2="<?php echo $subRow["idhours_lk_val"]; ?>" class="edit_lk_val_desc" id="edit_lk_val_desc" name="lk_val_desc" value="<?php echo $subRow['lk_val_desc'] ?>" /></div>
                    <div class="blank-div"><i class="fa fa-minus-circle  sub_btn_delete" data-delsub="<?php echo $subRow["idhours_lk_val"]; ?>" style="font-size:24px;color:red"></i></div>
                </div>
            <?php }?>  

        


        <?php } ?>

    </div>

</body>

</html>