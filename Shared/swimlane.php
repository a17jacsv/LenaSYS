<!-- Overlay -->
<script src="js/jquery-1.11.0.min.js"></script>
<?php
    date_default_timezone_set("Europe/Stockholm");

    // Include basic application services!
    include_once "../Shared/sessions.php";
    include_once "../Shared/basic.php";

    pdoConnect();
    session_start();

    $course = $_GET["courseid"];
    $vers = $_GET["coursevers"];

    $querystring = "SELECT coursecode, coursename FROM course WHERE cid=:cid";
    $stmt = $pdo->prepare($querystring);
    $stmt->bindParam(':cid', $course);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        // Error handling to $debug
    }

?>

  <div id="overlay" style="display:none"></div>
  
	<!-- Swimlane Box Start! -->

  <div id="swimlanebox" class="swimlanebox" style="display:block">
      <div id="weeks" style="left: 5px; position:absolute; background: white">
          <svg width="200" height="770">
              <?php
                  foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                      echo '<text y="15" x="10" fill="black">' . $row['coursecode'] . '</text>';
                      echo '<text y="35" x="10" fill="black">' . $row['coursename'] . '</text>';
                  }
                      echo '<text y="55" x="10" fill="black">Version: ' . $vers . '</text>';
              ?>
              <rect x="0" y="70" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <rect x="0" y="140" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <rect x="0" y="210" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <rect x="0" y="280" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <rect x="0" y="350" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <rect x="0" y="420" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <rect x="0" y="490" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <rect x="0" y="560" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <rect x="0" y="630" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <rect x="0" y="700" width="200" height="70" style="fill:rgb(255,255,255);stroke-width:2;stroke:rgb(0,0,0)" />
              <text x="70" y="110" fill="black">Week 1</text>
              <text x="70" y="180" fill="black">Week 2</text>
              <text x="70" y="250" fill="black">Week 3</text>
              <text x="70" y="320" fill="black">Week 4</text>
              <text x="70" y="390" fill="black">Week 5</text>
              <text x="70" y="460" fill="black">Week 6</text>
              <text x="70" y="530" fill="black">Week 7</text>
              <text x="70" y="600" fill="black">Week 8</text>
              <text x="70" y="670" fill="black">Week 9</text>
              <text x="70" y="740" fill="black">Week 10</text>
          </svg>
      </div>
      <script>
          $(window).scroll(function(){
              $('#weeks').css({
                  'left': $(this).scrollLeft() + 5
              });
          });
      </script>
      <svg width="2000" height="770">

          <?php if (isset($_GET["courseid"]) && isset($_GET["coursevers"])) {

              $querystring = "SELECT listentries.entryname, listentries.kind, quiz.qrelease, quiz.deadline 
                        FROM listentries LEFT JOIN quiz ON  listentries.link = quiz.id WHERE listentries.cid = :cid AND listentries.vers = :vers;";
              $stmt = $pdo->prepare($querystring);
              $stmt->bindParam(':cid', $course);
              $stmt->bindParam(':vers', $_GET["coursevers"]);

              try {
                  $stmt->execute();
              } catch (PDOException $e) {
                  // Error handling to $debug
              }

              $white = true;
              $i = 0;
              $j = 0;
              $pos = 0;
              $oldWeek = 0;
              foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                  if ($row['kind'] == 4) {
                      $j = 0;
                      $pos = (($i * 200) + 230);
                      echo '<text y="50" x="' . $pos . '" fill="black">' . $row['entryname'] . '</text>';
                      echo '<rect y="70" x="' . $pos . '" width="200" height="700" style="fill:rgb(';
                      if ($white) {
                          echo '255,255,255';
                          $white = false;
                      } else {
                          echo '230,230,230';
                          $white = true;
                      }
                      echo ')" />';
                      $i++;
                  } else if ($row['kind'] == 3) {
                      $deadlinedate = new DateTime($row['deadline']);
                      $startdate = new DateTime($row['qrelease']);
                      $deadlineweek = $deadlinedate->format("W");
                      $startweek = $startdate->format("W");
                      if ($j == 0) {
                          $oldWeek = $deadlineweek;
                      }

                      echo '<line x1="' . ($pos + $j + 10) . '" y1="' . (100 + ($startweek - 1) * 70) .
                          '" x2="' . ($pos + $j + 30) .
                          '" y2="' . (100 + ($startweek - 1) * 70) .
                          '" style="stroke:rgb(15,126,18);stroke-width:2" />';
                      echo '<line x1="' . ($pos + $j + 20) . '" y1="' . (100 + ($startweek - 1) * 70) .
                          '" x2="' . ($pos + $j + 20) .
                          '" y2="' . (100 + ($deadlineweek - 1) * 70) . '" style="stroke:rgb(15,126,18);stroke-width:2" />';
                      echo '<circle cx="' . ($pos + $j + 20) . '" cy="' . (100 + ($deadlineweek - 1) * 70) .
                          '" r="10" stroke="green" stroke-width="2" fill="yellow" />';
                      echo '<text y="' . (130 + (($oldWeek == $deadlineweek) ? $j : 0) + ($deadlineweek - 1) * 70) .
                          '" x="' . ($pos + $j + 20) . '" fill="black">' . $row['entryname'] . '</text>';
                      $j += 25;
                      $oldWeek = $deadlineweek;

                  }
              }

          }
          ?>

      </svg>
  
  
  </div>

