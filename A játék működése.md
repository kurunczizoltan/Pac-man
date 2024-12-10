# Pac-man

A játék elindítás az index.php-nál kezdődik.

A játék irányítása:
Az oldalon, a START gombra rányomva vagy a billentyűzeten a space billentyű megnyomásával, átirányít a pacman.php oldalra, ahol a képernyő egy kisebb részén van egy keret, amin belül történik a játék. A keret alatt van 4 db gomb, amivel irányítani lehet Pac-man-t (a sárga mozgó karaktert). Ezeken a gombokon még különböző betűk és szimbólumok is megfigyelhetők, amik azt jelzik, hogy még mely billentyűzeten lévő gombokkal is lehet irányítani. Az irányítás úgy működik, (mint az eredeti játékban,) hogy amikor lenyomást (aktiválást) érzékel, akkor irányt vált (tehát, ahhoz hogy jobbra menjen a karakter, elég egyszer egy pillanatra lenyomni a "D" billentyűt / a jobb oldali nyilat / a jobb oldali gombot). A gombok alatt található még egy pixel szív és egy fekete nyíl. A szív arra szolgál, hogy amikor a játék elindult vagy "Game over" állapotban van, akkor újra indítja az egész játékot. Tehát az addig szerzett pontok elvesznek és az életek újra töltődnek. A vissza gomb arra szolgál, hogy a játék bármely pillanatában, vissza lehessen lépni az index.php oldalra. Ezen gombokra is van a billentyűzeten megfelelő gomb. A szív esetében a space, a nyíl esetében az Escape.

A játék működése:
A játék során, a játékosnak az a feladata, hogy összegyűjtse az összes pontot a szinten. A játékos mozgása során az úgynevezett "waka-waka" hang szólal meg. A pálya bal alsó sarkában a játékos hátralévő élet pontjai vannak megjelenítve, sárga négyzetekként a kék falban. A pontokat a pálya bal felső sarkában lehet nyomonkövetni, ami folyamatosan változik a pontok felvétele közben. A szinteken, maximum háromszor, random időközönként megjelenik a pálya közepén egy narancssárga gyümölcs (négyszög), ami plussz pontot ad a játékos számára és felvételnél külön hang szólal meg. Ha a játékos elveszt egy életet, akkor a pálya közepén kezd újból és lejátszódik a Pac-man halál hangja. Az addig megszerzett pontjait nem veszti el, viszont a felvett pontok újra generálódnak és a szellemek vissza térnek a kezdő állásukba. Amikor a játékos élete elfogy, akkor a játék kiírja, hogy "GAME OVER" a játéktért közepén.

A szellemek működése:
Összesen 4db szellem van, amelyek különböző időpillanatban indulnak el a keret 4 sarkából. Minden szellem, saját idejű, randomizált mozgással bír. Ha falnak ütköznek, akkor irányt váltanak. Az eredeti játékkal ellentétben (jelenleg még) nem rendelkeznek "üldöző" és "pihenő" mozgáskoordinációval. Jelenleg teljessen randomizált és kiszámíthatatlan mozgással rendelkeznek, ami bizonyos esetekben könnyít máskor viszont nehezít a játékon.

A pálya felépítése:
A pálya szimmetrikus felépítésű, és a bal, illetve a jobb oldalán rendelkezik teleportal, ami a pálya másik szélére teleportálja el a játékost és a szellemeket. FIGYELEM: Ha a játékos vagy a szellem bele megy a teleportba, akkor addig nem tud semmilyen irányt változató mozgást végezni, amíg nem jön ki a teleport másik oldalán.
A pálya falai kék falakból állnak. Ha a játékos ütközik neki, akkor a mozgás közben játszódó hang leáll és a karakter megáll. Ha szellem ütközik a falnak, akkor irányt változtat.

Szintek:
Minden új szint úgy kezdődik, hogy pár pillanatig ki van írva, hogy hanyadik szinten van jelenleg a karakter és lejátszódik az ikonikus Pac-man zene. Jelenleg, még a szinteken nem nehezedik a játék, de tervbe van, hogy a szinteken folyamatosan növekedne a játék sebessége, így nehezítve az irányítást.
