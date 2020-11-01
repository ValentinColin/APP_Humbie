// 1) Création d'un objet jsGraphDisplay
var graph = new jsGraphDisplay();

// 2) Ajout des données
graph.DataAdd({
data: [
	[4, 21],
	[8, 23],
	[12, 26],
	[16, 25],
	[20, 20],
	[24, 22],
	[28, 27],
	[32, 35]
]
});

// 3) Affichage du résultat
graph.Draw('graphExemple1');