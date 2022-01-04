const resultadoFinal = {};
const monedera = [500, 200, 100, 50, 20, 10, 5, 2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01];

let dinero = prompt("Ingrese el monto a evaluar: "); //1500
let dineroAux = dinero;


for(let moneda of monedera) {
    let residuo = dinero % moneda; //1500 % 500
    let cantidadMoneda = (dinero - residuo) / moneda; 
    dinero -= cantidadMoneda * moneda;
    dinero = Math.round(dinero * 100) / 100;
    resultadoFinal[moneda] = cantidadMoneda;
}

console.log(`%c El resultado final para $${dineroAux} es: `,"color:white;background:black;padding: 10px;border-style:solid;border-color:red;");
console.table(resultadoFinal);



