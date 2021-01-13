
<header>
<div class="logo">Kuchnia Studenta</div>
    <nav>

        <input type="checkbox" id="res-menu">
        <label for="res-menu">
        
        <span class="burger">
            <img id="otworz_menu" src="static/img/list.svg" alt="&equiv;" height="25">
        </span>
        </label>

        <ul id="menu">
        <li><a href="/home">Strona Domowa</a></li>
        <li><a href="/gallery">Galeria</a></li>
        <li><a href="/contact">Kontakt</a></li>
        <li><div class="dropdown">
            <button class="dropbtn">Akcje &#8595</button>
            <div class="dropdown-content">

            <?php if(isset($_SESSION['username'])): ?>
                <p class='tekst_menu'><?= $_SESSION['username']?></p>
                <a href="/logout">Wyloguj się</a>

            <?php else: ?>
                <a href="/login">Zaloguj sie</a>
                <a href="/register">Zarejestruj sie</a>
            <?php endif ?>

            <a href="/upload">Prześlij</a>
            <a href="/zapamietane">Zapamiętane</a>
            <a href="/search">Wyszukiwanie</a>

            </div>
            </div>
        </li>
        
        </ul>
        
    </nav>
</header>