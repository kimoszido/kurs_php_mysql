<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Typy danych - by Arkadiusz Włodarczyk - videokurs.pl</title>
        
    </head>
    <body>
<pre>
    Numeryczne:
 TINYINT   -  1 bajt   - -128 do 127 - unsigned: 0 - 255
 SMALLINT  -  2 bajty  - 0 do 65535
 MEDIUMINT -  3 bajty  - 0 do 16777215
 INT       -  4 bajty  - 0 do 4294967295
 BIGINT    -  8 bajtów - 0 do 18446744073709551615

 SERIAL to to samo co BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE

 BIT(W)    - W od 1 do 64 - oznacza ile bitów może zostać zapisanych, dozwolone wartości to 0, 1 ew. NULL
 zajmuje (W+7)/8 bytes

 DECIMAL(W,D) - rozmiar zależny od W od 1 do 29 bajtów - W - ilość cyfr (max 65), D (max 30) - ilość po przecinku - co 9 cyfr 4 bajty
 
 
 FLOAT(W,D)                - 4 bajty od 0 do 23 cyfr - W - ilość cyfr, D - ilość po przecinku
 DOUBLE(W,D), REAL(W,D)    - 8 bajtów od 24 do 53 cyfr - W - ilość cyfr, D - ilość po przecinku
 
 DECIMAL wnioski:
 precyzyjniej - wolniej (bardza mała różnica) gdybyśmy wykonywali na nich jakieś operacje
 decimal najlepiej używać tam, gdzie mamy waluty, tam gdzie będziemy wykonywać na podstawie danych sumowanie, 
  
 FLOAT i DOUBLE wnioski:
 działa szybciej podczas wykonywania na nich operacji, ale nieprecyzyjnie - zajmuje najczęściej mniej pamięci
 double / float tam gdzie wykonywane są obliczenia naukowe
 
 WPISANE WARTOŚCI do tabeli float_numbers_presentation:

 98756
 1.375
 45124.1245
 0.99995
 0.9
 43210987654321.9876

 ZNAKOWE:

 CHAR(10)       1 bajt 1 znak                                     - "Arek      " - 10 bajtów długość od 0 do 255
 VARCHAR(10)    1 bajt 1 znak + (1 lub 2 bajty - określa długość) - "Arek"       - 5 bajtów   długość od 0 do 65 535
 //w obu przypadkach dozwolone jest 10 znaków
 UWAGA niektóre znaki mogą zajmować więcej niz 1 bajt, chińskie etc.

 CHAR używamy gdy: 
 - wszystkie (lub prawie wszystkie) wartości będą miały taką samą długość np. T/N (oszczędzamy 1 bajta) albo adres IP etc.
 - wszystkie wartości będą bardzo podobnej długości, a w tabeli wszystkie inne pola są FIXED - przyspiesza szybkość np. aktualizacji, ponieważ nie trzeba sprawdzać gdzie zaczyna się rekord, a gdzie kończy
 - gdy bardzo zależy nam na szybkości (na naszą witrynę wchodzi tysiące ludzi) wszystkie wartości warto ustawić wtedy jako fixed (VARCHAR -> CHAR), stracimy przez to dużo przestrzeni dyskowej, jednak możemy przyspieszyć pracę o ok. 20%.
 VARCHAR:
 - w każdym innym wypadku

 BINARY i VARBINARY to samo tylko, że przechowujemy binarne wartości
 

TINYBLOB, TINYTEXT     do 2^8 znaków,  zajmuje il. znaków + 1 bajt
BLOB, TEXT 	       do 2^16 znaków, zajmuje il. znaków + 2 bajty
MEDIUMBLOB, MEDIUMTEXT do 2^24 znaków, zajmuje il. znaków + 3 bajty
LONGBLOB, LONGTEXT     do 2^32 znaków, zajmuje il. znaków + 4 bajty

ENUM
1 bajt dla do 256 wartości
2 bajty dla od 256 do 655535 wartości
SET (max 64 wartości)
(N+7)/8, gdzie N to wielkość SET


 
</pre>
        <?php           
            
            $mysqlConnection = @mysql_connect("localhost", "root", "vertrigo") or die(mysql_error());
            
            mysql_select_db("kursmysql") or die(mysql_error());
            mysql_set_charset("utf8");
            
            
            mysql_close($mysqlConnection);
        
        ?>
    </body>
</html>



