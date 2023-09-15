function actionMenu(event, section,action){
    event.preventDefault(); // Evita la navegación predeterminada

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
