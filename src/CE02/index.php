<html>
  <head>
    <meta charset="UTF-8">
    <title>Rando Page</title>
  </head>
  <body>
    <?php
      print("
        <table>
          <tr>
            <th>Player</th>
            <th>Computer</th>
            <th>Rounds</th>
          </tr>
      ");
      
      $score = 0;
      for ($round = 0; $round < 10; $round++) {
        $player = rand(1, 100);
        $computer = rand(1, 100);

        if ($player > $computer) {
          $winner = 'Player Wins';
          $score++;
        } else {
          $winner = 'Computer Wins';
          $score--;
        }

        print("
          <tr>
            <td>$player</td>
            <td>$computer</td>
            <td>$winner</td>
          </tr>
        ");
      }

      print("
          <tr>
            <td colspan=2>$score</td>
            <td>Player Score</td>
          </tr>
        </table>
      ");

      if ($score > 0) {
        print('<p>Player wins!</p>');
      } else if ($score < 0) {
        print('<p>Computer wins!</p>');
      } else {
        print('<p>It\'s a tie!</p>');
      }

      //Year of the---

      $year = date("Y");
      $animal = '';

      switch ($year % 12) {
        case 0:
          $animal = 'Monkey';
          break;
        case 1:
          $animal = 'roster';
          break;
        case 2:
          $animal = 'dog';
          break;
        case 3:
          $animal = 'boar';
          break;
        case 4:
          $animal = 'rat';
          break;
        case 5:
          $animal = 'ox';
          break;
        case 6:
          $animal = 'tiger';
          break;
        case 7:
          $animal = 'rabbit';
          break;
        case 8:
          $animal = 'dragon';
          break;
        case 9:
          $animal = 'snake';
          break;
        case 10:
          $animal = 'horse';
          break;
        case 11:
          $animal = 'lamb';
          break;
        default:
          $animal = 'Something went wrong!';
      }
    ?>
    <p>It is the year of the: <?php echo $animal; ?></p>
  </body>
</html>
