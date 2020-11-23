<?php
if (!empty($_POST)){
    $no=$_POST['selec'];
    $first_name=$_POST['firstName'];
    $last_name=$_POST['lastName'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://api.icndb.com/jokes/random/$no?firstName=$first_name&lastName=$last_name");
    curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS,"firstName=John&lastName=Doe");-didn't worked
    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    curl_close ($ch);
    $response = json_decode($server_output,true);
    for($i=0;$i<=$no;$i++){
        foreach($response as $orders=>$value) {
            if (isset($value[$i]['joke'])) {
                echo $value[$i]['joke']."<br />";
              }
          }
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jokes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Jokes For Friends</h2>
  <form method="POST" action="">
    <div class="form-group">
      <label for="FirstName">First Name:</label>
      <input type="text" class="form-control" id="firstName" placeholder="Enter FirstName" name="firstName" required>
    </div>
    <div class="form-group">
      <label for="LastName">Last Name:</label>
      <input type="text" class="form-control" id="lastName" placeholder="Enter LastName" name="lastName" required>
    </div>
    <div class="form-group">
      <label for="selec">No Of Jokes:</label>
      <select class="form-control" id="selec" name="selec">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
      </select>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
