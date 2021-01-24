<?php session_start();

include $_SERVER['DOCUMENT_ROOT']."/cse341/web/common/header.php";
?>

include $_SERVER['DOCUMENT_ROOT']."/cse341/web/common/header.php"; 
if(!empty($_SESSION['Folder']))
{
    echo $_SESSION['Folder'];
}
else
{
    echo "Session not set yet.";
}?>
<main>
  <h1>School Supplies</h1>
  <form action="shoppingCart.php" method="POST">
    <input type="checkbox" name="selection[]" id="pencil" value="Pencil">
    <label for="pencil">Pencil</label><br>
    <input type="checkbox" name="selection[]" id="pen" value="Pen">
    <label for="pen">Pen</label><br>
    <input type="checkbox" name="selection[]" id="notebook" value="Notebook">
    <label for="notebook">Notebook</label><br>
    <input type="checkbox" name="selection[]" id="crayons" value="Crayons">
    <label for="crayons">Crayons</label><br>
    <input type="checkbox" name="selection[]" id="markers" value="Markers">
    <label for="markers">Markers</label><br>
    <input type="checkbox" name="selection[]" id="scissors" value="Scissors">
    <label for="scissors">Scissors</label><br>
    <input type="checkbox" name="selection[]" id="folder" value="Folder">
    <label for="folder">Folder</label><br><br><br>

    <input type="submit" value="Go To Cart">

  </form>
</main>
</body>

</html>