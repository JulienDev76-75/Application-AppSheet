window.onload = () => {
    const filtersForm = document.querySelector("#filters");

    // Plusieurs Input pour les sites donc boucle dessus
    document.querySelectorAll("#filters input").forEach(input => {
        input.addEventListener("change", () => {
            // On intercepte les clics ici et on récupère chacune des données du formulaire avec FormData
            const Form = new FormData(filtersForm);

            // On fabrique la "QueryString"
            const Params = new URLSearchParams();

            // Rappel forEach c'est paire clé - valeur
            Form.forEach((value, key) => {
                 Params.append(key, value);
            });

            // On récupère l'URL active
            const Url = new URL(window.location.href);

            // Requête Ajax lancée, méthode différente avec fetch que la méthode dites classique, si une 'Promise' est récupérée, alors on peut lancer un then.
            fetch(Url.pathname + "?" + Params.toString() + "&ajax=1", {
                headers : {
                    "X-Requested-With":"XMLHTTPRequest"
                }
            }).then(response => {
                console.log(response);
            }).catch(e => alert(e));
            
        });
    });
} 

var wrapper, content, test;
var more = '<div style="height:1000px; background:#EEE;"></div>';

// this is the scroll event handler
function scroller() {
  // print relevant scroll info
  test.innerHTML = wrapper.scrollTop + " + " + wrapper.offsetHeight + " + 100 > " + content.offsetHeight;

  // add more contents if user scrolled down enough
  if (wrapper.scrollTop + wrapper.offsetHeight + 100 > content.offsetHeight) {
    content.innerHTML += more; // NK: Here you can make an Ajax call and fetch content to append to content.innerHTML
  }
}

wrapper = document.getElementById("wrapper");
content = document.getElementById("content");
test = document.getElementById("test");

content.innerHTML = more;

// hook the scroll handler to scroll event
if (wrapper.addEventListener) // NK: Works on all new browsers
  wrapper.addEventListener("scroll", scroller, false);

else if (wrapper.attachEvent) // NK: Works on old IE
  wrapper.attachEvent("onscroll", scroller);