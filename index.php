  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#b8daff" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="konami.js"></script>
    <script src="https://kit.fontawesome.com/0528c2bae4.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Pilot Speak Generator</title>
  </head>
  <style>

  </style>
  <body>
    <div class="container">
    <h1 class="display-4">Pilot Speak v2</h1>
    <h4 class="fancyfont">What is "Pilot Speak Generator"?</h4>
    <p class="fancyfont">Have you ever found yourself with a group of pilots and wanted something to contribute to the conversation? Well now you can! This interactive tool will allow you to easily generate (potentially) relevant topics to spark discussion!</p>
    </div>

    <?php
    $buzzword1 = Array('fuel loads','minimums','credit hours','ACARS','LAX terminal','KMSP terminal','ASRS','jump seat','release','sink rate','jump seat','bids','jet bridge','INOP equipment','crew meals','reserve trips','night recurrent','GoGo™ Inflight Wifi'); //BLUE
    $location_noun1 = Array('the Airbus','the CRJ-900','the CRJ-200','salt lake overnight','the 737','the 737 MAX','our Hotel Van','my check ride'); //GREY
    $time = Array('last night','during my last leg','during my last trip','last month','while based in NY','during IOE','after IOE','during captain upgrade','@ Oshkosh Airventure','@ JetBlue'); //GREEN
    $descriptor = Array('really nuts','over-credited','not in-line with our mission statement','against the contract','against ALPA regulations','in question by my chief pilot','questionable, at best','a bit sketchy','totally not legal','super f**ked up','enough to break guarantee'); //YELLOW

    $pick1 = $buzzword1[array_rand($buzzword1)];
    $pick2 = $location_noun1[array_rand($location_noun1)];
    $pick3 = $time[array_rand($time)];
    $pick4 = $descriptor[array_rand($descriptor)];
    $line = "The " . $pick1 . " on " . $pick2 . " " . $pick3 . " was " . $pick4;
    $lineurl = str_replace(' ', '%20', $line);
    ?>

    <div class="container">
      <div class="card">
        <div class="card-body lol1" style="text-align: center; font-size: 150%;">
            <p class="fonty">The <span class="badge badge-primary" style="transform: rotate(2deg); box-shadow: 2px 1px 5px grey;"><?php echo $pick1; ?></span> on <span class="badge badge-secondary" style="transform: rotate(-1deg);box-shadow: 2px 1px 5px grey;"><?php echo $pick2; ?></span> <span class="badge badge-success" style="transform: rotate(1deg);box-shadow: 2px 1px 5px grey;"><?php echo $pick3; ?></span>
           was <span class="badge badge-warning" style="transform: rotate(1deg);box-shadow: 2px 1px 5px grey;"><?php echo $pick4; ?>.</span></p>
         </div>
         <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary" onclick="copyText()" id="peep"><i class="fas fa-copy"></i> Copy</button>
          <button type="button" class="btn btn-light" onclick="window.location.href = 'https://twitter.com/intent/tweet?text=<?php echo $lineurl; ?>';"><i class="fab fa-twitter"></i> Share on Twitter</button>
          <button type="button" class="btn btn-light" onclick="window.location.href = 'https://telegram.me/share/url?text=<?php echo $lineurl; ?>';"><i class="fab fa-telegram-plane"></i> Share on Telegram</button>
          <button type="button" class="btn btn-success" onclick="window.location.href = '.';"><i class="fas fa-sync-alt"></i></button>
        </div>
       </div>
       <?php
        $file = 'totalgens.txt'; // the name of the text file (must be writeable by the server)
        $orderNumber = file_get_contents ($file); // read file data and store as variable
        $fdata = intval($orderNumber)+1; // increment the value
        file_put_contents($file, $fdata); // write the new value back to file
        $yes = number_format($fdata);
        $totalcombo = count($descriptor) * count($time) * count($location_noun1) * count($buzzword1);
        $totalcomboformatted = number_format($totalcombo);
        $wordbank = count($descriptor) + count($time) + count($location_noun1) + count($buzzword1);
        $wordbankformatted = number_format($wordbank);?>
      <p><small>So far, <mark><strong><?php echo $yes ?></strong></mark> phrases were generated using this app. Application made in love by <a href="http://t.me/drraccoon/">@DrRaccoon</a> for <a href="http://t.me/vulan/">@Vulan</a> and all my other aviation friends. Like what I make? <a href="https://ko-fi.com/drraccoon"><i class="fad fa-mug-hot"></i> Buy me a coffee</a>!<br>
        There are currenly <mark><? echo $wordbankformatted; ?></mark> words, making <mark><? echo $totalcomboformatted; ?></mark> total combinations. Want to contribute more phases and words? Join this <a href="https://t.me/PilotSpeak">telegram group</a>. Last updated: <mark><? echo "".date("F d Y.",filemtime("index.php")); ?></mark></small></p>
        <center><p>Accidentally made in <i class="fab fa-php"></i></center></p>
     </div>
     <input type="text" value="The <?php echo $pick1; ?> on <?php echo $pick2; ?> <?php echo $pick3; ?> was <?php echo $pick4; ?>." id="textInput" style="opacity: 0;">
     <script>
     function copyText(){
       navigator.vibrate(500);
         var text = document.getElementById("textInput");
         text.select();
         document.execCommand("copy");
         document.getElementById("peep").innerHTML = "Copied!";
         text.focus();
        text.setAttribute('style', 'display:none;');
     }
     </script>

     <script>
       konami.load();
       var easter_egg = new Konami('http://your-special-easter-egg-website.com');
     </script>
  </body>
</html>
