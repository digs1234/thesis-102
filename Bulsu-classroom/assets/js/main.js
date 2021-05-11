function anouncements_add() {
  $("#submit_an_add").hide();
  $("#result_an_add").html("<p class='w3-center'><i class='fa fa-spinner fa-spin w3-xxlarge'></i></p>");
  setTimeout(function(){ 
    $.ajax({
      url:'functions/action.php',
      method:"POST",
      data: $('#anouncments-form-add').serialize(),
      cache: false,
      success: function(data){
        if($.trim(data) == "Success"){
          $("#result_an_add").html("<p class='result1 w3-animate-left w3-light-grey w3-text-black w3-border'>"+
            "<span><span class='w3-text-red'>Success <i class='fa fa-check'></i>:</span>  New anouncements has been post.</span>"+
           "</p>");
          $("#closed_href").html("<span class='w3-button w3-display-topright w3-medium fa fa-times' onclick='location.reload();'></span>");
          $("#submit_an_add").remove();
        }else{
          $("#result_an_add").html("<p class='result w3-animate-left'><i class='fa fa-times-circle'></i> "+data+"</p>");
          $("#submit_an_add").show();
        }
      },
    });
  }, 900);
}
function anouncements_edit() {
  $("#submit_an_edit").hide();
  $("#result_an_edit").html("<p class='w3-center'><i class='fa fa-spinner fa-spin w3-xxlarge'></i></p>");
  setTimeout(function(){ 
    $.ajax({
      url:'functions/action.php',
      method:"POST",
      data: $('#anouncments-form-edit').serialize(),
      cache: false,
      success: function(data){
        if($.trim(data) == "Success"){
          $("#result_an_edit").html("<p class='result1 w3-animate-opacity w3-light-grey w3-text-black w3-border'>"+
            "<span><span class='w3-text-red'>Success <i class='fa fa-check'></i>:</span>   Anouncements has been update.</span>"+
           "</p>");
          $("#closed_an_edit").html("<span class='w3-button w3-display-topright w3-medium fa fa-times' onclick='location.reload();'></span>");
          $("#submit_an_edit").remove();
        }else{
          $("#result_an_edit").html("<p class='result w3-animate-opacity'><i class='fa fa-times-circle'></i> "+data+"</p>");
          $("#submit_an_edit").show();
        }
      },
    });
  }, 900);
}

function anouncements_delete(value) {
  $("#submit_an_edit").hide();
  $("#result_an_edit").html("<p class='w3-center'><i class='fa fa-spinner fa-spin w3-xxlarge'></i></p>");
    var user_decide = confirm("Are you sure you want to delete?");
    if(user_decide == true){
        $.ajax({
          url:'functions/action.php',
          method:"POST",
          data: {trackid:value,action_type:'delete_anouncements'},
          cache: false,
          success: function(data){
            alert("SUCCESFULLY DELETE!");
            location.reload();
          },
        });
    }
}

function anouncements_data(value) {
  $("#anouncements-edit-form").show();
    $.ajax({
      url:'functions/action.php',
      method:"POST",
      data: {trackid:value,action_type:'anouncements_data'},
      cache: false,
      success: function(data){
       var details = JSON.parse(data);
        $('#trackid').val(value);
        $('#subject').val(details.subject);
        $('#year').prepend("<option selected value='"+details.year+"'>"+details.year+"</option>");
        $('#section').prepend("<option selected value='"+details.section+"'>"+details.section+"</option>");
        $('#description').val(details.description);
      },
    });
}

function userin() {
  $("#submit_btn").hide();
  $("#result").html("<p class='w3-center'><i class='fa fa-spinner fa-spin w3-xxlarge'></i></p>");
  setTimeout(function(){ 
    $.ajax({
      url:'functions/action.php',
      method:"POST",
      data: $('#user_login_and_register').serialize(),
      cache: false,
      success: function(data){
        if($.trim(data) == "Please Enter Password and User ID" || $.trim(data) == "Incorect User ID" 
        || $.trim(data) == "Incorect Password" || $.trim(data) == "Incorect Password and User ID"){
          $("#result").html("<p class='result w3-animate-left'><i class='fa fa-times-circle fa-fw'></i> "+data+"</p>");
          $("#submit_btn").show();
        }else{
          $("#result").html("<p class='result w3-animate-left w3-light-grey w3-text-black w3-border'>"+data+" </p>");
         setTimeout(function(){ window.open("?page=home", "_self"); }, 1000);
        }
      },
    });
  }, 900);
}

function user_register() {
  $("#submit_btn").hide();
  $("#result").html("<p class='w3-center w3-margin-top'><i class='fa fa-spinner fa-spin w3-xxlarge'></i><br><span>Please Wait</span></p>");
  var school_id = $("#userid").val();
  var password = $("#password").val();
  window.scrollTo(0,document.body.scrollHeight);
  setTimeout(function(){
    $.ajax({
      url:'functions/action.php',
      method:"POST",
      data: $('#user_login_and_register').serialize(),
      cache: false,
      success: function(data){
        if($.trim(data) == "Success"){
          $("#result").html("<p class='w3-medium w3-light-grey w3-padding'><span class='w3-text-red'>"+
          "Success: <i class='fa fa-check-circle'></i></span>"+
          "<br> <span class='w3-small'><b>School ID:</b> "+school_id+"<br><b>Password:</b> "+password+" </span></p>");
          $("#submit_btn").remove();
        }else{
        $("#result").html("<div class='w3-row-padding w3-light-grey'><p style='margin: 10px;'>Error:</p>"+data+"</div>");
        $("#submit_btn").show();
        }
        window.scrollTo(0,document.body.scrollHeight);
      },
    });
  }, 1000);
}

function logout() {
  $("#logout").html("<i class='fa fa-spinner fa-spin'></i>");
  setTimeout(function(){
    var user_decide = confirm("Are you sure you want to logout?");
    if(user_decide == true){
      $.ajax({
        url:'functions/action.php',
        method:"POST",
        data: {action_type:"logout"},
        cache: false,
        success: function(data){
          $("#logout").html("<i class='fa fa-check'></i>");
            window.open("?page=login", "_self");
        },
      });
    }else{
      $("#logout").html('<i class="fas fa-lock fa-fw"></i>  Logout');
    }
  }, 500);
}

function register_div(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace("w3-border", "w3-card");
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace("w3-card", "w3-border");
  }
  window.scrollTo(0,document.body.scrollHeight);
}

function bulsu_open() {
    document.getElementById("bulsu-sidebar").style.display = "block";
    document.getElementById("bulsu-overlay").style.display = "block";
  }
  
function bulsu_closed() {
    document.getElementById("bulsu-sidebar").style.display = "none";
    document.getElementById("bulsu-overlay").style.display = "none";
}

function NumberOnly(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
  }
  return true;
}