## Base de donnees:
    -[OK] Lire le fichier Readme
    -[OK] insertion de la database employees et des tables 

## Creation page
    -[OK] index.php
    -[OK] fonction.php
    -[OK] employes.php
    -[OK] ficheEmployer   
    -[OK] recherche.php
    -[OK] changer_dept.php



## index.php
    -[OK]Liste des Departements
    -[OK]colonne qui affiche le nom du manager en cours
    -[OK]lien sur le nom des departements(lien vers employes.php) 
    -[OK]formulaire de recherche (departement, nom employe, prenom employe age 
        min et  age max)

## fonction.php
    -[OK] fonction dbconnect : pour connecter au base de donnees employees
    -[OK] fonction get_all_departement : liste departement et les managers en cours
    -[OK] fonction  get_employes_by_departement : liste des employees dans 
        un departement
    -[OK] fonction get_formulaire_employer : affiche l'apropos d'un employee
    -[OK] fonction  get_historique_salaire : historique salaire d'un employee
    -[OK] fonction recherche_employes : recherche via departe,nom et prenom 
        employees, age max et min
    -[OK] fonction get_info_dept : apropos departement
    -[OK] fonction get_dept_employe : pour retourner le nom de departement 
        d'un employee
    -[OK] fonction get_dept_actuel : pour retourner le departement actuel 
        d'un employee 
    -[OK] fonction change_departement : pour changer le departement d'un 
        d'un employee    
    -[OK] fonction get_employees_gender : pour prend les nombres des employes par genre 
    -[OK] fonction get_avg : prendre les salaires moyennes par employe
    -[OK] fonction get_employe : pour prendre une l'employes le plus durée longue

## recherche.php       
    -[OK] include fonction.php
    -[OK] get tout les valeurs dans la formulaire de recherche dans index.php
    -[OK] appel fonction recherche_employes(pour afficher les resultats du recherche)
    -[OK] affichage du recherche
    -affichage 20 resultat premier ligne
    -bouton suivant pour afficher les prochain resultat et ainsi de suite

## employer.php
    -[OK] include fonction.php
    -[OK] get valeur sur le lien dans index.php
    -[OK] appel fonction get_employes_by_depget_artement(return la liste des employees 
        dans le departement cliquer)
    -[OK] affichage employees du departement
    -[OK] un lien sur le nom des employees qui va vers ficheEmployes.php 
  
## ficheEmployes.php
    -[OK] include fonction.php
    -[OK] get la valeur sur le lien dans employer.php 
    -[OK] appel fonction get_formulaire_employeer(return l'apropos de 
        l'employee selectonne)
    -[OK] appel fonction get_historique_salaire(return historique salaire 
        de l'employee)
    -[OK]affichage formulaire de l'employee selectionner
    -[OK]affichage historique de son salaire
    -[OK]button "changer departement" qui va montrer un petit formulaire 
        pour changer le departement de l'employe avec date de debut dans cette departement
    -[OK] button "confirmer" dans le petit formulaire pour confirmer le changement 
        qui va vers changer_dept.php pour finaliser le changement   
    -[OK] affichage departement actuel et le debut en haut de la formulaire
    -[OK] affichage des employes a plus long terme

## changer_dept.php
    -[OK] include fonction 
    -[OK] get tout les valeurs dans la formulaire de changement de departement
    -[OK] condition qui compare la date du debut de la nouvelle departe et l'ancien
        pour afficher un message d'erreur si ce n'est pas logique
    -[OK] appel fonction changer_departement qui va finaliser le changement
    -[OK] un header pour retourner dans ficheEmployer.php
## listeemployees.php   
    -[OK] include fonction
    -[OK] prend les 2 fonction creer 
    -[OK] faire les 2 tableau qui affiche les resulats - un pour le nombre des employer par genre 
                                                     - l'autre pour les moyennes des salaires par emploi
    -[OK] faire des boucles a chacun pour afficher 
