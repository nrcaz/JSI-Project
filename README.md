# JSI-Project

______________________________________________________________________________________________________________________________
17/01/2019
# Création du crud annonce
par Florian
création des entités de la table annonce
titre (string) (null)	description (text) (null)	equipement (text) (null)	titre (string) (null)
création du crud Contact
par florian
nom (string) (null)	societe (string) (null)	email (string) (null)
telephone (string) (null)	message (string) (null)	demande (string) (null)

# Création du crud User
par florian
login (string) (non null)	email (string) (non null)	password (string) (non null)	
passwordKey (string) (null)		passswordExpirationKey (datetime) (null)

# Création du entité Candidature
par florian
nom (string) (null)	prenom (string) (null)	email (string) (null)
cv (string) (null)	telephone (string) (null)	message (string) (null)
il n’y aura pas de crud pour le formulaire de candidature.
Juste des routes spécifiques 
un insertion BDD est à prévoir pour les formulaires de recrutement et de recherche(simulation)
______________________________________________________________________________________________________________________________

### TO DO LIST
# Partie FRONT
- Page d’accueil il manque la section service et commerciale 
- Pages de Service est supprimer car présente dans la première page 
- Page Recherche un bien, il nous faut compléter le formulaire de simulation et l’intégrer +  intégrer les vignettes d’annonce.
- Page Contact : remettre en forme le formulaire 
- Page recrutement : remettre en forme le formulaire 
- Intégrer le template annonce.
- Gérer l’Ajax
- Intégrer la gestion des envoies de mails pour la partie contact et recrutement 
# Partie BACK
- Intégrer la navigation du back office dans le template back-office.html.twig
- Intégrer une page home dans le back-office
- Intégrer toutes les autres pages 
- Créer Le template USER_ADMIN

# Partie Back Gestion
Gestion du mot de passe oublié


