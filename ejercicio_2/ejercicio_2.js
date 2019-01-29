
function basesComparison(sec1, sec2) {
    sec1 = sec1.replace(new RegExp('\\s+','g'), '').split('').sort();
    sec2 = sec2.replace(new RegExp('\\s+','g'), '').split('').sort();
    return sec1.join() == sec2.join() ? true : false;
}
let sec1 = 'A A T C T G C C A G';
let sec2 = 'G T G A A C C C T A';
console.log(basesComparison(sec1,sec2));
