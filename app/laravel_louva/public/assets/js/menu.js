function load_UrlViews() {
    var section = get_ParameterURL('section');
    var urlPage = "";
    switch (section) {
        case 'appointment':
            urlPage = "views/appointment/appointment.html";
            requestPageHtml(urlPage);
            break;
        case 'template':
            urlPage = "views/template_Script/view_EditTemplateScript.html";
            requestPageHtml(urlPage);
            break;
        case 'addDetailPayRoll':
            urlPage = "views/payRoll/addReportPayRoll.html";
            requestPageHtml(urlPage);
            break;
        case 'editDetailPayRoll':
            urlPage = "views/payRoll/editReportPayRoll.html";
            requestPageHtml(urlPage);
            break;
        case 'campaigns':
            urlPage = "views/campaigns/editcampaign.html";
            requestPageHtml(urlPage);
            break;
        case 'companies':
            urlPage = "views/companies/content_EditCompany.html";
            requestPageHtml(urlPage);
            break;
        case 'user':
            urlPage = "views/user/viewEditUser.html";
            requestPageHtml(urlPage);
            break;
        case 'storm':
            urlPage = "views/storm/editStorm.html";
            requestPageHtml(urlPage);
            break;
        default:
            let strJson = localStorage.getItem('S2JOdUl5VTA4S28=');
            let Profile = JSON.parse((strJson));
            if (Profile.idAccess == 3) {

                actionMenu('scoreData', 'client');
            } else {

                actionMenu('scoreData', 'loadscoredata')
            }
            break;
    }
    waitingDialog.hide();
}


function loadToken() {
    
    var variable = get_ParameterURL('token');
    if (variable != "" && variable != undefined) {
        var arrayRequest = [];
        arrayRequest.push({ action: "activatePolicy" });
        arrayRequest.push({ token: variable });
        samf.setURL("Controllers/user/UserController.php");
        samf.asyncPost(arrayRequest).then(jsonInfo => {
            waitingDialog.hide();
            if (jsonInfo.response.code == 1) {
                swal({
                    title: "Token validated successfully!",
                    text: jsonInfo.response.msg,
                    type: "success",
                    html: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        location.href = "index.html";
                    }
                });
            } else if (jsonInfo.response.code == 2) {
                swal({
                    title: "Fail to Verify Token!",
                    text: jsonInfo.response.msg + "<br>" + jsonInfo.response.msgAdditional,
                    type: "error",
                    html: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        location.href = "index.html";
                    }
                });
            } else if (jsonInfo.response.code == 3) {
                swal({
                    title: "Info!",
                    text: jsonInfo.response.msg + "<br>" + jsonInfo.response.msgAdditional,
                    type: "info",
                    html: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        location.href = "index.html";
                    }
                });
            } else {
                swal({
                    title: "Fail to Verify Token!",
                    text: "We're sorry, an error occurred while trying to validate your token. Inform your system administrator.",
                    type: "warning",
                    html: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        location.href = "index.html";
                    }
                });
            }
        });



    }

}
