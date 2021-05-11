<?php if($details["user_type"] == "Teacher"){ ?>
<header class="w3-container" style="padding-top:5px;">
    <h5><i class="fas fa-file-alt fa-fw w3-text-red"></i>&nbsp;Assignments List</h5>
</header>
<div class="w3-row-padding">
    <div class="w3-col m3">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fas fa-book-reader w3-xxxlarge" aria-hidden="true"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Assignments<br><span class="w3-small">Total of Assigments Distribute</span></h4>
      </div>
    </div>
    <div class="w3-col m9">
    <button type="button" onclick="document.getElementById('assignment-form').style.display='block'" class="w3-btn w3-margin-bottom w3-border w3-round">
    <i class="fa fa-plus fa-fw"></i> New Assignments
    </button>
        <table class="w3-table">
            <tr class="w3-dark-grey">
                <th>Date Created</th>
                <th>Year</th>
                <th>Sections</th>
                <th>Details</th>
                <th class="w3-center">Action</th>
            </tr>
        </table>
    </div>
</div>

<!---------------ADD FORM MODAL------------------>
<div id="assignment-form" class="w3-modal">
<div class="w3-modal-content w3-animate-top w3-card-4" style="width:750px;">
    <header class="w3-row-padding w3-red w3-margin-bottom w3-bottombar"> 
    <span id="closed_href"><span onclick="document.getElementById('assignment-form').style.display='none'" 
    class="w3-button w3-display-topright w3-medium fa fa-times"></span></span>
    <h4><i class="fa fa-plus fa-fw"></i> New Assignments</h4>
    </header>
    <form class="w3-row-padding" id="assignment-form-add">
        <input type="hidden" name="action_type" value="add_assignment" readonly>
        <input type="hidden" name="course" value="<?php echo $details["handle_course"]; ?>" readonly>
        <input type="hidden" name="trackid" value="<?php echo trackid(); ?>" readonly>
        <div class="w3-col m6">
        <label>Subject</label>
        <input type="text" name="subject" class="w3-input w3-border w3-round-xxlarge"> 
            <label>College Year:</label>
            <select name="year" class="w3-input w3-border w3-round-xxlarge">
            <option value="">Select</option>
            <?php 
                $year = year_list();
                while($list = mysqli_fetch_assoc($year)){
                echo "<option value='".$list["value"]."'>".$list["value"]."</option>";
                }
            ?>
            </select>
            <label>Sections:</label>
            <select name="section" class="w3-input w3-border w3-round-xxlarge">
                <option value="">Select</option>
                <?php 
                $section = sections_list();
                while($list = mysqli_fetch_assoc($section)){
                    echo "<option value='".$list["value"]."'>".$list["value"]."</option>";
                }
                ?>
            </select>
            </div>
            <div class="w3-col m6">
            <label>Upload Files:</label>
            <input type="file" class="w3-input w3-border w3-round">
            <label>Details:</label>
            <textarea name="description" style="height: 120px;" class="w3-input w3-border w3-round"></textarea>
            </div>
            
        <div id="result_an_add"></div>
        </form>
        <footer class="w3-container w3-padding w3-center" id="submit_an_add">
            <button type="button" onclick="assignment_add();" class="w3-btn w3-border w3-green w3-round-xxlarge">
            Submit
            </button>
        </footer>
    </div>
</div>
<?php }else{ ?>
<header class="w3-container" style="padding-top:5px;">
    <h5><i class="far fa-bell fa-fw w3-text-red"></i> Assignments</h5>
</header>

<?php } ?>