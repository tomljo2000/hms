var inputId = 0;

function inputArray() {
    var inputs = [
        "Apointment",
        "Patient Select",
        "Title",
        "Description",
        "Mulitple Choice",
        "File",
        "Perscription",
        "Treatments",
        "Investigations",
        "Diagnosis",
        "To Department",
        "User Comment"
    ];

    var select = document.getElementById("input_type");
    inputs.forEach(element => {
        option = document.createElement("option");
        option.setAttribute("value", element);
        option.innerHTML = element;

        select.appendChild(option);
    });
}

function render(e) {
    e.preventDefault(); 
    addInputType();
}

function addTitle(title) {
    var element = document.createElement("h3");
    element.setAttribute("class", "create-task-title");
    element.innerHTML = title;
    return element;
}

function addInputType(inputRender) {
    var item, element, input, title, element1;
    if(inputRender == null){
        var input = document.getElementById("input_type");
    }
    else{
        var input = inputRender;
    }
    var selected = input.options[input.selectedIndex].text;
    switch (selected) {
        case "Description":
            input = renderInput("description");
            item = renderItem();
            title = addTitle("Description");

            element = document.createElement("textarea");
            element.setAttribute("id", "comment-description");
            element.setAttribute("class", "form-textarea");
            element.setAttribute("placeholder", "Please input description for comment section here");
            element.setAttribute("cols", "90");
            element.setAttribute("name", "description-" + inputId);

            input.appendChild(title);
            input.appendChild(item);
            item.appendChild(element);
            break;
        case "Apointment":
            input = apointmentCreator();
            break;
        case "Title":
            input = renderInput("title");
            item = renderItem();
            title = addTitle("Title");

            element = document.createElement("input");
            element.setAttribute("type", "text");
            element.setAttribute("class", "form-label");
            element.setAttribute("placeholder", "Please input title");
            element.setAttribute("name", "title-" + inputId);

            input.appendChild(title);
            input.appendChild(item);
            item.appendChild(element);
            break;
        case "User Comment":
            title = addTitle("User Comment");
            input = renderInput("userComment");
            item = renderItem();

            element = document.createElement("textarea");
            element.setAttribute("id", "comment-input");
            element.setAttribute("class", "input-textarea");
            element.setAttribute("placeholder", "User input");
            element.setAttribute("disabled", "true");
            element.setAttribute("name", "userComment-" + inputId);
            element.setAttribute("cols", "90");

            input.appendChild(title);
            input.appendChild(item);
            item.appendChild(element);
            break;
        case "Perscription":
            input = addLabelInput("Perscription");
            break;
        case "Treatments":
            input = addLabelInput("Treatments");
            break;
        case "Investigations":
            input = addLabelInput("Investigations");
            break;
        case "Diagnosis":
            input = addLabelInput("Diagnosis");
            break;
        case "To Department":
            input = addLabelInput("Department");
            break;
        case "Patient Select":
            input = addLabelInput("Patient");
            break;
        case "Mulitple Choice":
            input = renderInput("multipleChoice");
            item = renderItem();
            title = addTitle("Multiple Choice");

            element1 = document.createElement("button");
            element1.setAttribute("class", "create-task-add");
            element1.setAttribute("onclick", "addMultipleChoice(event)");
            element1.innerHTML = "+";

            item.appendChild(element1);

            br = document.createElement("br");
            item.appendChild(br);

            input.appendChild(title);
            input.appendChild(item);

            break;
        case "File":
            input = renderInput("File");
            item = renderItem();

            element = document.createElement("div");
            element.setAttribute("class", "file-upload");

            element1 = document.createElement("span");
            element1.textContent = "Upload File";
            element.appendChild(element1);

            br = document.createElement("br");
            element.appendChild(br);

            element1 = document.createElement("input");
            element1.setAttribute("type", "text");
            element1.setAttribute("class", "file-name");
            element1.setAttribute("placeholder", "File Name");
            element1.setAttribute("name", "file-" + inputId);

            element.appendChild(element1);

            item.appendChild(element);
            input.appendChild(item);        
        break;
    }

    if (input == "noMoreApointment"){
        alert("You can only have one apointment per form");
    }
    else{
        var inputs = document.getElementsByClassName("create-task-input");
        console.log("Adding buttons: " + inputs.length);
        renderButtons(inputs.length-1, input);
        window.scrollTo(0, document.body.scrollHeight);
        inputId += 1;
    }

    
    
}

