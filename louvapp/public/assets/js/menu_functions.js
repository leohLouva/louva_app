function actionMenu(section,action){
    switch (section) {
        case 'user':
            switch (action) {
                case 'view':
                    console.log("Acá todo good")
                    $("#main_container").load("/user/list_user");
                    break;
            }
            break;
        }
}
