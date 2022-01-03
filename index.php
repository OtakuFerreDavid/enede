<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>7 i Mig</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <?php

use Hamcrest\Type\IsNumeric;

if (isset($_GET["partida"])) {    
    $partida = $_GET["partida"];
    $acumulat = 0;
    $cartes = "";
    $aposta = $_GET["aposta"];
    if(empty($aposta))
    {
      $aposta = 10;
      echo '<div class="alert alert-info" role="alert">Com que no has posat una quantitat a apostar, entenc que et jugues tota la nota ;)</div>';
    }
    if(!is_numeric($aposta))
    {
      $aposta = 10;
      echo '<div class="alert alert-info" role="alert">Com que no has posat una quantitat correcte, entenc que et jugues tota la nota ;)</div>';
    }
    if (isset($_GET["acumulat"])) {
      $acumulat = $_GET["acumulat"];
    }
    if (isset($_GET["cartes"])) {
      $cartes = $_GET["cartes"];
    }
    if ($partida == 2) {
      $cartesM = "";
      $acumulatM = 0.0;
      while ($acumulatM < $acumulat) {
        $cartaM = rand(1, 10);
        if ($cartaM == 8) {
          $acumulatM = $acumulatM + 0.5;
          $cartaM = 10;
        } else if ($cartaM == 9) {
          $acumulatM = $acumulatM + 0.5;
          $cartaM = 11;
        } else if ($cartaM == 10) {
          $acumulatM = $acumulatM + 0.5;
          $cartaM = 12;
        } else {
          $acumulatM = $acumulatM + $cartaM;
        }
        $cartesM = $cartesM . "[" . $cartaM . "]";
      }
      echo '<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
    <div class="card-header">
    <h1 class="card-title">T\'HAS PLANTAT</h1>      
  </div>
      <div class="card-body">
      <ul class="list-group list-group-flush">
      <li class="list-group-item">
      <div class="alert alert-info" role="alert">Cartes: ' . $cartes . '</div></li>
      <li class="list-group-item">
      <div class="alert alert-warning" role="alert">Total: ' . $acumulat . '</div></li>
    </ul>
     </div>
     <div class="card-footer">
     <div class="alert alert-dark" role="alert">Aposta: ' . $aposta . '</div>
     </div>
    </div>
  </div>
  
  <div class="col">
    <div class="card">
    <div class="card-header">
    <h1 class="card-title">LA BANCA</h1>      
  </div>
  <div class="card-body">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
    <div class="alert alert-info" role="alert">Cartes: ' . $cartesM . '</div></li>
    <li class="list-group-item">
    <div class="alert alert-warning" role="alert">Total: ' . $acumulatM . '</div></li>
  </ul>
  </div>
  <div class="card-footer">
  <div class="alert alert-dark" role="alert">Aposta: ' . $aposta . '</div>
    </div>
  </div>  
</div>
    ';
    if($acumulatM==7.5)
    {
      echo '<div class="alert alert-danger" role="alert">BAD LUCK! David WINS.<b> Has perdut ' . ($aposta*2) . ' punts en l\'examen</b></div>';    
    }
    else if($acumulatM < 7.5)
    {
      echo '<div class="alert alert-danger" role="alert">BAD LUCK! David WINS.<b> Has perdut ' . $aposta . ' punts en l\'examen</b></div>';    
    }
    else if($acumulat == 7.5)
    {
      echo '<div class="alert alert-success" role="alert">ENHORABONA!.<b> Has guanyat ' . ($aposta*2) . ' punts en l\'examen.</b> Ja estàs molt més aprop del aprovat (o no...)</div>';       
    }
    else
    {
      echo '<div class="alert alert-success" role="alert">ENHORABONA!.<b> Has guanyat ' . $aposta . ' punts en l\'examen.</b> Ja estàs més aprop del aprovat (o no...)</div>';       
    }
      echo '<br/><form>     
    <button type="submit" class="btn btn-dark">Una Altra!</button>
  </form>';
    } else {
      $carta = rand(1, 10);
      if ($carta == 8) {
        $acumulat = $acumulat + 0.5;
        $carta = 10;
      } else if ($carta == 9) {
        $acumulat = $acumulat + 0.5;
        $carta = 11;
      } else if ($carta == 10) {
        $acumulat = $acumulat + 0.5;
        $carta = 12;
      } else {
        $acumulat = $acumulat + $carta;
      }
      $cartes = $cartes . "[" . $carta . "]";
      echo '<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h1 class="card-title">Carta: ' . $carta . '</h1>      
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
      <div class="alert alert-info" role="alert">Cartes: ' . $cartes . '</div></li>
      <li class="list-group-item">
      <div class="alert alert-warning" role="alert">Acumulat: ' . $acumulat . '</div></li>
    </ul>
    <div class="card-body">
    <div class="alert alert-dark" role="alert">Aposta: ' . $aposta . '</div>
    </div>
  </div>';

      if ($acumulat > 7.5) {
        $acumulatM = 0.0;
        $cartaM = rand(1, 10);
        if ($cartaM == 8) {
          $acumulatM = $acumulatM + 0.5;
          $cartaM = 10;
        } else if ($cartaM == 9) {
          $acumulatM = $acumulatM + 0.5;
          $cartaM = 11;
        } else if ($cartaM == 10) {
          $acumulatM = $acumulatM + 0.5;
          $cartaM = 12;
        } else {
          $acumulatM = $acumulatM + $cartaM;
        }
        echo '<div class="alert alert-danger" role="alert">BAD LUCK! David WINS.<b> Has perdut ' . $aposta . ' punts en l\'examen</b>. La Banca ha guanyat amb un miserable '.$cartaM.'</div>';        
      echo '<br/><form>     
      <button type="submit" class="btn btn-dark">Una Altra!</button>
    </form>';
      } else {
        echo '<form>     
    <input type="hidden" class="form-control" name="cartes" value="' . $cartes . '">
    <input type="hidden" class="form-control" name="aposta" value="' . $aposta . '">
    <input type="hidden" class="form-control" name="acumulat" value="' . $acumulat . '">
    <button type="submit" name="partida" value="1" class="btn btn-success">Una Altra!</button>
    <button type="submit" name="partida" value="2" class="btn btn-danger">Em Planto</button>  
  </form>';
      }
    }
  } else {
    echo '<div class="card text-center">
    <div class="card-header">
      7 i MIG
    </div>
    <div class="card-body">
      <h5 class="card-title">Els jocs de taula/cartes, la nostre especialitat</h5>
      <p class="card-text">
      <img src="7mig.png"></p>
      <form>
      <label  class="form-label">Aposta</label>
      <input type="text" class="form-control" name="aposta">
    <button type="submit" name="partida" value="0" class="btn btn-primary">Comencem</button>
    </form>
    </div>
    <div class="card-footer text-muted">
    
    <p>El <b>set i mig</b> és un joc de cartes molt senzill que es juga amb la baralla espanyola, traient els 8 i els 9. Es tracta d\'aconseguir acostar-se al 7 i 1/2, sense sobrepassar-lo. Els valors de les cartes són:
    </p>
    <ul><li>de l\'1 al 7, el seu valor.</li>
    <li>la sota, el cavall i el rei valen 1/2.</li></ul>
    <p>S\'anomena <i>banca</i> la persona encarregada de repartir les cartes (en aquest cas, la màquina); aquesta entitat haurà de competir amb els altres jugadors al final (només amb tu). Seguint l\'ordre de les agulles del rellotge, la banca va donant una carta a cada jugador; cada jugador només podrà amagar-ne una, la resta estarà cap amunt (en el nostre cas, seràn totes cap per amunt). Sempre que vulgui es podrà plantar i passar el torn a la banca. Si en demanar cartes supera el 7 i 1/2, queda eliminat i la banca guanya. Si un dels jugadors fa el 7 i 1/2 passa a ser la banca i s\'emporta el doble del que ha apostat, si aquesta no aconsegueix fer el mateix.
    </p><p>Exemple de joc de dues persones;
    </p>
    <ol><li>Els jugadors fan l\'aposta mínima d\'entrada.</li>
    <li>La banca li dona carta al jugador.</li>
    <li>El jugador mira la carta i tria si es planta o si vol seguir amb una de nova.</li>
    <li>Si seguís, el jugador conta la puntuació de la seva carta més la que ha rebut.</li>
    <li>Seguit del lliurament d\'aquesta carta, el jugador torna a triar si es planta o segueix.</li>
    <li>Si es planta o es passa, ara és el torn de la banca. La banca mira la carta que tenia sobre la taula i tria si es planta o segueix. La banca només es planta si supera al jugador, si el jugador s\'ha passat la banca es plantarà amb la primera carta sense treure\'n cap més.</li>
    <li>Si el jugador guanya amb un 7 i mig s\'emporta el doble, si simplement ha guanyat s\'emporta la quantitat apostada.</li></ol>
  </div>';
  }
  ?>
</body>

</html>