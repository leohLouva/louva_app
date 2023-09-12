const Profile = {
    roles: {
        "Admin": 1,
        "Agent": 2,
        "Client": 3,
        "QualityControl": 4,
        "CampaignManager": 5,
        "Inspector": 7,
        "SysAdmin": 8,
        "Manager": 9,
        "Resetter": 10,
    },


    //se eliminan porque no son compatibles con safari🥀

    validateAllComponents() {
        //aqui va a ir la lista de todos los components a validar para el usuario
        const components = [
            {
                div: "btnLogs",
                roles: ["SysAdmin"]
            },
            {
                div: "btnActiveCampaign",
                roles: ["Manager", "SysAdmin", "QualityControl", "Resetter"]
            },
            {
                div: "btnSettings",
                roles: ["Manager", "SysAdmin"]
            },
            {
                div: "btnCalendarCampaigns",
                roles: ["Client"]
            }
        ]


        components.forEach(component => {
            this.validateComponent(component.div, component.roles);
        });
    },

    destroySession() {

        samf.setURL("sam_laravel/public/signout");
        samf.asyncGet()
            .then((data) => {
                localStorage.clear();
                //console.log(data.response.redirection);
                window.location = data.response.redirection;
            })
            .catch(error => {
                console.log('Fetch error:' + error.message);
                return false;
            });
    },


    get() {
        let strJson = localStorage.getItem('S2JOdUl5VTA4S28=');
        let jsonUser = JSON.parse((strJson));

        return jsonUser;
    },

    async set() {
        const formData = new FormData();
        const paramsUrl = window.location.pathname + window.location.search;
        formData.append("url", paramsUrl);
        localStorage.getItem('S2JOYVMwNEtFN0tv');
        nameKey = btoa("KbNaS04KE7Ko");
        valueKey = ("Leo")
        localStorage.setItem(nameKey, atob(valueKey));
        let strJson = localStorage.getItem(nameKey);
        let Profile = JSON.parse((strJson));
        code = 1;
        return code;
        /*return await fetch("sam_laravel/public/session", {
                method: "post",
                body: formData,
                headers: {
                    "X-Auth-Token": localStorage.getItem('S2JOYVMwNEtFN0tv')
                }
            })
            .then(response => {
                return response.json();
            })
            .then(jsonInfo => {
                let response = jsonInfo.response;
                if (response.code == 1) {
                    var data = response.menu;
                    var nameKey = response.name;
                    var valueKey = response.value;
                    localStorage.setItem(nameKey, atob(atob(valueKey)));
                    let strJson = localStorage.getItem(nameKey);
                    let Profile = JSON.parse((strJson));
                    if (Profile.isDev == 1) {
                        document.getElementById("topMySAM").style.backgroundColor = "#9eaab1";
                        document.getElementById("test").style.backgroundColor = "#b2babf";
                    } else {
                        document.getElementById("topMySAM").style.backgroundColor = "#367fa9";
                        document.getElementById("test").style.backgroundColor = "#3c8dbc";
                    }
                    // let promesa = new Promise();
                    // promesa.data = data;
                    return response;
                } else if (response.code == 2) { //ocurrio un error con la IMAGEN
                    console.log(response.redirection);
                    localStorage.clear();
                    return response;
                    // window.location = response.redirection;
                }
            }).catch(error => {

                //alert(error);
                console.log('Fetch error:' + error.message);
                //  localStorage.clear();
                return false;
            });*/
    },




    isLevelOn(level) {
        let profile = this.get();
        let levelUser = this.roles[level];
        if (levelUser == parseInt(profile.idAccess)) {
            return true;
        } else {
            return false;
        }

    },

    validateComponent(component, arrayOfRoles) {
        var isOnRole = false;
        let componentUI = document.getElementById(component);
        if (componentUI != undefined) {
            for (let i = arrayOfRoles.length - 1; i >= 0; i--) {
                const element = arrayOfRoles[i];
                if (this.isLevelOn(element) == true) {
                    isOnRole = true;
                    componentUI.classList.remove('hide');
                    break;
                } else {
                    isOnRole = false;

                }
            }
        } else {
            console.log(component + ' <= Component is not defined');
        }

        if (isOnRole == false) {
            componentUI.remove();
        }
    },

    validateComponentByPermission(component, permission) {
        let componentUI = document.getElementById(component);
        let profile = this.get();
        let listPermissions = profile.permission;
        if (componentUI != undefined) {
            if (listPermissions[permission] == 1) {
                componentUI.classList.remove('hide');
                return true;
            } else {
                componentUI.remove();
                return false;
            }
        } else {
            console.log(component + ' <= Component does not exist');
            return false;
        }  
        

    },
    validateComponentByIdUser(component, arrayOfIdUser) {
        let isIdUser = false;
        let componentUI = document.getElementById(component);
        let profile = this.get();
        let myIdUser = profile.idUser;
        if (componentUI != undefined) {
            for (let i = arrayOfIdUser.length - 1; i >= 0; i--) {
                if(myIdUser==arrayOfIdUser[i]){
                    isIdUser = true;
                    componentUI.classList.remove('hide');
                    break;
                }else {
                    isIdUser = false;
                }
            }
        } else {
            console.log(component + ' <= Component does not exist');
            return false;
        }  
         if (isIdUser == false) {
            componentUI.remove();
        }
    }






}