const body = document.getElementsByTagName('body')[0]

//Left sidebar toggle
function collapseSidebar() {
    body.classList.toggle('leftsidebar-expand')
}

//Topnavbar dropdown function
window.onclick = function(event) {
    openCloseDropdown(event)
}

function closeAllDropdown() {
    var dropdowns = document.getElementsByClassName('mydropdown-expand')
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].classList.remove('mydropdown-expand')
    }
}

function openCloseDropdown(event) {
    if (!event.target.matches('.mydropdown-toggle')) {
        closeAllDropdown()
    } else {
        var toggle = event.target.dataset.toggle
        var content = document.getElementById(toggle)
        if (content.classList.contains('mydropdown-expand')) {
            closeAllDropdown()
        } else {
            closeAllDropdown()
            content.classList.add('mydropdown-expand')
        }
    }
}

/*
//MTD Dashboard chart 01
var mtd01 = document.getElementById('myChart')
mtd01.height = 200
mtd01.width = 300
var data = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    datasets: [{
        fill: false,
        label: 'Completed',
        borderColor: colorThree,
        data: [120, 115, 140, 130, 100, 123, 88, 99, 66, 120, 52, 59],
        borderWidth: 2,
        lineTension: 0,
    }, {
        fill: false,
        label: 'Issues',
        borderColor: colorFour,
        data: [66, 44, 90, 12, 48, 99, 56, 78, 23, 100, 22, 47],
        borderWidth: 2,
        lineTension: 0,
    }]
}

var lineChart = new Chart(mtd01, {
    type: 'line',
    data: data,
    options: {
        maintainAspectRatio: false,
        bezierCurve: false,
    }
})

//MTD Dashboard chart 02
var mtd02 = document.getElementById('myChart2')
mtd02.height = 200
mtd02.width = 200
var data = {
    labels: ['January', 'February', 'April', 'May', 'June', 'July'],
    datasets: [{
        fill: true,
        label: 'Completed',
        backgroundColor: colorThree,
        data: [120, 115, 130, 100, 123, 88],
        borderWidth: 2,
        lineTension: 0,
    }, {
        fill: true,
        label: 'Issues',
        backgroundColor: colorFour,
        data: [66, 44, 12, 54, 32, 48],
        borderWidth: 2,
        lineTension: 0,
    }]
}

var lineChart = new Chart(mtd02, {
    type: 'bar',
    data: data,
    options: {
        maintainAspectRatio: false,
        bezierCurve: false,
    }
})
*/