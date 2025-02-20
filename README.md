# Analyse Complète du Projet Ara 9ahwa

## 1. Idée Générale du Projet

Le projet **Ara 9ahwa** est une **application complète** pour la gestion d'un café, divisée en trois parties principales :

1. **Site Web Vitrine** : Présentation du café avec informations, localisation, menu et images.
2. **Application Client** : Commande des boissons et repas via QR Code attribué à chaque table.
3. **Application de Gestion (Admin & Serveur)** : Gestion des commandes, impression des factures, administration des utilisateurs et gestion du menu.

## 2. Technologies Utilisées

- **Framework** : Laravel avec Livewire pour une gestion dynamique.
- **Base de données** : MySQL.
- **Front-end** : Tailwind CSS pour un design moderne et responsive.
- **Authentification et Autorisation** : Gestion des utilisateurs et rôles.
- **Impression Thermique** : Pour la génération et l’impression de factures.

## 3. Fonctionnalités Détaillées

### a) Site Web Vitrine

- Présentation du café (images, histoire, ambiance).
- Affichage du menu avec photos et descriptions.
- Localisation du café via Google Maps.

### b) Application Client

- Scan du **QR Code** pour identifier la table.
- Sélection et ajout de produits au panier.
- Validation et envoi de la commande.
- Suivi du statut de la commande en temps réel.

### c) Application de Gestion (Admin & Serveur)

- Réception et suivi des commandes en temps réel.
- Attribution des commandes aux serveurs.
- Gestion des factures avec impression thermique.
- Administration du menu (ajout/modification/suppression de produits).
- Gestion des utilisateurs et des permissions.

## 4. UML Diagrammes

### a) Diagramme de Cas d'Utilisation

```plaintext
+---------------------------+
|          Client          |
+---------------------------+
        |   |   |   
        |   |   |
        v   v   v
+---------------------------+
|   Scanner QR Code        |
|   Sélectionner Produit   |
|   Passer Commande        |
+---------------------------+
        |
        v
+---------------------------+
|       Serveur/Admin      |
+---------------------------+
        |   |   |
        v   v   v
+---------------------------+
|   Gérer Commandes        |
|   Gérer Menu             |
|   Imprimer Factures      |
+---------------------------+
```

### b) Diagramme de Classes

```plaintext
+-----------------------+
| Utilisateur          |
|-----------------------|
| id                   |
| nom                  |
| email                |
| mot_de_passe         |
| role (client/admin)  |
+-----------------------+
        |
        | (Relation)
        v
+-----------------------+
| Table                |
|-----------------------|
| id                   |
| numero               |
| qr_code              |
+-----------------------+
        |
        | (Relation)
        v
+-----------------------+
| Commande             |
|-----------------------|
| id                   |
| table_id             |
| statut               |
| total_prix           |
+-----------------------+
        |
        | (Relation)
        v
+-----------------------+
| Produit              |
|-----------------------|
| id                   |
| nom                  |
| prix                 |
+-----------------------+
```

## 5. Schéma de Base de Données

```plaintext
Utilisateur (id, nom, email, mot_de_passe, role)
Table (id, numero, qr_code)
Commande (id, table_id, statut, total_prix)
Produit (id, nom, prix)
Commande_Produit (id, commande_id, produit_id, quantite)
```

**Relations :**

- Un **utilisateur** peut être **client ou admin**.
- Une **table** est liée à un **QR Code unique**.
- Un **client** peut passer **plusieurs commandes**.
- Une **commande** peut contenir **plusieurs produits**.
- Le **personnel** (admin/serveur) gère les commandes et factures.

## 6. Conclusion

Le projet **Ara 9ahwa** vise à moderniser la gestion d’un café en digitalisant les commandes et la gestion administrative. L’intégration des **QR Codes** améliore l’expérience client et optimise l’efficacité du personnel.

