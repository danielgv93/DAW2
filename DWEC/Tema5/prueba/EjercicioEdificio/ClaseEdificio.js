function Edificio(calle, numero, cp, plantas) {
    this.calle = calle;
    this.numero = numero;
    this.cp = cp;
    this.plantas = plantas;
    this.edificio = Array();
    this.addPlantasPuertas = addPlantasPuertas;
    this.addPropietario = addPropietario;
    this.imprimePlantas = imprimePlantas;
}

function addPlantasPuertas(nPuertas) {
    let edificio = Array(this.plantas.length);
    for (let i = 0; i < edificio.length; i++) {
        edificio.push(Array(nPuertas).fill("vacío"));
    }
    return edificio;
}

function addPropietario(nombre, planta, puerta) {
    this.edificio[planta][puerta-1] = nombre;
}

function imprimePlantas() {
    let string = "";
    for (let i = 0; i < this.edificio.length; i++) {
        string += `Planta ${i}: `;
        for (let j = 0; j < this.edificio[i].length; j++) {
            string += `puerta ${j+1} -> ${this.edificio[i][j]}`;
        }
        string += `\n`;
    }
}

/* TODO: METODOS PARA VISUALIZAR OTROS DATOS */