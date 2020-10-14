let k = 1;
document.write("<table style='border: solid black 1px;'>")
for (let i = 0; i < 10; i++) {
    document.write("<tr>");
    for (let j = i; j < 10; j++) {
        document.write("<td style='border: solid black 1px;'>");
        document.write(`${k} `);
        document.write("</td>");
        k++;
    }
    
    document.write("</tr>");
}

document.write("</table>");