function filter(){
    var filter = document.getElementById("filter");
    toggleFilterIcon();
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[1];
            y = rows[i + 1].getElementsByTagName("TD")[1];
            if (filter.classList.contains("up")) {
                if (Number(x.innerHTML) > Number(y.innerHTML)) {
                    shouldSwitch = true;
                    break;
                }
            } else {
                if (Number(x.innerHTML) < Number(y.innerHTML)) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}

function search(id, col) {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(id);
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[col];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function DoSomething(dep_name) {
    console.log(dep_name);
}

function toggleFilterIcon(){
    var filter = document.getElementById("filter");
    if(filter.classList.contains("up")){
        filter.classList.remove("up");
        filter.classList.add("down");
        return "desc";
    }else{
        filter.classList.remove("down");
        filter.classList.add("up"); 
        return "asc";
    }
}

function sortDob($col) {
    //COMMENTED CODE FOR VISULIZATION OF SORTING FREQUENCY
    var state = toggleFilterIcon();
    var table, rows, switching, i, x, y, shouldSwitch;
    //var counter = 0;
    table = document.getElementById("myTable");
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            //counter += 1;
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[$col].innerHTML;
            y = rows[i + 1].getElementsByTagName("TD")[$col].innerHTML;
            x = x.split("-");
            y = y.split("-"); 
            x = new Date(x[2], x[1], x[0]);
            y = new Date(y[2], y[1], y[0]);
            if (state == "asc") {
                if (x < y) {
                    shouldSwitch = true;
                    break;
                }
            } else {
                if (x > y) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // var string = "";
            // for (i = 0; i < counter; i++) {
            //     string += "-";
            // }
            // console.log(string);
            // counter = 0;
        }
    }
    console.log("done");
}