function addMultipleChoice(e) {
    inputId += 1;
    e.preventDefault();
    var item = e.target.parentNode;


    let br = document.createElement("br");
    item.appendChild(br);

    var element = document.createElement("input");
    element.setAttribute("type", "text");
    element.setAttribute("class", "form-label");
    element.setAttribute("placeholder", "Please input multiple choice");
    element.setAttribute("onchange", "remove(event)");
    element.setAttribute("name", item.parentNode.id + "-" + inputId);

    item.appendChild(element);
}

function remove(e) {
    e.preventDefault();
    if (e.target.value == "") {
        var element = e.target;
        element.remove();
        elemet = e.target.previousSibling;
        element.remove();
    }

}

function renderButtons(id, input) {

    var buttons = document.createElement("div");
    buttons.setAttribute("class", "create-task-buttons");
    input.appendChild(buttons);

    let element = document.createElement("button");
    element.setAttribute("class", "create-task-up");
    let string = "edit('up', '" + "item-" + id + "'" + ", event)";
    element.setAttribute("onclick", string);

    let element1 = document.createElement("button");
    element1.setAttribute("class", "create-task-down");
    string = "edit('down', '" + "item-" + id + "'" + ", event)";
    element1.setAttribute("onclick", string);

    let element2 = document.createElement("button");
    element2.setAttribute("class", "create-task-delete");
    string = "edit('delete', '" + "item-" + id + "'" + ", event)";
    element2.setAttribute("onclick", string);
    element2.innerHTML = "x";

    buttons.appendChild(element);
    buttons.appendChild(element1);
    buttons.appendChild(element2);
}

function addLabelInput(name) {
    let input = renderInput(name.toLowerCase());

    let title = addTitle(name);
    input.appendChild(title);

    div = document.createElement("div");
    div.setAttribute("class", "create-task-item");
    input.appendChild(div);

    element = document.createElement("label");
    element.innerText = name + ":";

    element1 = document.createElement("br");

    element2 = document.createElement("input");
    element2.setAttribute("type", "text");
    element2.setAttribute("disabled", "true");
    element2.setAttribute("placeholder", "Please search for " + name);
    element2.setAttribute("name", name.toLowerCase() + "-" + inputId);

    div.appendChild(element);
    div.appendChild(element1);
    div.appendChild(element2);
    return input;
}

function apointmentCreator() {
    let find = document.querySelectorAll('[id^="apointment"]');

    if (find.length > 0) {
        return "noMoreApointment";
    }

    let input = renderInput("apointment");
    let element = addTitle("Apointment");
    input.appendChild(element);
    element = renderItem();

    let label = document.createElement("label");
    label.setAttribute("for", "apointSelect");
    label.innerHTML = "Apointment Type:";
    element.appendChild(label);

    let br = document.createElement("br");
    element.appendChild(br);


    let element1 = document.createElement("select");
    element1.setAttribute("id", "apointSelect");
    element1.setAttribute("name", "apoint-select");
    element1.setAttribute("onchange", "apointSelected()");

    let element2 = document.createElement("option");
    element2.setAttribute("value", "Request Apointment");
    element2.innerHTML = "Request Apointment";
    element1.appendChild(element2);

    element2 = document.createElement("option");
    element2.setAttribute("value", "Sedual Apointment");
    element2.innerHTML = "Sedual Apointment";
    element1.appendChild(element2);

    element.appendChild(element1);

    element1 = document.createElement("br");
    element.appendChild(element1);

    element1 = document.createElement("label");
    element1.setAttribute("for", "recipent");
    element1.innerHTML = "Recipent:";

    element.appendChild(element1);

    element2 = document.createElement("Select");
    element2.setAttribute("id", "recipent");
    element2.setAttribute("onchange", "recipentSelected(event)");
    element2.setAttribute("name", "apoint-recipent");


    let option = document.createElement("option");
    option.setAttribute("disabled", "true");
    option.setAttribute("selected", "true");
    option.setAttribute("value", "Please Select");
    option.innerHTML = "Please Select";

    element2.appendChild(option);


    option = document.createElement("option");
    option.setAttribute("value", "Department");
    option.innerHTML = "Department";

    element2.appendChild(option);

    option = document.createElement("option");
    option.setAttribute("value", "Clinician");
    option.innerHTML = "Clinician";

    element2.appendChild(option);

    option = document.createElement("option");
    option.setAttribute("value", "Admin");
    option.innerHTML = "Admin";

    element2.appendChild(option);

    element.appendChild(element2);

    element.appendChild(br);

    input.appendChild(element);
    return input;
}

