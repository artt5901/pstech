<!doctype html>
<html lang="en">

<head>
  <link rel="icon" href="icon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sarabun">
<style>
    body,
    h1,
    h2,
    div,
    h3,
    h4,
    p {
        font-family: 'Sarabun';
    }
</style>


</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <nav class="navbar navbar-light bg-dark">
      <a class="navbar-brand" href="#">
        <img src="image/logo.png" width="60" height="60" alt="" loading="lazy">
      </a>
    </nav>
    <a class="navbar-brand">Phasaktara Technological College</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="showclassroom_teacher.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="edit_me_teacher.php">ข้อมูลส่วนตัว </a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            จัดการข้อมูลบุคคล
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="showstudent.php">ข้อมูลนักศึกษา</a>
            <a class="dropdown-item" href="#">ผลงานนักศึกษา</a>
            <a class="dropdown-item" href="showparent.php">ข้อมูลผู้ปกครอง</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="frm_addstudent.php">เพิ่มข้อมูลนักศึกษา</a>
            <a class="dropdown-item" href="#">เพิ่มผลงานนักศึกษา</a>
            <a class="dropdown-item" href="#">เพิ่มข้อมูล</a>
          </div>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            จัดการข้อมูลทั่วไป
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="showposition.php">ตำแหน่ง</a>
            <a class="dropdown-item" href="showdepartment.php">แผนก</a>
            <a class="dropdown-item" href="showbranch.php">สาขา</a>
            <a class="dropdown-item" href="showcourse.php">รายวิชา</a>
            <a class="dropdown-item" href="showclassroom.php">ตารางสอน</a>
            <a class="dropdown-item" href="showclass.php">หมู่เรียน</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="frm_addposition.php">เพิ่มข้อมูลตำแหน่ง</a>
            <a class="dropdown-item" href="frm_adddepartment.php">เพิ่มข้อมูลแผนก</a>
            <a class="dropdown-item" href="frm_addbranch.php">เพิ่มข้อมูลสาขา</a>
            <a class="dropdown-item" href="frm_addcourse.php">เพิ่มข้อมูลรายวิชา</a>
            <a class="dropdown-item" href="frm_addclassroom.php">เพิ่มตารางสอน</a>
            <a class="dropdown-item" href="frm_addclass.php">เพิ่มข้อมูลหมู่เรียน</a>
          </div>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            จัดการข้อมูลผลการเรียน
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="showclassroom_grade.php">ผลการเรียน</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">.....................</a>
          </div>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            จัดการข้อมูลตารางสอน
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="showclassroom_teacher.php">ตารางสอน</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            จัดการข้อมูลข่าวสาร
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="shownews.php">ข่าวสาร</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="frm_addnews.php">เพิ่มข้อมูลข่าวสาร</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout </a>
        </li>
        </li>
        
    </div>

  </nav>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>


  <script>
    $(document).ready(function() {
      $('#mytable').DataTable();
    });

    $(document).ready(function() {
      $('#mytable-news').DataTable({
        "oLanguage": {
          "sSearch": "ค้นหาชื่อข่าวสาร:"
        }
      });
    });
  </script>

<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
  function isInputNumber1(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9 && / ]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function isInputChar(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-z && A-Z && ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ั && ๊ && ็ && ใ && ๋ && ๆ && ไ && ำ]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function isInputUsername(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-z && A-Z && 0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function isInputPassword(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-z && A-Z && 0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
  function isInputThai(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ั && ๊ && ็ && ใ && ๋ && ๆ && ไ && ำ && .]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function isInputEng(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[[a-z && A-Z]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function isInputThaiNum(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ั && ๊ && ็ && ใ && ๋ && ๆ && ไ && ำ && . && 0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>

</body>

</html>