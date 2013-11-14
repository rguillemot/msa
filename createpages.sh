./replacetags.py ./home-en.html ./tags-home-en.html > home-en-withtags.html
./replacetags.py ./home-en.html ./tags-home-fr.html > home-fr-withtags.html
./replacetags.py ./home-en.html ./tags-home-de.html > home-de-withtags.html
mv home-en-withtags.html home-en.html
mv home-fr-withtags.html home-fr.html
mv home-de-withtags.html home-de.html

./replacetags.py ./contacts-en.html ./tags-contacts-en.html > contacts-en-withtags.html
./replacetags.py ./contacts-en.html ./tags-contacts-fr.html > contacts-fr-withtags.html
./replacetags.py ./contacts-en.html ./tags-contacts-de.html > contacts-de-withtags.html
mv contacts-en-withtags.html contacts-en.html
mv contacts-fr-withtags.html contacts-fr.html
mv contacts-de-withtags.html contacts-de.html

./replacetags.py ./contacts-en.php ./tags-contacts-en.php > contacts-en-withtags.php
./replacetags.py ./contacts-en.php ./tags-contacts-fr.php > contacts-fr-withtags.php
./replacetags.py ./contacts-en.php ./tags-contacts-de.php > contacts-de-withtags.php
mv contacts-en-withtags.php contacts-en.php
mv contacts-fr-withtags.php contacts-fr.php
mv contacts-de-withtags.php contacts-de.php


