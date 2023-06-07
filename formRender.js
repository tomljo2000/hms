function renderForm(data) {
    console.log(data);

    let dataObj = Object.keys(data);

    dataObj.forEach((key, value) => {
        let selected = key.split("-")[1];
        console.log(selected);
        var item = document.getElementById("formRender");
        var input, element;
        var endOfMultipleChoice = false;

        if (selected == "apoint") {
            if (dataObj[value + 1] == undefined || dataObj[value + 1].split("-")[1] != "apoint") {
                element = addInputType(null, "Apointment");
            }
            //add each input choice
        }
        else if (selected == "multipleChoice") {
            if (dataObj[value + 1].split("-")[3] != key.split("-")[3]) {
                element = addInputType(null, "Mulitple Choice");
                //add each input choice
            }
        }
        else {
            selected = nameConvert(selected);
            element = addInputType(null, selected);
        }

        //console.log(key, value);
        //element = addInputType(null, selected);
        //console.log(element);     
    });

    dataObj.forEach((key, value) => {
        let selection = key.split("-")[1] + "-" + key.split("-")[2];
        console.log("Selection: " + selection + "\nKey: " + key + "\ndata[key]:" + data[key]);
        if (key.split("-")[2] == "day") {
            selection = key.split("-")[1] + "-" + key.split("-")[2] + "-" + key.split("-")[3];
        }
        try {
            var item = document.getElementsByName(selection)[0];
            if (selection == "apoint-select") {
                item.getElementsByTagName('option')[getOptionIndex(item, data[key])].selected = true;
                apointSelected();
            }
            else if (selection == "multipleChoice-item") {
                addMultipleChoice(null, selection + "-" + key.split("-")[3], data[key]);
            }
            else if(selection == "apoint-recipent"){
                item.getElementsByTagName('option')[getOptionIndex(item, data[key])].selected = true;
                let parent = document.getElementById("recipent").parentElement;
                recipentSelected(null, data[key], parent);
            }
            else if(selection == "apoint-recipientList"){
                item.getElementsByTagName('option')[getOptionIndex(item, data[key])].selected = true;
            }
            else if(selection.split("-")[1] == "day"){
                // console.log(key.split("-")[3]);
                // console.log(item.querySelector('[id$="'+key.split("-")[3]+'"]'));
                document.querySelector('[id$="'+key.split("-")[3]+'"]').checked = true;

            } 
            else if(selection.split("-")[1] == "time" && key.split("-")[3] == undefined){
                document.querySelector('[id$="time"]').value = data[key];
            }   
            else {
                item.value = data[key];
            }
        }
        catch (err) {
            console.log(err);
        }
    });
}

function getOptionIndex(item, option) {
    for (var i = 0; i < item.length; i++) {
        if (item[i].value == option) {
            return i;
        }
    }
    return 0;
}

function nameConvert(oldName) {
    switch (oldName) {
        case "apoint":
            return "Apointment";
        case "multipleChoice":
            return "Multiple Choice";
        case "department":
            return "To Department";
        case "userComment":
            return "User Comment";
        default:
            return oldName.charAt(0).toUpperCase() + oldName.slice(1);
    }
}

