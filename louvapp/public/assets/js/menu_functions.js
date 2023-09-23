function actionMenu(event, section,action){
    event.preventDefault(); // Evita la navegación predeterminada

    switch (section) {
        case 'user':
            switch (action) {
                case 'listUsers':
                    viewListUsers();
                break;
                case 'add':
                    console.log("Vamos a agregar un usuario")
                break;
            }
            break;
        }
}