function recipentSelected(e) {
    e.preventDefault();
    let recipient = e.target.value;
    let parent = e.target.parentNode;
    console.log(parent);

    let remove = document.querySelectorAll("[id^='recipientList']");
    console.log(remove);
    if (remove != null) {
        remove.forEach(element => {
            element.remove();
        });
    }

    let br = document.createElement("br");
    br.setAttribute("id", "recipientList");

    let element = document.createElement("label");
    element.setAttribute("id", "recipientListLabel");
    element.setAttribute("for", "recipentList");
    element.innerHTML = recipient + " Search:";
    parent.appendChild(element);

    parent.appendChild(br);

    element = document.createElement("input");
    element.setAttribute("id", "recipientListInput");
    element.setAttribute("list", "recipientListSelect");
    element.setAttribute("name", "apoint-recipentList");
    element.setAttribute("placeholder", "Please select a " + recipient);

    parent.appendChild(element);

    element = document.createElement("datalist");
    element.setAttribute("id", "recipientListSelect");


    if (recipient == "Department") {

        for (let i = 0; i < 10; i++) {
            let option = document.createElement("option");
            option.setAttribute("value", "Department " + i);
            option.innerHTML = "Department " + i;
            element.appendChild(option);
        }

    }
    else if (recipient == "Clinician") {

        for (let i = 0; i < 10; i++) {
            let option = document.createElement("option");
            option.setAttribute("value", "Clinician" + i);
            option.innerHTML = "Clinician " + i;
            element.appendChild(option);
        }
    }
    else if (recipient == "Admin") {

        for (let i = 0; i < 10; i++) {
            let option = document.createElement("option");
            option.setAttribute("value", "Admin" + i);
            option.innerHTML = "Admin " + i;
            element.appendChild(option);
        }
    }

    parent.appendChild(element);

}


function apointSelected() {


    let select = document.getElementById("apointSelect");

    if (select.value == "Request Apointment") {
        let item = document.getElementById("sedaul");
        if (item != null) {
            item.remove();
        }
    }
    else {

        let item = renderItem();
        item.setAttribute("id", "sedaul");

        let label = document.createElement("label");
        label.setAttribute("for", "days");
        label.innerHTML = "Please select avalible days. <br> Hold down the Ctrl (windows) or Command (Mac) <br> button to select multiple options.:";
        item.appendChild(label);

        let br = document.createElement("br");
        item.appendChild(br);

        let element = document.createElement("div");
        element.setAttribute("id", "weekdays");
        
        let weekdays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

        for (let i = 0; i < weekdays.length; i++) {
            let input = document.createElement("input");
            input.setAttribute("type", "checkbox");
            input.setAttribute("id", "weeksdays" +"-"+ weekdays[i]);
            input.setAttribute("name", "apoint-day-"+weekdays[i]);
            label = document.createElement("label");
            label.setAttribute("for", "weeksdays"  +"-"+ weekdays[i]);
            label.innerHTML = weekdays[i];
            element.appendChild(label);
            element.appendChild(input);
            let br = document.createElement("br");
            element.appendChild(br);
        }

        item.appendChild(element);

        element = document.createElement("br");
        item.appendChild(element);

        label = document.createElement("label");
        label.setAttribute("for", "time");
        label.innerHTML = "Please select duration of appointment:  ";
        item.appendChild(label);

        br = document.createElement("br");
        item.appendChild(br);

        element = document.createElement("select");
        element.setAttribute("id", "time");
        element.setAttribute("name", "apoint-time");

        for (let i = 5; i <= 120; i += 5) {
            option = document.createElement("option");
            option.setAttribute("value", i);
            option.innerHTML = i;
            element.appendChild(option);
        }

        item.appendChild(element);

        element = document.createElement("br");
        item.appendChild(element);

        element = document.createElement("label:");
        element.setAttribute("for", "time");
        element.innerHTML = "Please select time of availability <br> (leave blank for 24hr or input a time for multiple available times): ";

        item.appendChild(element);

        let time = addTimeInput(1);

        item.appendChild(time);

        let parent = select.parentElement.parentElement;

        parent.insertBefore(item, parent.children[2]);


    }

}

