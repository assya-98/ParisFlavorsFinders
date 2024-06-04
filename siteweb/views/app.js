const express = require('express');
const mysql = require('mysql2');

const app = express();
const port = 3000;

app.set('view engine', 'ejs');
app.use(express.json());

// Configuration de la connexion à la base de données
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'votre_mot_de_passe',
    database: 'restaurant_db'
});

db.connect(err => {
    if (err) throw err;
    console.log('Connecté à la base de données MySQL.');
});

// Route pour afficher toutes les entrées, plats et desserts de chaque restaurant
app.get('/restaurants', (req, res) => {
    const sql = `
        SELECT r.id AS restaurant_id, r.nom AS restaurant_nom, p.id AS plat_id, p.nom AS plat_nom, p.description, p.prix, p.categorie
        FROM restaurants r
        LEFT JOIN plats p ON r.id = p.restaurant_id
        ORDER BY r.nom, p.categorie, p.nom
    `;
    db.query(sql, (err, results) => {
        if (err) throw err;

        const restaurants = {};
        results.forEach(row => {
            if (!restaurants[row.restaurant_id]) {
                restaurants[row.restaurant_id] = {
                    nom: row.restaurant_nom,
                    entrees: [],
                    plats: [],
                    desserts: []
                };
            }
            if (row.categorie === 'entrée') {
                restaurants[row.restaurant_id].entrees.push(row);
            } else if (row.categorie === 'plat') {
                restaurants[row.restaurant_id].plats.push(row);
            } else if (row.categorie === 'dessert') {
                restaurants[row.restaurant_id].desserts.push(row);
            }
        });

        res.render('restaurants', { restaurants });
    });
});

app.listen(port, () => {
    console.log(`Serveur exécuté sur http://localhost:${port}`);
});
