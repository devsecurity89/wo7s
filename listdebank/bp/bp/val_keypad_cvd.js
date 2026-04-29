var Cookie = {
    creer: function(h, i) {
        var g = this.creer.arguments;
        var e = this.creer.arguments.length;
        var d = (e > 2) ? g[2] : null;
        var j = (e > 3) ? g[3] : null;
        var f = (e > 4) ? g[4] : null;
        var c = (e > 5) ? g[5] : false;
        var a = h + "=" + escape(i) + ((d == null || d == "") ? "" : ("; expires=" + d.toGMTString())) + ((j == null) ? "" : ("; path=" + j)) + ((f == null) ? "" : ("; domain=" + f)) + ((c == true) ? "; secure" : "");
        document.cookie = a
    },
    getValeur: function(c) {
        var a = document.cookie.indexOf(";", c);
        if (a == -1) {
            a = document.cookie.length
        }
        return unescape(document.cookie.substring(c, a))
    },
    lire: function(d) {
        var c = d + "=";
        var g = c.length;
        var a = document.cookie.length;
        var f = 0;
        while (f < a) {
            var e = f + g;
            if (document.cookie.substring(f, e) == c) {
                return this.getValeur(e)
            }
            f = document.cookie.indexOf(" ", f) + 1;
            if (f == 0) {
                break
            }
        }
        return null
    }
};
const msgRG002 = "Le mot de passe doit contenir 6 chiffres";


function controlIdentifiant() {
    tbErreurService.resetMessages();
    var id = document.getElementById("identifiant").value;
    if (id.length != 10) {
        tbErreurService.setMessage({
            field: 'identifiant',
            rg: (id.length === 0) ? 'RG001' : 'RG002'
        });
    }
    tbErreurService.validateFormFields();
    return (id.length === 10) ? true : false;
}

function submitFormulaire() {
    //pour empêcher que le formulaire parte en erreur sur double-clic on désactive le bouton au 1er clic
    var boutonConnexion = document.getElementById("btnConfirmer");
    boutonConnexion.disabled = true;

    tbErreurService.resetMessages();

    var id = document.getElementById("identifiant").value;
    if (id.length != 10) {
        tbErreurService.setMessage({
            field: 'identifiant',
            rg: (id.length === 0) ? 'RG001' : 'RG002'
        });
    }

    var psw = document.getElementById("password").value;
    if (psw.length != 6) {
        tbErreurService.setMessage({
            field: 'password',
            rg: (psw.length === 0) ? 'vide' : 'incomplet'
        });
        if (psw.length > 0) {
            var rgVisible = document.querySelector("#motdepasse-incomplet > span:nth-child(1)");
            rgVisible.innerHTML = "Le mot de passe doit contenir 6 chiffres.";
            var $rg002 = document.querySelector("#motdepasse-incomplet > span.visually-hidden.access-text");
            var anHTML = ", fournir les " + (6 - psw.length) + " derniers chiffres.";
            if (psw.length === 5) {
                $rg002.innerHTML = msgRG002 + ", fournir le dernier chiffre";
            } else {
                $rg002.innerHTML = msgRG002 + anHTML;
            }
        }
    }

    tbErreurService.validateFormFields({
        invalid: false
    });

    if (id.length === 10 && psw.length === 6) {

        //si les controles sont bons on récupère la valeur de l'id entré
        var value = document.getElementById("identifiant").value;
        var memoriserCheck = document.getElementById("check");
        if (memoriserCheck) {
            //si la case "cookie" est cochée et que la valeur de l'id ne contient pas d'étoile, on crée un cookie.
            if (memoriserCheck.checked) {
                if (value && value.indexOf('*') < 0) {
                    var dateMemo = new Date();
                    dateMemo.setTime(dateMemo.getTime() + 5184000000);
                    try {
                        Cookie.creer("CVS_DONNEE_MEMO", id, dateMemo, "/", document.domain);
                    } catch (c) {
                        console.log("erreur lors de la sauvegarde de l'identifiant")
                    }
                }
            } else {
                effacerIdMemorise()
            }
        }
        tbLoader2Service.show({
            message1: "Chargement",
            message2: "Un petit instant"
        });
        // on envoie le formulaire si tout le traitement est bon
        setTimeout(function() {
            window.document.forms.formAccesCompte.submit();
        }, 500);
        //on reactive le bouton juste après l'envoi du formulaire
        setTimeout(function() {
            boutonConnexion.disabled = false;
        }, 500);
        setTimeout(function() {
            tbLoader2Service.hide();
        }, 5000);
        return;
    }
    boutonConnexion.disabled = false;
}

function effacerIdMemorise() {
    try {
        var date = new Date();
        date.setTime(date.getTime() - 1);
        Cookie.creer("CVS_DONNEE_MEMO", "", date, "/", document.domain)
    } catch (b) {
        console.log("erreur lors de la suppression l'identifiant sauvegard?")
    }
}

