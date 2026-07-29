# WebToonCNU

WebToonCNU este o platforma web pentru organizarea unui concurs de benzi desenate si webtoonuri. Aplicatia permite participantilor sa isi creeze conturi, sa incarce lucrari, sa consulte lucrarile publicate, sa lase comentarii si aprecieri, iar organizatorilor sa administreze utilizatorii, categoriile, lucrarile si comentariile.

## Functionalitati principale

- pagina publica de prezentare a concursului;
- lista lucrarilor publicate de participanti;
- cautare lucrari dupa text sau titlu;
- filtrare lucrari dupa categorie;
- pagina individuala pentru fiecare lucrare;
- sistem de conturi pentru participanti;
- panou participant pentru incarcare si gestionare lucrari proprii;
- sistem de comentarii si aprecieri;
- panou organizator pentru administrarea platformei;
- gestionare utilizatori, categorii, lucrari si comentarii;
- formular extern de inscriere integrat prin Google Forms.

## Roluri in platforma

| Rol | Descriere |
| --- | --- |
| Vizitator | Poate vedea paginile publice si lucrarile publicate |
| Participant | Poate crea cont, incarca lucrari, comenta si aprecia |
| Organizator | Poate administra utilizatori, lucrari, categorii si comentarii |

## Tehnologii folosite

### Backend

- PHP
- MySQL / MariaDB
- PDO pentru conexiunea la baza de date
- Sesiuni PHP pentru autentificare

### Frontend

- HTML
- CSS
- Bootstrap 5
- JavaScript
- jQuery
- Font Awesome
- TinyMCE
- jQuery RichText
- React UMD, folosit punctual pe pagina principala

### Servicii externe

- Google Forms pentru formularul de inscriere
- CDN-uri pentru Bootstrap, Font Awesome, jQuery, React si TinyMCE

## Structura proiectului

```text
WebToonCNU/
├── admin/          # panoul organizatorilor
├── ajax/           # actiuni AJAX, ex. like/unlike
├── css/            # fisiere CSS
├── img/            # imagini folosite in interfata
├── inc/            # componente comune, ex. bara de navigare
├── js/             # scripturi JavaScript locale
├── php/            # procesari generale pentru formulare
├── upload/blog/    # imagini incarcate pentru lucrari
├── users/          # panoul participantilor
├── _db/            # exportul bazei de date
├── db_conn.php     # configurarea conexiunii la baza de date
├── index.php       # pagina principala
├── blog.php        # lista publica de lucrari
├── blog-view.php   # pagina unei lucrari
├── login.php       # autentificare participanti
├── signup.php      # creare cont participant
└── admin-login.php # autentificare organizatori
```

## Baza de date

Aplicatia foloseste baza de date:

```text
blog_db
```

Exportul bazei de date se afla in:

```text
_db/blog_db.sql
```

Tabele principale:

| Tabel | Rol |
| --- | --- |
| `admin` | conturi pentru organizatori |
| `users` | conturi pentru participanti |
| `category` | categorii pentru lucrari |
| `post` | lucrari incarcate |
| `comment` | comentarii la lucrari |
| `post_like` | aprecieri pentru lucrari |

## Instalare locala cu XAMPP

1. Copiaza proiectul in folderul:

```text
C:\xampp\htdocs\WebToonCNU
```

2. Porneste din XAMPP:

- Apache
- MySQL

3. Creeaza baza de date:

```text
blog_db
```

4. Importa fisierul SQL:

```text
_db/blog_db.sql
```

5. Verifica datele de conectare din `db_conn.php`:

```php
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "blog_db";
```

6. Acceseaza platforma in browser:

```text
http://localhost/WebToonCNU/
```

## Pagini importante

| Pagina | Rol |
| --- | --- |
| `index.php` | pagina principala |
| `blog.php` | lucrari publicate |
| `blog-view.php` | detaliile unei lucrari |
| `Category.php` | categorii |
| `form-1.php` | formular de inscriere |
| `login.php` | conectare participanti |
| `signup.php` | inregistrare participanti |
| `admin-login.php` | conectare organizatori |
| `users/Post.php` | lucrarile participantului autentificat |
| `admin/Post.php` | administrarea lucrarilor |
| `admin/Users.php` | administrarea participantilor |
| `admin/Category.php` | administrarea categoriilor |
| `admin/Comment.php` | moderarea comentariilor |

## Flux de utilizare

### Participant

1. Isi creeaza cont din `signup.php`.
2. Se autentifica din `login.php`.
3. Incarca o lucrare din panoul `users/`.
4. Poate vedea, edita sau sterge propriile lucrari.
5. Poate aprecia si comenta lucrari publice.

### Organizator

1. Se autentifica din `admin-login.php`.
2. Administreaza utilizatorii din `admin/Users.php`.
3. Administreaza lucrarile din `admin/Post.php`.
4. Creeaza si editeaza categorii din `admin/Category.php`.
5. Modereaza comentariile din `admin/Comment.php`.
6. Poate publica sau ascunde lucrari.

## Upload imagini

Imaginile lucrarilor sunt salvate in:

```text
upload/blog/
```

Formate acceptate in zona participantilor:

```text
jpg, jpeg, png, webp
```

Formate acceptate in zona organizatorilor:

```text
jpg, jpeg, png
```

## Securitate

Platforma foloseste:

- parole hash-uite cu `password_hash()`;
- verificare parole cu `password_verify()`;
- interogari SQL pregatite prin PDO;
- sesiuni PHP pentru diferentierea participantilor si organizatorilor;
- verificari de autentificare pentru paginile private.

## Observatii tehnice

- Proiectul este construit in PHP procedural, fara framework backend.
- Pentru functionare completa este necesara baza de date `blog_db`.
- Pe servere Linux, numele fisierelor sunt case-sensitive. Verifica rutele care folosesc fisiere precum `Post.php`, `Category.php`, `Users.php`.
- Pentru backup complet trebuie salvate atat baza de date, cat si folderul `upload/blog/`.

## Autor

Platforma WebToonCNU a fost dezvoltata pentru concursul de benzi desenate si webtoonuri al comunitatii Colegiului National „Unirea”.