function timeUpdate(id, e) {
    e.preventDefault();
    let times = document.querySelectorAll('[id^="time-"]');

    console.log(times);

    for (let i = 0; i < times.length; i++) {
        console.log("time " + i + ": " + times[i].value);
        if (times[i].value == "" || times[i + 1].value == "") {
            return;
        }
        else {
            let start = times[i].value.split(":");
            let end = times[i + 1].value.split(":");
            console.log("start: " + start);
            console.log("end: " + end);
            if (start[0] > end[0]) {
                alert("Start time must be before end time");
                return;
            }
            else if (start[0] == end[0] && start[1] > end[1]) {
                alert("Start time must be before end time");
                return;
            }
            i++;
        }
    }
    console.log("adding new time input: ")
    let time = addTimeInput(Number(id)+1);
    let parent = document.getElementById("sedaul");
    parent.appendChild(time);
    return;
}

function addTimeInput(num) {

    let div = document.createElement("div");
    div.setAttribute("id", num);

    let element = document.createElement("label");
    element.setAttribute("for", "startTime");
    element.innerHTML = "Start Time: ";

    div.appendChild(element);

    element = document.createElement("input");
    element.setAttribute("type", "time");
    element.setAttribute("id", "time-start-" + num);
    element.setAttribute("name", "apoint-time-start-" + num);  
    element.setAttribute("onchange", "timeUpdate('" + num + "', event);");

    div.appendChild(element);

    element = document.createElement("label");
    element.setAttribute("for", "time-start-" + num);
    element.innerHTML = "End Time: ";

    div.appendChild(element);

    element = document.createElement("input");
    element.setAttribute("type", "time");
    element.setAttribute("id", "time-end-" + num);
    element.setAttribute("name", "apoint-time-end-" + num);
    element.setAttribute("onchange", "timeUpdate('" + num + "', event);");

    div.appendChild(element);

    if (num > 1) {
        element = document.createElement("button");
        element.setAttribute("onclick", "removeTimeInput('" + num + "', event);");
        element.innerHTML = "X";

        div.appendChild(element);
    }

    return div;
}

function removeTimeInput(id, e) {
    e.preventDefault();
    let div = document.getElementById(id);
    div.remove();
}


function renderInput(name) {
    var form = document.getElementById("formRender");
    var inputs = document.getElementsByClassName("create-task-input");
    let input = document.createElement("div");
    input.setAttribute("id", name + "-item-" + inputs.length);
    input.setAttribute("class", "create-task-input");
    form.appendChild(input);
    return input;
}

function renderItem() {
    var item = document.createElement("div");
    item.setAttribute("class", "create-task-item");
    return item;
}

function preview() {
    let preview = document.getElementById("preview");
    console.log(preview);
    if (preview.style.display == 'none') {
        preview.style.display = 'block';
    }
    else {
        preview.style.display = 'none';
    }
}

