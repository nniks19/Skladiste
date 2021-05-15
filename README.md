# Skladiste
** NAPOMENA - Kako bi projekt funkcionirao prethodno trebate napraviti bazu sa nazivom "skladiste" i korisničko ime je "root" a lozinka je prazno polje "". ** 

Konstrukcijska vježba iz kolegija Web programiranje na strani poslužitelja i kolegija Skriptni programski jezici

ZADATAK:

Koristeći web tehnologije (HTML, CSS, PHP, Javascript, jQuery, Angular) napisati program koji će služiti kao jednostavan informacijski sustav za:
•	Vođenje skladišta sirovina građevinske tvrtke „VUV gradnja d.o.o.“.  Svaki artikl sadrži atribute: šifra artikla,  naziv artikla, jedinična mjera (JMJ),  cijena artikla;
Kao izvor podataka potrebno je kreirati bazu podataka. Inicijalno kreirati i popuniti sadržaj baze sa nekoliko podataka za prezentaciju. Samostalno analizirati probleme i napraviti analizu zahtjeva.
Napomene: 
-	potrebno je kreirati PHP klase Dokument, Izdatnica, Primka
-	klase moraju biti u zasebnim datotekama
-	učitane podatke smjestiti u polje objekata
-	potrebno je kreirati hijerarhiju klasa Dokument, Izdatnica, Primka 
-	klasa Dokument/Izdatnica/Primka uz osnovne podatkovne članove sadrži i polje objekta klase Artikla
-	poveznica dokumenta i artikla je šifra
-	za prikaz podataka na klijentskoj strani kreirati funkcije koje generiraju JSON zapis.

Informacijski sustav mora imati slijedeće funkcionalnosti:

1 - Stanje skladišta 

2 - Nova izdatnica – potrebno je odabrati listu artikala nakon čega se popuni sadržaj dokumenta

3 - Nova primka – potrebno je odabrati listu artikala nakon čega se popuni sadržaj dokumenta

3 – Pregled dokumenata – dodati mogućnost brisanja dokumenata, stanje se mora ažurirati automatski.

Do sad napravljeno:

sqlrebuild.php - funkcionalnost je ta da se unutar baze "osvježe" tablice Kategorija, Dokument, Artikl, Artikl_Dokument

connection.php - funkcionalnost je povezivanje sa bazom

Hijerarhija klasa Dokument -> Izdatnica, Primka

Klasa Artikl


TO DO LIST:

Backup - spremanje podataka u .txt datoteku koja će sadržavati komandu za rekreiranje baze podataka + dodavanje svih podataka ponovno u bazu

Login - Zasebna baza koja će sadržavati Tablicu sa podacima: Korisničko_Ime, Lozinka, Tajni_Kljuc || Dodati sustav za hash lozinke (zbog sigurnosti)

Zaboravili ste lozinku? - Korisnik će moći vratiti svoju lozinku putem tajnog ključa kojeg je upisao prilikom registracije.

Dummy podaci - Pronaci izvor podataka iz kojega će se iznova svaki puta rekreirati baza.

SQL naredba za dohvaćanje podataka u obliku tablice:
Šifra artikla | Naziv artikla | JMJ | Cijena | Količina ulaz () | Iznos ulaz () | Količina izlaz () | Iznos izlaz () | Stanje količina | Stanje cijena

SQL naredba za insert podataka u bazu preko forme - IZDATNICA (natuknica: koristit ću POST, a ne GET):
Tip dokumenta – IZD (izdatnica):
Datum dokumenta – automatski:
Iznos ulaz - 0:
Iznos izlaz (ukupno prema artiklima) :

SQL naredba za insert podataka u bazu preko forme - PRIMKA (natuknica: koristit ću POST, a ne GET):
Tip dokumenta – PRM (primka):
Datum dokumenta – automatski:
Iznos ulaz - (ukupno prema artiklima):
Iznos izlaz - 0:

