function renderObject(object){
    let keys = Object.keys(object);  
    var divRender = document.getElementById("body");
    var apoint = new Array();
    var i = 0;
    var apointStatus = ""; 
    keys.forEach((key, value) => {
        console.log(key);
        console.log(object[key]);
        if(object[key] == "on"){
            object[key] = key.split("-")[3];
        }
        type = key.split("-")[1];
        if(apointStatus == "true" && type != "apoint"){
            apointRender(apoint);
            apointStatus = "false";
        }
        switch(type){
            case "apointRender":
                apointmentRender(apoint);
            case "department":
                break;
            case "diagnosis": 
                break;
            case "userComment":
                element = document.createElement("textarea");
                element.setAttribute("name", key);
                element.setAttribute("id", key);
                element.setAttribute("rows", "4");
                element.setAttribute("cols", "50");
                divRender.appendChild(element);

                element = document.createElement("br");
                divRender.appendChild(element);
                break;
            case "investigations": 
                break;
            case "treatments": 
                break; 
            case "description":
                element = document.createElement("p");
                element.innerHTML = object[key];
                divRender.appendChild(element);
                break;
            case "multipleChoice":
                element = document.createElement("label");
                element.innerHTML = object[key];
                divRender.appendChild(element);

                element = document.createElement("input");
                element.setAttribute("type", "radio");
                element.setAttribute("name", key.split("-")[3]);
                element.setAttribute("id", key);
                divRender.appendChild(element);

                element = document.createElement("br");
                divRender.appendChild(element);

                break;
            case "file":
                element = document.createElement("label");
                element.innerHTML = object[value];

                divRender.appendChild(element);

                element = document.createElement("input");
                element.setAttribute("type", "file");
                element.setAttribute("name", key);
                element.setAttribute("id", key);
                element.setAttribute("accept", "image/*");
                element.setAttribute("multiple", "multiple");
                divRender.appendChild(element);
                break;
            case "title":
                element = document.createElement("h1");
                element.innerHTML = object[key];
                divRender.appendChild(element);
                break;
            case "recipient":
                break;
            case "apoint":
                apointStatus = "true";
                apoint[i] = object[key];
                i++;
            break;
        }
    });
    if(apointStatus == "true"){
        apointRender(apoint);
    }
}

function apointRender(apointData){
    var divRender = document.getElementById("body");
    var element;
    console.log(apointData);
    if(apointData[0] == "Sedual Apointment"){
        element = document.createElement("h2"); 
        element.innerHTML = "Please input the folling infomation to sedual an apointment with the " + apointData[1].toLowerCase() + " " + apointData[2];
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);

        element = document.createElement("label");
        element.setAttribute("for", "apoint");
        element.innerHTML = "Date";
        divRender.appendChild(element);

        element = document.createElement("select");
        element.setAttribute("name", "apoint");
        element.setAttribute("id", "apoint");

        var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        for(var i = 0; i < 7; i++){
            for(var j = 0; j < apointData.length; j++){
                if(apointData[j] == days[i]){
                    var option = document.createElement("option");
                    option.setAttribute("value", apointData[j]);
                    option.innerHTML = apointData[j];
                    element.appendChild(option);
                }
            }
        }
        divRender.appendChild(element);


    x

    }
    else{
        element = document.createElement("h2");
        element.innerHTML = "Appointment Request";
        divRender.appendChild(element);

        element = document.createElement("p"); 
        element.innerHTML = "Please confirm that you would like to request an apointment with the " + apointData[1].toLowerCase() + " " + apointData[2];
        divRender.appendChild(element);

        element = document.createElement("label");
        element.innerHTML = "Yes";
        divRender.appendChild(element);

        element = document.createElement("input");
        element.setAttribute("type", "radio");
        element.setAttribute("name", "apoint");
        element.setAttribute("id", "apoint");
        element.setAttribute("value", "yes");
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);

        element = document.createElement("label");
        element.innerHTML = "No";
        divRender.appendChild(element);

        element = document.createElement("input");
        element.setAttribute("type", "radio");
        element.setAttribute("name", "apoint");
        element.setAttribute("id", "apoint");
        element.setAttribute("value", "no");
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);
        
        element = document.createElement("br");
        divRender.appendChild(element);

        element = document.createElement("label");
        element.innerHTML = "Reason for appointment (optional)";
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);

        element = document.createElement("input");
        element.setAttribute("type", "text");
        element.setAttribute("name", "apoint");
        element.setAttribute("id", "apoint");
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);       
    }
}
