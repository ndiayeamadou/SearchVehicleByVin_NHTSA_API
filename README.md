# Infernal Media Technical Test
### Full Stack Application
Built with these technologies
<table>
    <tr>
        <td>
            <a href="https://laravel.com" ><img src="https://i.imgur.com/pBNT1yy.png" /></a>
        </td>
        <td>
            <a href="https://vuejs.org/" ><img src="https://i.imgur.com/BxQe48y.png" /></a>
        </td>
        <td>
            <a href="https://getbootstrap.com/" ><img src="https://imgur.com/SocNz7s.png" /></a>
        </td>
    </tr>
</table>

## Requirements
You need to have PHP version **7.3** or above. Node.js version **12.0** or above.

## Installation

#### Backend
1. Clone the project | *Cloner le projet*
2. Go to the project directory | *Se positionner dans le répertoire du projet*
3. Run `composer install` | *Exécuter `composer install`*
4. Create database | *Créer la base de données*
5. Copy `.env.example` into `.env` file and adjust parameters | *Copier le fichier `.env.example` vers le fichier `.env` et ajuster les paramètres*
6. Run `php artisan serve` to start the project at http://localhost:8000 | *Exécuter `php artisan serve` pour démarrer le project sur http://localhost:8000*

#### Frontend
1. Navigate to `vue` folder using terminal | *Se positionner dans le dossier `vue` en utilisant le terminal*
2. Run `npm install` to install vue.js project dependencies | *Run `npm install` pour installer les dépendences du projet vue.js*
4. Start frontend by running `npm run dev` | *`npm run dev` pour lancer l'application front*
5. Open http://localhost:3000 | *Ouvrir http://localhost:3000*

### Choix Techniques
##### #Laravel
Laravel est une plate-forme open-source qui en fait un choix privilégié pour les entreprises par rapport aux autres. Laravel se compose d'une puissante communauté de développeurs engagés qui fournissent constamment un soutien pour le rendre plus flexible et évolutif.
L'avantage d'utiliser Laravel comme framework est qu'il offre une sécurité de haut niveau.

L'utilisation de Laravel sécurise les applications Web, car elle ne permet à aucun malware ou menace de sécurité d'entrer dans les applications. Cela signifie également que votre code de développement Web est sûr et sécurisé.

Autres avantages : Modèle de lame, Migration des bases de données, Architecture MVC, etc.
##### #Vue.JS
* Le premier avantage de Vue.js est qu’il est très léger.
* Il est doté d’une grande flexibilité pour la **création d’applications web**.
* Ce framework est aussi très performant dans son exécution.
* Il utilise le **langage de programmation informatique JavaScript** qui est très connu des développeurs. Alors si vous rencontrez un problème avec votre appli, vous pouvez faire appel à une communauté d’experts qui se chargera de vous aider.
##### #Bootstrap
* Est “Responsive” (s’adapte à la taille de l’écran, que se soit tablette, ordinateur, smartphone, etc.).
* Fonctionne sur tous les navigateurs.
* Est un framework très complet, et surtout agrémenté d’une très forte communauté.

#### Les améliorations à noter
* Les contrôles ayant déjà été faits, l'affichage des messages d'erreur ou de notification ne figure pas encore dans certaines pages. Par exemple, en recherchant un véhicule de par un NIV inexistant ou lorsque l'insertion est réussie, un message doit être envoyé.
* Si un véhicule est enregistré, pas besoin de rafraîchir la page. (Dans l'état actuel de ce projet de test, il faut, après chaque insertion, actualiser la page pour pouvoir voir le dernier enregistrement dans le tableau.)
* Le design, les boutons d'actions dans le tableau de données (voir, éditer, supprimer)

## License

The project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

