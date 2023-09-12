async function loadFirst() {
    console.log("Hola");
    //let profile = await Profile.set(); //setea el profile del usuario
    //console.log("lo que viene en profile es " + profile);
    Profile.validateAllComponents();
    window.location = profile.redirection;
    return;
    if (profile.code == 2) {
        window.location = profile.redirection;
    } else {
        /*waitingDialog.show();
        showMenu('menuVertical', profile.menu);
        customizeMenu();

        //ocultar el nuevo loading
        //mostrar el body
        
        if (Profile.validateComponentByPermission('iconNotification','view_notification')== true) {
          getCountNotifications();
          //setInterval('getCountNotifications()', 300000);
          
        }
      
        Profile.validateAllComponents();
        let userProfile = Profile.get();
        document.getElementById("btnActiveCampaign").style.display = "none";
        if (userProfile.idAccess == 8 || userProfile.idAccess == 9) {
            //getActiveCampaignsNumber();
        } else if (userProfile.idAccess == 2) {
            var buttonProfile = document.getElementById("editProfileUser");
            var padre = buttonProfile.parentNode;
            padre.removeChild(buttonProfile);

        } else {
            let urlRef = window.location.href;
            if (urlRef.search("section") < 0) {
                // waitingDialog.hide();
            }

        }*/
        //load_UrlViews();
        loadToken();

    }



}