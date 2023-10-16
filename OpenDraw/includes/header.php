  <?php
  include("../veerTejaAdmin/includes/connection.php");
  $prizelist = mysqli_query($conn, "SELECT * FROM winner");
  ?>
  <div class="navigation active">
    <ul>
      <?php
      while($row = mysqli_fetch_assoc($prizelist)) {
        echo "<li>
        <a href='Home'>
          <span class='icon'>$row[rank]</span>
          <span class='title'>$row[PrizeName]</span>
        </a>
        </li>";
      }
      ?>
    </ul>
  </div>


  <script type="text/javascript">
    function toggleMenu() {
      let navigation = document.querySelector('.navigation');
      let bodypart = document.querySelector('.bodypart');
      let toggle = document.querySelector('.toggle');
      navigation.classList.toggle('active');
      toggle.classList.toggle('active');
      bodypart.classList.toggle('active');
    }
  </script>
