var canvas = document.getElementById('test');

if (canvas.getContext) 
{
	var ctx = canvas.getContext('2d');
	// code de dessin dans le canvas

	function draw() {
      	var canvas = document.getElementById("test");
      	if (canvas.getContext) 
      	{
	        var ctx = canvas.getContext("2d");

	        ctx.fillStyle = 'rgb(200, 0, 0)';
	        ctx.fillRect(10, 10, 50, 50); // param: position, taille

	        ctx.fillStyle = 'rgba(0, 0, 200, 0.5)';
	        ctx.fillRect(30, 30, 50, 50);
      	}
    }
} 
else 
{
	// code pour le cas où canvas ne serait pas supporté
}