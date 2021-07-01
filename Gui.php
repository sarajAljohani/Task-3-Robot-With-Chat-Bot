<?php
    // Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "task1_robot";
    $feedback = "";
    $angles = array();
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    function update_arm($base, $shoulder, $elbow, $wrist, $gripper,$engin6, $power){
        global $conn;

        $query = "UPDATE arm SET base = ".$base.", shoulder = ".$shoulder.", elbow = ".$elbow.", wrist = ".$wrist.", gripper = ".$gripper.", engin6 = ".$engin6.",power = ".$power;
        $result = mysqli_query($conn, $query);
        if(!$result)
            echo $conn->error;
        return $result;

    }


    function get_arm_values(){
        global $conn;

        $query = "SELECT * FROM arm";
        $result = mysqli_query($conn, $query);
        if(!$result)
            echo $conn->error;

        return ($result->fetch_assoc());
    }

    function update_base($direction){
        global $conn;

        $query = "UPDATE base SET direction = '".$direction."'";
        $result = mysqli_query($conn, $query);
        if(!$result)
            echo $conn->error;
        return $result;

    }

    function get_base_state(){
        global $conn;

        $query = "SELECT * FROM base";
        $result = mysqli_query($conn, $query);
        if(!$result)
            echo $conn->error;

        return ($result->fetch_assoc());
    }
    
    $movement_feedback = "<p style='color:green'><b>".get_base_state()['direction']."</b></p>";;

    if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
        if(isset($_POST['move'])){
            if(update_base($_POST['move']))
                $movement_feedback = "<p style='color:green'><b>".get_base_state()['direction']."</b></p>";
            else
                $movement_feedback = "<p style='color:red'>Not Responding!</p>";
        }
        else{
            if(isset($_POST["save"]) && $_POST["save"] == "SAVE")
                $_POST["power"] = 0;
            else
                $_POST["power"] = 1;


            if(update_arm($_POST['base'], $_POST['shoulder'], $_POST['elbow'], $_POST['wrist'], $_POST['gripper'],$_POST["e6"], $_POST['power']))
                $feedback = "<p style='color:green'>data have been saved successfuly</p>";
            else
                $feedback = "<p style='color:red'>Save Failed!!</p>";
        }

        
    }
    $angles =  get_arm_values();

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control</title>

    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <div class="panel">
        <h2>control robot's arm</h2>
        <form class="" action="Gui.php" method="post">
            <fieldset>
                <div class="engin">
                    <label for="base">Base </label>
                    <input type="range" id="base" name="base" min="0" max="360" value =<?php echo $angles['base']; ?>   />
                    <span class="angle"></span>
                </div>

                <div class="engin">
                    <label for="shoulder">Shoulder </label>
                    <input type="range" id="shoulder" name="shoulder" min="0" max="180" value=<?php echo $angles['shoulder']; ?> />
                    <span class="angle"></span>
                </div>

                <div class="engin">
                    <label for="elbow">Elbow </label>
                    <input type="range" id="elbow" name="elbow" min="0" max="90" value=<?php echo $angles['elbow']; ?> />
                    <span class="angle"></span>
                </div>

                <div class="engin">
                    <label for="wrist">Wrist </label>
                    <input type="range" id="wrist" name="wrist" min="0" max="90" value=<?php echo $angles['wrist']; ?> />
                    <span class="angle"></span>
                </div>

                <div class="engin">
                    <label for="gripper">Gripper </label>
                    <input type="range" id="gripper" name="gripper" min="0" max="90" value=<?php echo $angles['gripper']; ?> />
                    <span class="angle"></span>
                </div>

                <div class="engin">
                    <label for="e6">Engin 6 </label>
                    <input type="range" id="e6" name="e6" min="0" max="90" value=<?php echo $angles['engin6']; ?> />
                    <span class="angle"></span>
                </div>

                <div class="btns">
                    <input type="submit" name="save" value="SAVE">
                    <input type="submit" name="operate" value="OPERATE">

                </div>
                <?php echo $feedback; ?>
            </fieldset>

        </form>
    </div>
    <div class="panel">
        <h2>control robot's base</h2>
        <form class="" action="Gui.php" method="post">
            <fieldset>
                <div class="movement-btns">
                    <div class="btn forward">
                        <input type="submit" value="Forward" name="move">
                    </div>

                    <div class="btn left">
                        <input type="submit" value="Left" name="move">
                    </div>

                    <div class="btn stop">
                        <input type="submit" value="Stop" name="move">
                    </div>

                    <div class="btn right">
                        <input type="submit" value="Right" name="move">
                    </div>

                    <div class="btn back">
                        <input type="submit" value="Backward" name="move">
                    </div>
                </div>
                <br>
                <p>current state: <?php echo $movement_feedback; ?></p>
            </fieldset>
        </form>
    </div>
    <script>
  window.watsonAssistantChatOptions = {
      integrationID: "f2ff2cda-913e-43f6-a542-6cde71bef058", // The ID of this integration.
      region: "eu-de", // The region your integration is hosted in.
      serviceInstanceID: "8773ac61-228f-4c84-9d6b-14cab40a8bbd", // The ID of your service instance.
      onLoad: function(instance) { instance.render(); }
    };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
    document.head.appendChild(t);
  });
</script>
</body>

</html>
