# BeWorkly
Projekt wykonany na Hack Heroes 2022. 
Nasze rozwiązanie odpowiada na problem zarabiania przez osoby nieletnie (od 13 roku życia). Stworzyliśmy stronę internetową, która jest swego rodzaju skupiskiem ofert pracy z danego regionu. 

## Import tabel do bazy danych
Wchodzimy w folder `Bazy danych`.
Teraz logujemy się na phpmyadmin oraz tworzymy nowa tabele o nazwie `beworkly`. Następnie klikamy Importuj i importujemy `beworkly.sql`

## Ustawienie maila (przykład pokazywany na przykładzie gmail)
Wchodzimy w folder ..\BeWorkly\Logowanie\email_change_pass\PHP i wchodzimy w sendMail.php
![image](https://user-images.githubusercontent.com/77463212/197414314-8308bed2-fa68-46f8-9a44-7b9cd822701e.png)

Ustawiamy maila i hasło
`$mail -> setFrom("twojemail@gmail.com");`
`$mail -> Password = 'haslo';`

`$mail -> setFrom("twojemail@gmail.com");`

Musimy także ustawić link:
Nasz przykład na naszej stronie 
1. `$mail -> Body = "https://esportwzse.pl/BeWorkly/Logowanie/email_change_pass/pass_change.php?token=".$token."&email=".$email;`
2. `$mail -> Body = "http://localhost/BeWorkly/Logowanie/email_change_pass/pass_change.php?token=".$token."&email=".$email;`

Zapisujemy i gotowe!

