<form class="cBodyContent">
    <?php require "../fromBlocks/user.php" ?>

    <div class="form-2item">
        <div>
            <label for="pay">Pay Band:</label><br>
            <input style="width: 203px;" type="number" id="pay" name="pay" min="1" max="9">
        </div>
        <div>
            <label for="fname">User Type:</label><br>
            <select style="width: 203px; height: 30px" id="prof" name="prof">
                <option value="" default selected>Select</option>
                <option value="admin">Admin</option>
                <option value="clinician">Clinician</option>
                <option value="manager">Manager</option>
            </select>
        </div>
    </div>
    <div class="form-2item">
        <div>
            <label for="prof">Profession:</label><br>
            <select style="width: 203px; height: 30px" id="prof" name="prof">
                <option value="" default selected>Select</option>
                <option value="Consultant">Consultant</option>
                <option value="Doctor">Doctor</option>
                <option value="IT">IT</option>
                <option value="Nurse">Nurse</option>
                <option value="occupationalTherapists">Occupational Therapists</option>
                <option value="psychiatrists">Psychiatrists</option>
                <option value="radioographers">Raidioographers</option>
                <option value="receptionist">Receptionist</option>
                <option value="SeniorNurse">Senior Clinical Nurse</option>
                <option value="staffNurse">Staff Nurse</option>
                <option value="wardClark">Ward Clark</option>
            </select>
        </div>
    </div>
    <?php require "../fromBlocks/submit.php" ?>
</form>