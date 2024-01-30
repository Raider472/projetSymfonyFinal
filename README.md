- prérequis:
    - Xamp
    - composer

- installation:
    - cloner le projet dans le fichier "htdocs" de Xamp
    - Taper les commandes suivantes:
        - "composer install"
        - "php bin/console doctrine:database:create"
        - "php bin/console doctrine:migrations:diff"
        - "php bin/console doctrine:migrations:migrate"
        - "php bin/console doctrine:fixtures:load"

- Utilisateur:
    -admin
        - login: admin
        - mdp: Admin1
    -user
        - login: user
        - mdp: user1

- vidéo:
    - https://youtu.be/vYj138sudSg


![Capture](https://github.com/Raider472/projetSymfonyFinal/assets/60116030/9da812a0-063b-4cc8-ade9-8c4c9fe54b34)
