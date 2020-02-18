#E-narudzbenica

<b>#Potrebni softveri</b><br>
Xampp - https://www.apachefriends.org/index.html<br>
Composer - https://getcomposer.org/download/<br>
Git - https://git-scm.com/downloads<br>
Text editor - npr. Visual studio code - https://code.visualstudio.com/download ili notepad++

Koraci za sve (Environment Setup & Laravel Installation): https://www.youtube.com/watch?v=H3uRXvwXz1o&t=530s

<b>#Nakon instalacije</b>

1. Pokrenuti xampp (apache i mysql)
2. Kopirati folder (e-narudzbenica) sa Githuba u c:\\xampp\htdocs\
3. Nakon kopiranja putanja mora izgledati c:\\xampp\htdocs\e-narudzbenica
4. Pošto je baza lokalno na sljedećem linku skinuti baze: <a href="https://drive.google.com/open?id=1SMHDgg7-pYpIquvOI2vgyBl6zlU_wMC_" /> . Uci u phpmyadmin - upisati u url localhost\phpmyadmin i kreirati novu bazu naziva narudzbenica i narudzbenica2020(obje UTF-8). U svaku uci, stisnuti import te uploadati bazu.
5. Sada ponovno na localhost i izaberete folder e-narudzbenica, otvorit ce vam se sve skripte. Kliknite na public i trebala bi se otvoriti aplikacijski login. Unesite ibutorac, 123456.
6. Aplikacija može raditi i na url-u narudzbenica.hgi, no morate namjestiti parametre. Otvorite notepad kao Administrator(obavezno), idite na file-open. Izaberite sljedeću putanju: C:\Windows\System32\drivers\etc, te dolje izaberite all files. Uđite u file hosts i napišite sljedeće 127.0.0.1 localhost 127.0.0.1 narudzbenica.hgi. 
7. Ponovno restartajte apache, stop-start i aplikacija bi trebala raditi.
