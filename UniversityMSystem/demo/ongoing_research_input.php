<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ongoing Researches</title>
    <link rel="stylesheet" type="text/css" href="Style/Style.css">
</head>

<body>





    <form action="insert.php" method="post" style="background-color: #89C4F4">
        <center><h1 style="background-color:Tomato; font-size: 40px; padding: 15px;">Ongoing Researches</h1></center>
            <center><h2>Contact Information</h2></center>
            
            <div>
              <label for="research_name">
                <span>Research Name: </span>
              </label>
              <input type="text" id="research_name" name="research_name">
            </div>
             <div>
              <label for="group_name">
                <span>Group Name: </span>
              </label>
              <input type="text" id="group_name" name="group_name">
            </div>
             <div>
              <label for="group_leader">
                <span>Group Leader: </span>
              </label>
              <input type="text" id="leader" name="group_leader">
            </div>
             <div>
              <label for="superviser">
                <span>Superviser: </span>
              </label>
              <input type="text" id="superviser" name="superviser">
            </div>
             <div>
              <label for="start_date">
                <span>Research Starting Date: </span>
              </label>
              <input type="text" id="start_date" name="start_date">
            </div>
             <div>
              <label for="end_date">
                <span>Research Ending Date: </span>
              </label>
              <input type="text" id="end_date" name="end_date">
            </div>
        <section>
            <p> <button type="submit" value="Submit" style="padding: 10px; font-style: bold; font-size: 20px; background-color: #049372">Submit Data</button> </p>
        </section>
    </form>
</body>

</html>