<div class="form-2item">
    <div>
        <label for="fname">Forename:</label><br>
        <input type="text" id="fname" name="fname"><br>
    </div>
    <div>
        <label for="fname">Surname:</label><br>
        <input type="text" id="fname" name="fname"><br>
    </div>
</div>
<div class="form-2item">
    <div>
        <label for="fname">Email:</label><br>
        <input type="email" id="fname" name="fname"><br>
    </div>
    <div>
        <label for="fname">Date of birth:</label><br>
        <input type="date" id="fname" name="fname" style="width: 203px"><br>
    </div>
</div>
<div class="form-2item">
    <div style="margin:0 90px 0px 45px">
        <label for="fname">Sex:</label><br>
        <input type="radio" id="male" name="sex" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="sex" value="female">
        <label for="female">Female</label><br>
    </div>
    <div>
        <!-- https://www.html5pattern.com/Phones -->
        <label for="fname">Mobile :</label><br>
        <input type="tel" id="mobile" name="mobile" placeholder="UK Phone Number" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$"><br>
    </div>
</div>
<?php require "../fromBlocks/address.php"; ?>
