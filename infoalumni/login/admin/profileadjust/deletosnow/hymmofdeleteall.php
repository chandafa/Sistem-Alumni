<?php
include '../../../koneksi.php';
session_start();
if($_SESSION['status']!="sudah_login"){
    header("location:../login.php");
    die;
}elseif($_SESSION['level']!="admin"){
  header("location:../user/index.php");
    die;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Hymm Of Delete</title>
    <style>
      body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: #fcf3ec;
}

.button {
  --offset: 10px;
  --border-size: 2px;
  display: block;
  position: relative;
  padding: 1.5em 3em;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  border: 0;
  background: transparent;
  color: #e55743;
  text-transform: uppercase;
  letter-spacing: 0.25em;
  outline: none;
  cursor: pointer;
  font-weight: bold;
  border-radius: 0;
  box-shadow: inset 0 0 0 var(--border-size) currentcolor;
  transition: background 0.8s ease;
}
.button:hover {
  background: rgba(100, 0, 0, 0.03);
}
.button__horizontal, .button__vertical {
  position: absolute;
  top: var(--horizontal-offset, 0);
  right: var(--vertical-offset, 0);
  bottom: var(--horizontal-offset, 0);
  left: var(--vertical-offset, 0);
  transition: transform 0.8s ease;
  will-change: transform;
}
.button__horizontal::before, .button__vertical::before {
  content: "";
  position: absolute;
  border: inherit;
}
.button__horizontal {
  --vertical-offset: calc(var(--offset) * -1);
  border-top: var(--border-size) solid currentcolor;
  border-bottom: var(--border-size) solid currentcolor;
}
.button__horizontal::before {
  top: calc(var(--vertical-offset) - var(--border-size));
  bottom: calc(var(--vertical-offset) - var(--border-size));
  left: calc(var(--vertical-offset) * -1);
  right: calc(var(--vertical-offset) * -1);
}
.button:hover .button__horizontal {
  transform: scaleX(0);
}
.button__vertical {
  --horizontal-offset: calc(var(--offset) * -1);
  border-left: var(--border-size) solid currentcolor;
  border-right: var(--border-size) solid currentcolor;
}
.button__vertical::before {
  top: calc(var(--horizontal-offset) * -1);
  bottom: calc(var(--horizontal-offset) * -1);
  left: calc(var(--horizontal-offset) - var(--border-size));
  right: calc(var(--horizontal-offset) - var(--border-size));
}
.button:hover .button__vertical {
  transform: scaleY(0);
}
.button:active{
  background-color: #e55743;
  transform: translateY(4px);
}
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <?php if(isset($_GET['logout']) == true){ ?>
      <meta http-equiv="refresh" content="2;url=../../../logout.php" />
   <?php } ?>
  </head>
  <body>
    <center>
      <button class="button" data-bs-toggle="modal" data-bs-target="#modal">
        Reset All Data
        <div class="button__horizontal"></div>
        <div class="button__vertical"></div>
      </button>
      <?php if(isset($_GET['pesan'])) { ?>
        <br>
      <div class="alert alert-danger">
        <?php echo $_GET['pesan']; ?>
      </div>
      <?php } ?>
    </center>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reset All Data Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            This action will reset all the entire data to stock state.
            Please be careful before reseting. Type <span style="color:red;">Confirm Reset Data</span>.
            <div class="alert alert-danger">
              Note: It's Case-Sensitive.Also, It will reset user to default settings(1 User, Username:admin, Password:admin) Thanks.
            </div>
            <form method="POST" action="deletos.php">
              <input class="form-control" placeholder="Type Here!" name="confirm" /> <br>
              <input type="submit" value="CONFIRM!" name="submit" class="btn btn-warning" />
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</html>