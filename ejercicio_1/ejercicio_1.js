function numeroBlancos( string ){
    /**
     * Objeto con letras que contienen blancos y cantidad
     * considero que g en minuscula tiene dos blancos pero depende de la tipografia
     */
    let cantidadBlancos = { a:1, b:1, d:1, e:1, g:2, o:1, p:1, q:1, A:1, B:2, D:1, O:1, P:1, Q:1, R:1};
    let total = string.match( new RegExp('[' + Object.keys(cantidadBlancos).join("") + ']', 'g') ).reduce( function (total, letter) {
        return  total + cantidadBlancos[letter];
    }, 0);
    return total;
}
string = "BBBagqqqhh";
console.log(numeroBlancos(string));
