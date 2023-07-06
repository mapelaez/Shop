function dibujarLogo(canvas, pequenio=true){
	var ctx = canvas.getContext("2d");

	if (pequenio)
		ctx.scale(0.17, 0.17);
	ctx.fillStyle = "#E34C26";
	ctx.beginPath();
	ctx.moveTo(39, 250);
	ctx.lineTo(17, 0);
	ctx.lineTo(262, 0);
	ctx.lineTo(239, 250);
	ctx.lineTo(139, 278);
	ctx.closePath();
	ctx.fill();

	function dibujarTexto(){
		ctx.fillStyle = "#FFFFFF";
		ctx.font = "60px Zen Dots";
		ctx.fillText("ECKO",30,150);
	}

	document.fonts.load('10pt "Zen Dots"').then(dibujarTexto);
}
