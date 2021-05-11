<header class="w3-container" style="padding-top:5px;">
    <h5><i class="far fa-bell fa-fw"></i> Anouncements</h5>
</header>
<div class="w3-row-padding ">
<button type="button" onclick="document.getElementById('anouncements-form').style.display='block'" class="w3-btn w3-margin-bottom w3-border w3-round">
    <i class="fa fa-plus fa-fw"></i> New Anouncements
    </button>
    <table class="w3-table">
    <tr class="w3-dark-grey">
        <th>Date Created</th>
        <th>Year</th>
        <th>Sections</th>
        <th>Details</th>
        <th class="w3-center">Action</th>
    </tr>
        <?php 
          if (isset($_GET['page_to'])) { $page_to = $_GET['page_to'];} else {$page_to = 1;}
          list($feed, $total_pages) = anouncements($page_to);
          $count = mysqli_num_rows($feed);
          if($count != 0 ){
            while($feeds = mysqli_fetch_assoc($feed)){
        ?>
            <tr>
              <td><?php echo $feeds["date_created"]; ?></td>
              <td><?php echo $feeds["year"]; ?></td>
              <td><?php echo $feeds["section"]; ?></td>
              <td><?php echo $feeds["description"]; ?></td>
              <td class="w3-center">
              <a onclick="anouncements_data('<?php echo $feeds['trackid']; ?>');" class="w3-btn w3-small w3-border w3-round"><i class="fa fa-edit"></i></a>
              <a onclick="anouncements_delete('<?php echo $feeds['trackid']; ?>');" class="w3-btn w3-small w3-red w3-border w3-round"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
        <?php 
            }
          }else{
            echo "<tr><td colspan='5' class='w3-center'>0 Feeds</td></tr>";
          }
        ?>
    </table>
    <?php 
        echo paginations("?page=anouncements", $page_to, $total_pages)
    ?>
</div>

<!---------------ADD FORM MODAL------------------>
<div id="anouncements-form" class="w3-modal">
<div class="w3-modal-content w3-animate-top w3-card-4" style="width:500px;">
    <header class="w3-row-padding w3-white w3-margin-bottom w3-bottombar"> 
    <span id="closed_href"><span onclick="document.getElementById('anouncements-form').style.display='none'" 
    class="w3-button w3-display-topright w3-medium fa fa-times"></span></span>
    <h4><i class="fa fa-plus fa-fw"></i> New Anouncements</h4>
    </header>
    <form class="w3-container" id="anouncments-form-add">
        <input type="hidden" name="action_type" value="add_anouncements" readonly>
        <input type="hidden" name="course" value="<?php echo $details["handle_course"]; ?>" readonly>
        <input type="hidden" name="trackid" value="<?php echo trackid(); ?>" readonly>
        <label>Subject</label>
        <input type="text" name="subject" class="w3-input w3-border w3-round-xxlarge"> 
        <div class="w3-col m6"  style="padding-right:5px;">
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
            </div>
            <div class="w3-col m6">
            <label>Sections Vissible:</label>
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
        <label>Details:</label>
        <textarea name="description" style="height: 80px;" class="w3-input w3-border w3-round"></textarea>
        <div id="result_an_add"></div>
        </form>
        <footer class="w3-container w3-padding w3-center" id="submit_an_add">
            <button type="button" onclick="anouncements_add();" class="w3-btn w3-border w3-green w3-round-xxlarge">
            Create
            </button>
        </footer>
    </div>
</div>

<!---------------EDIT FORM MODAL------------------>
<div id="anouncements-edit-form" class="w3-modal">
<div class="w3-modal-content w3-animate-top w3-card-4" style="width:500px;">
    <header class="w3-row-padding w3-white w3-margin-bottom w3-bottombar"> 
    <span id="closed_an_edit"><span onclick="document.getElementById('anouncements-edit-form').style.display='none'" 
    class="w3-button w3-display-topright w3-medium fa fa-times"></span></span>
    <h4><i class="fa fa-edit fa-fw"></i> Edit Anouncements</h4>
    </header>
    <form class="w3-container" id="anouncments-form-edit">
        <input type="hidden" name="action_type" value="edit_anouncements" readonly>
        <input type="hidden" name="trackid"  id="trackid" readonly>
        <label>Subject</label>
        <input type="text" name="subject" id="subject" class="w3-input w3-border w3-round-xxlarge"> 
        <div class="w3-col m6"  style="padding-right:5px;">
            <label>College Year:</label>
            <select name="year" id="year" class="w3-input w3-border w3-round-xxlarge">
            <?php 
                $year = year_list();
                while($list = mysqli_fetch_assoc($year)){
                echo "<option value='".$list["value"]."'>".$list["value"]."</option>";
                }
            ?>
            </select>
            </div>
            <div class="w3-col m6">
            <label>Sections Vissible:</label>
            <select name="section" id="section" class="w3-input w3-border w3-round-xxlarge">
                <?php 
                $section = sections_list();
                while($list = mysqli_fetch_assoc($section)){
                    echo "<option value='".$list["value"]."'>".$list["value"]."</option>";
                }
                ?>
            </select>
            </div>
        <label>Details:</label>
        <textarea name="description" id="description" style="height: 80px;" class="w3-input w3-border w3-round"></textarea>
        <div id="result_an_edit"></div>
        </form>
        <footer class="w3-container w3-padding w3-center" id="submit_an_edit">
            <button type="button" onclick="anouncements_edit();" class="w3-btn w3-border w3-white w3-round-xxlarge">
            Update
            </button>
        </footer>
    </div>
</div>