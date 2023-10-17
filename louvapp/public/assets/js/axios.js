const louvax = {
    url: "",
    imgDefault: "",
    getImage(imageName) {
        url = imageName;
        return fetch(url)
            .then(response => {
                if (response.status != 200) {
                    throw Error("img not exist");
                } else {
                    return response.blob();
                }
            }).then(imageBlob => {
                var objectURL = URL.createObjectURL(imageBlob);
                return {
                    objectURL,
                    status: true
                };
            }).catch(error => {
                console.log(error);
                return {
                    status: false
                };
            });
    },
    setURL(urlParam) { //se tiene que definir antes de llamar cualquier fetch
        this.url = urlParam;

    },
    asyncGet(params = []) {
        if (params.length > 0) {
            this.url += "?";
            params.forEach(element => {
                let key = Object.keys(element);
                this.url += key + "=" + element[key] + "&";


            });
            this.url = this.url.slice(0, -1);

        }
        return axios.get(this.url, {
            headers: {
                "X-Auth-Token": localStorage.getItem('S2JOYVMwNEtFN0tv')
                //"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        })
        .then(response => {
            
            const data = {};
            if (typeof response.data === 'string' || response.data instanceof String) {
                data.code = 300;
                data.message = response.data;
                console.error("/********************************************************/");
                console.info("This is a failed response");
                console.debug(response.data);
                console.error("/********************************************************/");
                //esto guarda el error en la db
                new reporter(response.data,response);
                return data;
            }
            else {
               
               return response.data;
            }
        })
        .catch(error => {
            console.debug("/********************************************************/");
            console.error(error);
            console.debug("/********************************************************/");

        })
        // return fetch(this.url,{
        //     headers: {
                 //"X-Auth-Token": localStorage.getItem('S2JOYVMwNEtFN0tv')
        //"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        //     }
        // })
        // .then(response => response.json())
        // .then(jsonInfo => {
        //     return jsonInfo;


        // }).catch(error => {
        //     return 'Fetch error:' + error.message;
        // });
    },
    prepareData(params) {
        let formData = new FormData();
        for (let index = 0; index < params.length; index++) {
            let key = Object.keys(params[index]);
            formData.append(key, params[index][key]);

        }

        return formData;
    },
    asyncPost(params = []) { //recibe un array de objetos con índices[{key:value},]asdasdasd as
        let dataBody = this.prepareData(params);
        
        console.log(params);
        console.log(this.url);
        return fetch(this.url, {
                method: "POST",
                headers: {
                    "X-Auth-Token": localStorage.getItem('S2JOYVMwNEtFN0tv')
                    //"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                body: dataBody

            })
            .then(response => response.json())
            .then(jsonInfo => {
                return jsonInfo;
            }).catch(error => {
                return 'Fetch error:' + error.message;
            });
    },
    asyncDelete(params = []) {//recibe un array de objetos con índices[{key:value},]
        let dataBody = this.prepareData(params);
        return fetch(this.url,{
            method: "DELETE",
            headers: {
                "X-Auth-Token": localStorage.getItem('S2JOYVMwNEtFN0tv')
                //"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            body: dataBody
            
        })
        .then(response => response.json())
        .then(jsonInfo => {
            return jsonInfo;  
        }).catch(error => {
            return 'Fetch error:' + error.message;
        });
    }
}
