function renderObject(object) {
    let keys = Object.keys(object);
    var divRender = document.getElementById("render");
    var apoint = new Array();
    var i = 0;
    var type;
    var radioName = "";
    var apointStatus = "";
    keys.forEach((key, value) => {
        if (object[key] == "on") {
            object[key] = key.split("-")[3];
        }
        if (key.split("-")[2] == "time" && key.split("-")[3] == null) {
            object[key] = "time-" + object[key];
        }
        type = key.split("-")[1];
        if (apointStatus == "true" && type != "apoint") {
            apointRender(apoint);
            apointStatus = "false";
            element = document.createElement("hr");
            divRender.appendChild(element);

            element = document.createElement("br");
            divRender.appendChild(element);
        }
        switch (type) {
            case "department":
                element = document.createElement("label");
                element.innerHTML = type;
                divRender.appendChild(element);
                break;
            case "diagnosis":
                element = document.createElement("label");
                element.setAttribute("class", "diagnosis");
                element.innerHTML = type;
                divRender.appendChild(element);
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
                element = document.createElement("label");
                element.setAttribute("class", "investigations");
                element.innerHTML = type;
                divRender.appendChild(element);
                break;
            case "treatments":
                element = document.createElement("label");
                element.setAttribute("class", "treatments");
                element.innerHTML = type;
                divRender.appendChild(element);
                break;
            case "description":
                object[key] = object[key].replace(/\n/g, "<br />");
                element = document.createElement("p");
                element.setAttribute("class", "description");
                element.innerHTML = object[key];
                divRender.appendChild(element);
                break;
            case "multipleChoice":
                if(radioName != key.split("-")[3] && radioName != ""){
                    element = document.createElement("hr");
                    divRender.appendChild(element);
                }
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


                radioName = key.split("-")[3];

                break;
            case "file":
                element = document.createElement("label");
                element.innerHTML = object[key];

                divRender.appendChild(element);

                element = document.createElement("br");
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
                element = document.createElement("h3");
                element.innerHTML = object[key];
                divRender.appendChild(element);
                break;
            case "recipient":
                element = document.createElement("label");
                element.innerHTML = type;
                divRender.appendChild(element);
                break;
            case "apoint":
                apointStatus = "true";
                apoint[i] = object[key];
                i++;
                break;
            case "patient":
                element = document.createElement("label");
                element.innerHTML = type;
                divRender.appendChild(element);
                break;
            case "perscription":
                element = document.createElement("label");
                element.innerHTML = type;
                divRender.appendChild(element);
                break;


        }

        console.log(type);
        if ((type != "multipleChoice" && type != "apoint") || (type == "multipleChoice" && keys[value + 1].split("-")[1] != "multipleChoice")) {
            element = document.createElement("hr");
            divRender.appendChild(element);

            element = document.createElement("br");
            divRender.appendChild(element);
        }
    });
    if (apointStatus == "true") {
        apointRender(apoint);
    }


}

function apointRender(apointData) {
    var divRender = document.getElementById("render");
    var element;
    console.log(apointData);
    if (apointData[0] == "Sedual Apointment") {
        element = document.createElement("h5");
        element.innerHTML = "Please input the folling infomation to sedual an apointment with the " + apointData[1] + " " + apointData[2];
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);

        element = document.createElement("label");
        element.setAttribute("for", "apoint");
        element.innerHTML = "Day:";
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);

        element = document.createElement("select");
        element.setAttribute("name", "apoint");
        element.setAttribute("id", "apoint");

        var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        for (var i = 0; i < 7; i++) {
            for (var j = 0; j < apointData.length; j++) {
                if (apointData[j] == days[i]) {
                    let option = document.createElement("option");
                    option.setAttribute("value", apointData[j]);
                    option.innerHTML = apointData[j];
                    element.appendChild(option);
                }
            }
        }
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);

        element = document.createElement("label");
        element.setAttribute("for", "apointTime");
        element.innerHTML = "Time:";
        divRender.appendChild(element);

        element = document.createElement("br");
        divRender.appendChild(element);


        element = document.createElement("select");
        element.setAttribute("name", "apointTime");
        element.setAttribute("id", "apointTime");
        var times = new Array();
        var inputTimes = new Array();
        var duration; //minutes


        for (let i = 0; i < apointData.length; i++) {
            if (apointData[i].indexOf("time") != -1) {
                duration = parseInt(apointData[i].split("-")[1]);
            }
            if (apointData[i].indexOf(":") != -1) {
                console.log(apointData[i]);
                inputTimes.push(apointData[i]);
            }
        }
        //1440 minutes in a day

        for (let i = 0; i < inputTimes.length; i += 2) {
            var time1 = inputTimes[i].split(":");
            var time2 = inputTimes[i + 1].split(":");

            time1 = parseInt(time1[0]) * 60 + parseInt(time1[1]);
            time2 = parseInt(time2[0]) * 60 + parseInt(time2[1]);

            var time = time2 - time1;
            time = time / duration;

            for (let j = time1; j < time2; j += duration) {
                var hours = Math.floor(j / 60);
                var minutes = j % 60;
                if (hours < 10) {
                    hours = "0" + hours;
                }
                if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                times.push(hours + ":" + minutes);
            }
        }

        for (var i = 0; i < times.length; i++) {
            let option = document.createElement("option");
            option.setAttribute("value", times[i]);
            option.innerHTML = times[i];
            element.appendChild(option);
        }
        divRender.appendChild(element);
    }
    else {
        element = document.createElement("h3");
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