function edit(action, item, e) {
    e.preventDefault();
    console.log("Action: " + action + " Item: " + item);
    let numId = item.split("-")[1];

    if (action == "delete") {
        let inputs = document.querySelectorAll('[id$="' + numId + '"]');
        inputs[0].remove();

        inputs = document.querySelectorAll('[id*=item]');
        console.log(inputs);
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].id.split("-")[2] > numId) {
                var buttons = document.querySelectorAll('[onclick*="' + inputs[i].id.split("-")[2] + '"]');
                buttons[0].setAttribute("onclick", "edit('up', 'item-" + (inputs[i].id.split("-")[2] - 1) + "', event);");
                buttons[1].setAttribute("onclick", "edit('down', 'item-" + (inputs[i].id.split("-")[2] - 1) + "', event);");
                buttons[2].setAttribute("onclick", "edit('delete', 'item-" + (inputs[i].id.split("-")[2] - 1) + "', event);");
                inputs[i].id = inputs[i].id.split("-")[0] + "-" + inputs[i].id.split("-")[1] + "-" + (inputs[i].id.split("-")[2] - 1);
            }
        }
        inputs = document.querySelectorAll('[id*=item]');
        console.log(inputs);
    }
    else {

        //https://stackoverflow.com/questions/25850389/how-i-can-change-child-elements-order-in-js

        var item = document.querySelector('[id$="' + numId + '"]');
        var formRender = item.parentNode;
        var buttons = document.querySelectorAll('[onclick*="' + numId + '"]');

        numId = parseInt(numId);

        if (action === "up" && item.previousElementSibling) {
            formRender.insertBefore(item, item.previousElementSibling);

            var item1 = document.querySelector('[id$="' + (numId - 1) + '"]');
            item1.id = item1.id.split("-")[0] + "-" + item1.id.split("-")[1] + "-" + (numId);
            item.id = item.id.split("-")[0] + "-" + item.id.split("-")[1] + "-" + (numId - 1);

            var buttons1 = document.querySelectorAll('[onclick*="' + (numId - 1) + '"]');

            buttons1[0].setAttribute("onclick", "edit('up', 'item-" + (numId) + "', event);");
            buttons1[1].setAttribute("onclick", "edit('down', 'item-" + (numId) + "', event);");
            buttons1[2].setAttribute("onclick", "edit('delete', 'item-" + (numId) + "', event);");

            buttons[0].setAttribute("onclick", "edit('up', 'item-" + (numId - 1) + "', event);");
            buttons[1].setAttribute("onclick", "edit('down', 'item-" + (numId - 1) + "', event);");
            buttons[2].setAttribute("onclick", "edit('delete', 'item-" + (numId - 1) + "', event);");

        } else if (action === "down" && item.nextElementSibling) {
            formRender.insertBefore(item, item.nextElementSibling.nextElementSibling)

            var item1 = document.querySelector('[id$="' + (numId + 1) + '"]');
            item1.id = item1.id.split("-")[0] + "-" + item1.id.split("-")[1] + "-" + (numId);
            item.id = item.id.split("-")[0] + "-" + item.id.split("-")[1] + "-" + (numId + 1);

            var buttons1 = document.querySelectorAll('[onclick*="' + (numId + 1) + '"]');

            buttons1[0].setAttribute("onclick", "edit('up', 'item-" + (numId) + "', event);");
            buttons1[1].setAttribute("onclick", "edit('down', 'item-" + (numId) + "', event);");
            buttons1[2].setAttribute("onclick", "edit('delete', 'item-" + (numId) + "', event);");

            buttons[0].setAttribute("onclick", "edit('up', 'item-" + (numId + 1) + "', event);");
            buttons[1].setAttribute("onclick", "edit('down', 'item-" + (numId + 1) + "', event);");
            buttons[2].setAttribute("onclick", "edit('delete', 'item-" + (numId + 1) + "', event);");

        }
    }
}

function display() {
    var items = document.querySelectorAll('[disabled]');
    for (let i = 0; i < items.length; i++) {
        items[i].removeAttribute("disabled");
    }
}

function x(e) {
    e.preventDefault();
    preview()
    display()
}

function enableInputs(){
    var inputs = document.querySelectorAll('[disabled]');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].removeAttribute("disabled");
    }   
}