function actionMenu(event, section,action){
    event.preventDefault(); // Evita la navegación predeterminada

    switch (section) {
        case 'user':
            switch (action) {
                case 'view':
                    //viewUsers();
                break;
                case 'add':
                    console.log("Vamos a agregar un usuario")
                    $("#main_container").load("/user/addUser");
                break;
            }
            break;
        }
}


