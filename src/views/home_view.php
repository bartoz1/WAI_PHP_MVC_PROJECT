<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuchnia Studenta</title>
  <?php include "includes/head2.inc.php"; ?>
  <script>
    function dancing(event, pixel){
        $(event.target).animate({top: pixel + 'px'}, function(){
        dancing(event, -pixel);
      });
    }
    $(document).ready(function(){
    var speed=120;//speed ot the text
    $('#dance a').hover(function(event){
          $(this).stop().animate({top: '-5px'}, speed, function(){
        dancing(event, 5);
      });
    }, function(){
      //mouse out
      $(this).stop().animate({top: '0'}, speed);
    });
    
    });
    </script>
    <style>
    #dance a{
      position:relative;
      top:0;
      margin-right:10px;
    }
    </style>
    <noscript>
      <style>
        .licznik, .gwiazdka{
          display: none;
        }
      </style>
    </noscript>
</head>
<body>
  <a id="top"></a>
  <div class="wrapper">
  <?php include "partial/menu.php"; ?>

  <main>
    <h1>Przepisy dla studentów</h1>
    
    
    <div class="przepis">
      
      <h2>Najpopularniejszy: Spagetti po bolońsku 
      <img class="gwiazdka" alt="*" id="p1" src="static/img/star.svg" onclick="klikniecie(event)"/></h2>
      
      <img class="jpg_przepisu" src="static/img/spagetti.jpg" alt="zdjęcie spagetti">

      <div class="skladniki">
        <b>Składniki: </b>
        <ul >
          <li>500 g makaronu spaghetti</li>
          <li>ok. 350 g mielonego mięsa drobiowego</li>
          <li>1 puszka pokrojonych pomidorów w zalewie</li>
          <li>1 cebula, 4 pieczarki</li>
          <li>ok. 100 g startego sera (parmezanu)</li>
          <li>olej, sól, pieprz, tymianek, oregano</li>
        </ul>
      </div>
      <div class="clear"></div>
      <p class="opis">Sposób przygotowania:<br/>Cebulę obrać, drobno posiekać, podsmażyć na rozgrzanym oleju. Pieczarki umyć obrać, zetrzeć na tarce i dodać do cebuli. Włożyć mięso. Chwilę razem smażyć. Dodać pomidory wraz z zalewą. Dalej dusić ok. 20 minut, aż sos nieco się zagęści. Doprawić do smaku solą, pieprzem oraz ziołami (jeżeli sos wyszedł za gęsty dolej wody i dodaj łyżkę przecieru pomidorowego).
        Makaron ugotować w osolonym wrzątku (po dodaniu łyżki oleju, makaron nie będzie się kleił), odcedzić. Wyłożyć na talerze, polać sosem i posypać serem.</p>
    </div>

    <br/>
    <div class="przepis">
      <h2>Zupa grzybowa<img class="gwiazdka" alt="*" id="p2" src="static/img/star.svg" onclick="klikniecie(event)"/></h2>
      
      <img class="jpg_przepisu" src="static/img/zupa-grzybowa.jpg" alt="zdjęcie zupy grzybowej">

      <div class="skladniki">
        <b>Składniki: </b>
        <ul >
          <li>500 g świeżych lub mrożonych grzybów</li>
          <li>1 cebula</li>
          <li>1 litr wywaru warzywnego</li>
          <li>2 łyżki masła</li>
          <li>1 marchewka</li>
          <li>ok. 50 ml słodkiej śmietany 30-36%</li>
          <li>garść natki pietruszki, sól, pieprz</li>
          <li>makaron</li>
        </ul>
      </div>
      <div class="clear"></div>
      <p class="opis">Sposób przygotowania:<br/>Grzyby oczyścić. (Grzyby najlepiej oczyścić szczoteczką z zabrudzeń. Jeśli to nie wystarczy można je szybko opłukać w misce z zimną wodą i osuszyć na ręczniku papierowym). Pokroić na spore kawałki.
        Cebulę obrać i pokroić w kostkę. Na patelni rozgrzać masło. Dodać cebulę i smażyć na średniej mocy palnika, aż się zeszkli. Dodać pokrojone grzyby i smażyć na większej mocy palnika ok. 5 minut.
        Marchewkę obrać i zetrzeć na tarce o dużych oczkach.
        Natkę pietruszki posiekać drobno.
        Grzyby z cebulą przełożyć do niedużego garnka, dodać marchewkę i zalać gorącym wywarem. Doprowadzić do zagotowania. Od zagotowania, gotować ok. 15 minut pod przykryciem, na małej mocy palnika, aż grzyby i marchewka będą miękkie.
        Pod koniec dodać natkę pietruszki. Doprawić śmietaną, solą i pieprzem do smaku.
        Podawać z ugotowanym makaronem.</p>
    </div>

    <br/>
    <div class="przepis">
      <h2>Jajecznica na ostro <img class="gwiazdka" alt="*" id="p3" src="static/img/star.svg" onclick="klikniecie(event)"/></h2>
      
      <img class="jpg_przepisu" src="static/img/jajecznica.jpg" alt="zdjęcie jajecznicy">

      <div class="skladniki">
        <b>Składniki: </b>
        <ul >
          <li>3 jajka</li>
          <li>2 kabanosy</li>
          <li>cebula</li>
          <li>4 pomidory koktajlowe</li>
          <li>3 czarne oliwki</li>
          <li>papryczka chili</li>
          <li>masło</li>
          <li>sól, pieprz</li>
        </ul>
      </div>
      <div class="clear"></div>
      <p class="opis">Sposób przygotowania:<br/>Cebulę siekamy w drobną kostkę. Na patelni rozpuszczamy masło. Kabanosy kroimy na mniejsze kawałki. Pokrojoną cebulę wrzucamy na patelnię. Oliwki drobno siekamy, pomidorki koktajlowe kroimy na ćwiartki i wszystko dodajemy do cebuli. Niewielką ilość papryczki chili (razem z nasionami) drobno siekamy i także wrzucamy na patelnię. Stopień ostrości dopasowujemy do preferencji smakowych. Jajka wbijamy do miseczki, doprawiamy solą i pieprzem, mieszamy. Wlewamy na patelnię i czekamy, aż wszystko się zetnie (tym razem nie mieszamy!). Delikatnie rozgarniamy jajecznicę łopatką. Gotową jajecznicę przekładamy do miseczki.</p>
    </div>

    <br/>
    <div  class="przepis">
      <h2>Naleśniki <img class="gwiazdka" alt="*" id="p4" src="static/img/star.svg" onclick="klikniecie(event)"/></h2>
      
      <img class="jpg_przepisu" src="static/img/nalesniki.jpg" alt="zdjęcie naleśników">

      <div class="skladniki">
        <b>Składniki: </b>
        <ul >
          <li>150g mąki pszennej</li>
          <li>szczypta soli</li>
          <li>2 jajka</li>
          <li>250ml mleka</li>
          <li>100ml gazowanej wody mineralnej lub mleka</li>
          <li>1 łyżka cukry waniliowego</li>
          <li>olej do smażenia lub masło klarowane</li>
        </ul>
      </div>
      <div class="clear"></div>
      <p class="opis">Sposób przygotowania:<br/>Do miski wsypać mąkę, szczyptę soli i cukier waniliowy. Wlewać mleko z wodą i energicznie mieszać trzepaczką, aby nie powstały grudki. Dodać jajka i ponownie wymieszać. (Można również ciasto zmiksować mikserem). Gdyby powstały grudki można ciasto przelać przez sitko. Ciasto pozostawić najlepiej na co najmniej 30 minut, aby odpoczęło (ale nie jest to konieczne).
        Rozgrzać patelnię (najlepiej teflonową). Dodać odrobinę oleju. (Polecam rozprowadzić olej pędzelkiem silikonowym). Ciasto ponownie zamieszać. Chochelką wlać trochę ciasta na środek patelni i poruszając nią, rozprowadzić je po całej powierzchni. Smażyć, aż od spodu się przyrumieni, a z wierzchu ciasto się zetnie tj. nie będzie już płynne. Łopatką przewrócić na drugą stronę i smażyć chwilę, aż się przyrumieni.</p>
    </div>

    <div class="kalorycznosc">
      <h2>Tabela z kalorycznością popularnych produktów</h2>

      <table>
        <tr>
          <th>Produkt (100g)</th>
          <th>kcal</th>
          <th>białka</th>
          <th>tłuszcze</th>
          <th>węglowodany</th>
        </tr>
        <tr>
          <td>pierś kurczaka</td>
          <td>174</td>
          <td>31,2</td>
          <td>4,6</td>
          <td>0</td>
        </tr>
        <tr>
          <td>cebula</td>
          <td>31</td>
          <td>1,2</td>
          <td>0,3</td>
          <td>7,3</td>
        </tr>
        <tr>
          <td>jajko kurze</td>
          <td>143</td>
          <td>12,6</td>
          <td>9,5</td>
          <td>0,7</td>
        </tr>
        <tr>
          <td>makaron</td>
          <td>131</td>
          <td>5</td>
          <td>1,1</td>
          <td>25</td>
        </tr>
        <tr>
          <td>set mozzarella</td>
          <td>251</td>
          <td>11,7</td>
          <td>12,1</td>
          <td>23,8</td>
        </tr>
        <tr>
          <td>olej</td>
          <td>884</td>
          <td>0</td>
          <td>100</td>
          <td>0</td>
        </tr>
      </table>

      <div class="zrodlo" id="dance" style='padding-top:10px;'>
        <i><a target="_blank" href="http://oblicz-bmi.pl/tabela-kalorii.html">Zródło</a></i>
      </div>




      <!-- <div class="zrodlo">
        <i><a target="_blank" href="http://oblicz-bmi.pl/tabela-kalorii.html">Zródło</a></i>
      </div> -->
    </div>

    <div class="lista_zakupow">
      <p><b>Lista zakupów</b></p> <br/>
      <input id="lista_input" type="text">
      <br/>
      <button onclick="dodaj_do_zakupow()">Dodaj</button>
      <button onclick="wyczysc()">Wyczyść</button>
      <button onclick="usun_ostatni()">Usuń ostatni</button>
      <br/><br/>
      <ul id="lista_z_zakupami">
        <li>By stworzyć listę zakupów, włącz JavaScript!</li>
      </ul>
    </div>

    </main>

    <div id="powiadomienie" >
      Przepis został dodany do ulubionych!
    </div>

    <div class="licznik">
      <b>W tej sesji:</b> <br/>
      Polubiłeś: <span id="licznik_polubien">0</span><br/> 
      Przestałeś lubić: <span id="licznik_przestales_lubic">0</span> <br/>
      Czas spędzony na stronie: <span id="zegarek">0</span> s.
    </div>

    <div class="powrot">
      <!-- <a href="#najpopularniejszy">Wróć do najpopularniejszego przepisu</a>
      <br/> -->
      <a href="#top">Wróć do początku</a>
    </div>

    <?php include "partial/footer.php"; ?>

    <script src="static/js/polubione.js"></script>
    <script src="static/js/lista_zakupow.js"></script>
    <script src="static/js/zakupy_z_ul.js"></script>
    <script src="static/js/licznik.js"></script>
</div>
</body>
</html>