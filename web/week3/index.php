<?php include '../common/header.php'; ?>

  <form action="form.php" method="POST">
    <label for="name">Name</label> 
    <input type="text" name="name" id="name"><br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email"><br><br><br>
    
    <p><strong><u>Major</u></strong></p>
    <input type="radio" id="cs" name="major" value="Computer Science">
    <label for="cs">Computer Science</label><br>
    <input type="radio" id="wdd" name="major" value="Web Design and Development">
    <label for="wdd">Web Design and Development</label><br>
    <input type="radio" id="cis" name="major" value="Computer Information Technology">
    <label for="cis">Computer Information Technonlgy</label><br>
    <input type="radio" id="ce" name="major" value="Computer Engineering">
    <label for="ce">Computer Engineering</label><br><br><br>

    <label for="comments">Comments</label>
    <textarea id="comments" name="comments"></textarea><br><br>

    <p><strong><u>Which continents have you visited?</u></strong></p>
    <input type="checkbox" id="nAmerica" name="continents[]" value="North America">
    <label for="nAmerica">North America</label><br>
    <input type="checkbox" id="sAmerica" name="continents[]" value="South America">
    <label for="sAmerica">South America</label><br>
    <input type="checkbox" id="europe" name="continents[]" value="Europe">
    <label for="europe">Europe</label><br>
    <input type="checkbox" id="asia" name="continents[]" value="Asia">
    <label for="asia">Asia</label><br>
    <input type="checkbox" id="australia" name="continents[]" value="Australia">
    <label for="australia">Australia</label><br>
    <input type="checkbox" id="africa" name="continents[]" value="Africa">
    <label for="africa">Africa</label><br>
    <input type="checkbox" id="antarctica" name="continents[]" value="Antarctica">
    <label for="antarctica">Antarctica</label><br><br><br>

    <input type="submit">
  </form>
</body>
</html>