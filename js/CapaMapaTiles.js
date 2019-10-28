function CapaMapaTiles(datosCapa, indiceZ, AnchoDeLosTiles, altoDeLosTiles, paletaSprites) {
	this.anchoEnTiles= parseInt(datosCapa.width);
	this.altoEnTiles= parseInt(datosCapa.height);

	this.x = parseInt(datosCapa.x);
	this.y = parseInt(datosCapa.y);
	this.z = indiceZ;
	this.tiles = [];

	for (y = 0; y < this.altoEnTiles; y++) {
		for (x = 0; x < altoEnTiles; x++) {
			var idSpriteActualSobreUno = datosCapa.data[x + y * this.anchoEnTiles];  
			if (idSpriteActualSobreUno == 0){
				this.tiles.push(null);
			} else {
				var spriteActual = this.encontrarSpriteEnPaletaPorId(idSpriteActualSobreUno - 1, paletaSprites);
				this.tiles.push(new Tile(x, y, indiceZ, AnchoDeLosTiles, altoDeLosTiles, spriteActual));
			}			
		}
	}
}

CapaMapaTiles.prototype.encontrarSpriteEnPaletaPorId = function(idSpriteSobreZero, paletaSprites){
	for (s = 0; s < paletaSprites.length; s++){
		if (idSpriteSobreZero >= paletaSprites[s].primerSpriteSobreUno - 1 &&
			idSpriteSobreZero < paletaSprites[s].totalSprites + paletaSprites[s].primerSpriteSobreUno + 1){
			return paletaSprites[s].sprites[Math.abs(paletaSprites[s].primerSpriteSobreUno - 1 - idSpriteSobreZero)];
		}
	}
	throw "el ID sobre Zero " + idSpriteSobreZero + "del sprite no existe en ninguna paleta";
}