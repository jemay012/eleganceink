

window.onload = () => {
       var text, parser, xmlDoc;

       text = "<bookstore>"
             "<book>" +
       "<title>Everyday Italian</title>" +
       "<author>Giada De Laurentiis</author>" +
       "<year>2005</year>" +
       "</book></bookstore>";
       
       parser = new DOMParser();
       xmlDoc = parser.parseFromString(text,"text/xml");
       
       document.getElementById("container").innerHTML =
       xmlDoc.getElementsByTagName("title")[0].childNodes[0].nodeValue;
       
}