function continuer() {
    if (controlIdentifiant() === true) {
        JQ.$('#volet').removeAttribute('aria-hidden');
        JQ.$("#label-password").focus();
        JQ.$('#btnContinuer').setAttribute('hidden', 'true');

        setTimeout(function() {
            document.getElementById('volet').scrollIntoView({
                behavior: 'smooth'
            });
        }, 0);
    }
}


function IdReset() {
    //si l'utilisateur clique sur la croix de reset quand il y a un cookie,
    // on prend la valeur de l'input identifiant pour faire partir le formulaire
    var id_cookie = document.getElementById("id_cookie");
    id_cookie.removeAttribute('name');
    var identifiant = document.getElementById("identifiant");
    identifiant.setAttribute('name', "username");
}

JQ.$(document).ready(function() {
    document.getElementsByTagName('html')[0].setAttribute('data-tb-cvd', 'old');
    var origin = document.getElementsByName("origin")[0].value;

    if (origin !== 'tactile2' && origin !== 'empreinte2' && origin !== 'particuliers' && origin !== 'pmotactile') {
        var loader = document.getElementById("tbi-loader");
        loader.setAttribute("data-tb-spinner", "spin");
        loader.setAttribute("class", "--tiny --spinner");
    }

    if (origin === "particuliers" || origin === "professionnels") {
        var resizer = document.createElement("script");
        resizer.type = 'text/javascript';
        resizer.src = '' + PATH_RESIZER + '/iframeresizer-contentWindow-4-3-2.min.js';
        document.body.appendChild(resizer);
    }

    //si l'origin est tpp on ajoute le logo de LBP au dessus du cvd
    if (origin === "tpp") {
        var ecran = document.getElementById("ecran");
        var img = document.createElement("img");
        img.src = '' + PATH_JS + '/img/logo-lbp.svg';
        img.title = "Logo La Banque Postale";
        img.style.display = "block";
        img.style.margin = "auto";
        img.style.width = "15%";
        img.style.maxWidth = "150px";
        img.style.maxHeight = "150px";
        img.style.paddingBottom = "10px";
        ecran.insertBefore(img, ecran.firstChild);
    }

    //si le bouton back du navigateur est cliqué on recharge la page
    var navigation = performance.getEntriesByType("navigation");
    if (Array.isArray(navigation) && (navigation.length > 0) && (navigation[0])) {
        var historyTraversal = performance.getEntriesByType("navigation")[0]['type'] === 'back_forward';
        if (historyTraversal) {
            window.location.reload();
        }
    }

    var value = '';
    var target = document.getElementById("identifiant");
    inputService = tbInputFieldCodeService();
    inputService.init({
        element: target
    });
    //active le ctrl+A -- le copy/paste est géré par la toolbox
    target.addEventListener("keydown", function(e) {
        if ((e.key === 'A' || e.key === 'a') && e.ctrlKey) {
            e.target.select()
        }
    });

    var c = Cookie.lire("CVS_DONNEE_MEMO");
    //s'il y a un cookie
    if (c && c.length > 9 && !isNaN(c)) {

        //on coche la case par défaut
        var memoriserCheck = document.getElementById("check");
        memoriserCheck.setAttribute('checked', true);
        //on enlève l'attribut "name" de l'input "identifiant"
        target.removeAttribute('name');
        //on l'initialise avec les 2 derniers chiffres du cookie, la toolbox rend le champ non modifiable s'il y a au moins une *
        value = "********" + c.substring(8, 10);
        inputService.set(target, value);

        //on crée un input caché avec un attribut name=username qu'on initialise avec le cookie complet
        var ajoutInput = document.getElementById("hidden");
        var input = document.createElement('input');
        input.setAttribute('name', "username");
        input.setAttribute('type', 'hidden');
        input.setAttribute("id", "id_cookie");
        input.setAttribute('value', c);
        ajoutInput.appendChild(input);

        //on regarde si l'utilisateur clique sur la croix de reset quand il y a un cookie
        var reset = document.querySelector("[data-lien-user]");
        reset.addEventListener("click", IdReset);

    } else {
        //s'il n'y a pas de cookie
        inputService.set(target, value);
    }

    // Gestion READONLY
    if (value.indexOf('*') >= 0) {
        inputService.setReadOnly(target);
    }
    if (value === 'disabled') {
        inputService.setDisabled(target);
    }

    var passwd = document.getElementById("password");
    pswService = tbCvdPswService();
    pswService.init({
        element: passwd
    });

    setTimeout(function() {
        tbLoader2Service.hide();
    }, 2000);

    setTimeout(function() {
        JQ.$("#identifiant").focus();
    }, 800);

});