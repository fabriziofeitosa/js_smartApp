  /*
  SCRIPT DE VERIFICAÇÃO DE DISPOSITIVO
  Por Fabrizio Feitosa  |  behance.net/fabriziofeitosa
  */

  var ua = navigator.userAgent.toLowerCase();
  var uMobile = '';

  // === iPhone, Windows Phone, Android, etc. ===
  // Lista de substrings a procurar para ser identificado como mobile WAP
  uMobile = '';
  uMobile += 'iphone;ipod;windows phone;android;iemobile 8';

  // Sapara os itens individualmente em um array
  v_uMobile = uMobile.split(';');
  
  var boolMovel = '';
  // percorre todos os itens
  for (i=0;i<=v_uMobile.length;i++){

    // Descobrir se é mobile
    if (ua.indexOf(v_uMobile[i]) != -1){
      boolMovel = true;
    };

    // Descobrir se é iphone ou um ipad
    if (ua.indexOf("iphone") != -1 || ua.indexOf("ipad") != -1 || boolMovel == true) {
      // Link Apple Store
      $(".smart-banner > .btn").attr("href", "https://itunes.apple.com/us/app/i-can-has-cheezburger-official/id381442338?mt=8&uo=4");
    };

    // Descobrir se é Android
    if (ua.indexOf("android") != -1  || boolMovel == true) {
      // Link Play Store | Mais informações: https://developer.android.com/distribute/marketing-tools/linking-to-google-play.html
      $(".smart-banner > .btn").attr("href", "http://play.google.com/store/apps/details?id=<package_name>");
    };

  }

  // É mobile Mobile? Sim! Então vamos mostrar a barra.
  if (boolMovel == true){
    // Ocultar quando desktop
    $(".smart-banner").show();
  }

  // ANIMAÇÃO AO CLICAR NO X
  $(document).on('click', '.smart-banner .close', function (event) {
    event.preventDefault();
    var $banner = $('.smart-banner');
    $banner.css('margin-top',0 - $banner.outerHeight() - 10);
    // SETANDO COOKIE | Ex.: setCookie('Nome',horas);
    setCookie('SmartApp',10);
  });

  // ESCONDER SE HOUVER COOKIE
  if( getCookie('SmartApp') ) {
    $(".smart-banner").hide();
  }

  // --------------------------------------------------------------------- //

  // Criar Cookie
  function setCookie(name,extime) {    //função universal para criar cookie
    var expires;
    var date; 
    var value;

    date = new Date(); //  criando o COOKIE com a data atual
    //date.setTime(date.getTime()+(extime*60*60*1000));
    date.setTime(date.getTime()+(extime*1000)); // Teste em segundos
    expires = date.toUTCString();
    value = "12Horas";

    document.cookie = name+"="+value+"; expires="+expires+"; path=/";
  }

  // Ler
  function getCookie(name) {
    var c_name = document.cookie; // listando o nome de todos os cookies
    if(c_name!=undefined && c_name.length > 0) { // verificando se o mesmo existe
      var posCookie = c_name.indexOf(name); // checando se existe o name
      if (posCookie >= 0) { //se existir o cookie retorna TRUE
        return true;
      }
      else return false;
    }
  }

  // Deletar
  function deleteCookie(name) {
    setCookie(name,-1); // deletando o cookie
  }