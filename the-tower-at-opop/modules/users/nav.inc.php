<?php if($session->logged_in) { ?>

    <ul id="storeSubnav">
        <li><a href="<?php echo MAINURL."order-history"; ?>" title="Order History">Order History</a></li>
        <li><a href="<?php echo MAINURL."order-tracking"; ?>" title="Track Order">Track Order</a></li>
        <li><a href="<?php echo MAINURL."edit-account/".$session->email; ?>" title="Edit Account">Edit Account</a></li>
    </ul>

<?php } ?>