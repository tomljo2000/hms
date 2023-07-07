<?php 
require '../navbar.php';
if ($_SESSION['role'] != "admin") {
    header('location: ../managePages/staff.php');
} 

$staffData = getStaffData($_GET['staff_id']);
var_dump($staffData);

function displayDate($x){
    $x = explode("-", $x);
    $x = $x[2]."-".$x[1]."-".$x[0];
    return  $x;
}

?>
<form class="cBodyContent">
    <div class="form-2item">
        <div>
            <label for="fname">Forename:</label><br>
            <input type="text" id="fname" name="fname" value="<?php echo $staffData[0]["fname"]; ?>"><br>
        </div>
        <div>
            <label for="fname">Surname:</label><br>
            <input type="text" id="lname" name="fname" value="<?php echo $staffData[0]["lname"]; ?>"><br>
        </div>
    </div>
    <div class="form-2item">
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $staffData[0]["email"]; ?>"><br>
        </div>
        <div>
            <label for="dob">Date of birth:</label><br>
            <label> <?php echo displayDate($staffData[0]["dob"]); ?><br>
        </div>
    </div>
    <div class="form-2item">
        <div style="margin:0 90px 0px 45px">
            <label for="fname">Sex:</label><br>
            <label for="male"><?php echo $staffData[0]["gender"]; ?></label><br>
        </div>
        <div>   
            <!-- https://www.html5pattern.com/Phones -->
            <label for="mobile">Mobile :</label><br>
            <input type="tel" id="mobile" name="mobile" placeholder="<?php echo $staffData[0]["mobile"]; ?>" pattern="[+]{1}[0-9]{11,14}"  value="<?php echo $staffData[0]["mobile"]; ?>"><br>
        </div>
    </div>
    <div class="form-2item">
        <div>
            <label for="nat_no">National Insurce no.</label><br>
            <input type="text" id="nat_no" name="street"  value="<?php echo $staffData[0]["national_insurance"]; ?>"><br>
        </div>
        <div>
            <label for="post">Profession</label><br>
            <input type="text" id="post" name="post" value="<?php echo $staffData[0]["profession"]; ?>"><br>
        </div>
    </div>

    <div class="form-item-comment">
        <label for="street">Address</label>
    </div>  
    <div class="form-2item">
        <div>
            <label for="street">Address Line</label><br>
            <input type="text" id="street" name="street"  value="<?php echo $staffData[0]["street"]; ?>"><br>
        </div>
        <div>
            <label for="post">Postcode</label><br>
            <input type="text" id="post" name="post" pattern="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}"  value="<?php echo $staffData[0]["post"]; ?>"><br>
        </div>
    </div>
    <div class="form-2item">
        <div>
            <label for="nhs_no">Staff Id:</label><br>
            <input type="email" id="nhs_no" name="staff_id"  value="<?php echo $staffData[0]["staff_id"]; ?>"><br>
        </div>
    </div>
    <div class="form-2item">
        <div>
            <div>
                <style>
                    select {
                        width: 300px;
                    }
                </style>
                <label>Allergens : Comming Soon</label>
            </div>

            <script src="multiselect-dropdown/multiselect-dropdown.js"></script>
        </div>
    </div>

    <div class="form-2item">
        <div>
            <input type="submit" id="submit" value="Update"><br>
        </div>
        <div>
            <!-- //button to go to manage pages departments -->
            <a href="../managePages/patients.php">Cancel</a>
        </div>
    </div>

</form>
<?php require '../footer.php'; ?>