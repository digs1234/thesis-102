<div class="w3-row register-page" id="register-page">
    <div class="w3-content w3-margin-bottom w3-animate-top" style="max-width:900px;margin-bottom: 80px;">
        <h3><i class='fas fa-user'></i> Register</h3>
        <form class="w3-container" autocomplete="off" id="user_login_and_register">
            <h4 onclick="register_div('reg1')" class="w3-btn w3-block w3-card w3-left-align">Personal Information <i class="fa fa-edit w3-right"></i></h4>
                <input type="hidden" name="action_type" value="register" class="w3-input" readonly>
                <div class="w3-row-padding w3-hide w3-show" id="reg1">
                    <div class="w3-col m6">
                        <label>First Name:</label>
                        <input type="text" name="fname" class="w3-input">
                        <label>Middle Name:</label>
                        <input type="text" name="mname" class="w3-input">
                        <label>Last Name:</label>
                        <input type="text" name="lname" class="w3-input">
                    </div>
                    <div class="w3-col m6">
                        <label>Current Address:</label>
                        <input type="text" name="address" class="w3-input">
                        <label>Email Account:</label>
                        <input type="text" name="gmail" class="w3-input">
                        <label>Contact Number: <span class="w3-small">(11 digits Only)</span></label>
                        <input type="text" name="contact" class="w3-input" onkeypress="return NumberOnly(event)">
                    </div>
                </div>
                <h4 onclick="register_div('reg2')" class="w3-btn w3-block w3-border w3-left-align">School Information <i class="fa fa-edit w3-right"></i></h4>
                <div class="w3-row-padding w3-hide" id="reg2">
                    <div class="w3-col m6">
                        <label>College:</label>
                        <input type="text" name="college" class="w3-input">
                    </div>
                    <div class="w3-col m6">
                        <label>Course:</label>
                        <select name="course" class="w3-select">
                        <option value="" selected>Select course</option>
                        <option value="BS Enviromental Science">BS Enviromental Science</option>
                        <option value="BS Biology">BS Biology</option>
                        <option value="BS Environmental Science">BS Environmental Science</option>
                        <option value="BS Food Tech">BS Food Tech</option>
                        <option value="BS Math Computer Science">BS Math Computer Science</option>
                        <option value="BS Math Applied Statistics">BS Math Applied Statistics</option>
                        <option value="BS Math Business Application">BS Math Business Application</option>
                        </select>
                    </div>
                    <div class="w3-col m6">
                        <label>Year:</label>
                        <select name="year" class="w3-select">
                            <option value="" selected>Select year</option>
                            <option value="1st year">1st year</option>
                            <option value="2nd year">2nd year</option>
                            <option value="3rd year">3rd year</option>
                            <option value="4rth year">4th year</option>
                        </select>
                    </div>
                    <div class="w3-col m6">
                        <label>Section:</label>
                        <select name="section" class="w3-select">
                        <option value="" selected>Select section</option>
                            <?php 
                                for ($char = 'A'; $char <= 'Z'; $char++) {
                                    echo "<option value='Section $char'>Section $char</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <h4 onclick="register_div('reg3')" class="w3-btn w3-block w3-border w3-left-align">Account Creations <i class="fa fa-edit w3-right"></i></h4>
                <div class="w3-row-padding w3-hide" id="reg3">
                    <div class="w3-col m4">
                        <label>College ID</label>
                        <input type="text" name="userid" id="userid" class="w3-input" onkeypress="return NumberOnly(event)">
                    </div>
                    <div class="w3-col m4">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="w3-input">
                    </div>
                    <div class="w3-col m4">
                        <label>Confirm Password</label>
                        <input type="password" name="password2" class="w3-input">
                    </div>
                </div>
            <div id="result"></div>
            <div class="w3-container w3-margin-top w3-center">
                <button type="button" class="w3-btn w3-border w3-round w3-red" id="submit_btn" onclick="user_register();">Submit</button><br><br>
                <a class="w3-text-blue" href="?page=login">Have an Account Already? Sign In</a>
            </div>
        </form>
    </div>  
</div>
