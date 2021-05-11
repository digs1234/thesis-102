<div class="w3-row login-page" id="login-page">
    <div class="w3-content w3-padding w3-animate-top w3-card w3-border" style="max-width:500px;">
        <h3><i class='fas fa-key'></i> Login</h3>
        <form class="TP-container w3-padding" autocomplete="off" id="user_login_and_register">
            <div id="result"></div>
            <label>College ID</label>
            <input type="text" name="userid" class="w3-input w3-border w3-round-xxlarge" onkeypress="return NumberOnly(event)">
            <label>Password</label>
            <input type="password" name="password" class="w3-input w3-border w3-round-xxlarge">
            <input type="hidden" name="action_type" value="login" readonly>
            <div class="w3-container w3-margin-top w3-center">
                <button type="button" class="w3-btn w3-border w3-round-xxlarge" id="submit_btn" onclick="userin();">Submit</button><br><br>
                <a class="w3-text-blue" href="?page=register">Do you have an account? Register</a>
            </div>
        </form>
    </div>  
</div>