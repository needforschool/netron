let protocols = [];
let dates = [];

const init = () => {
    initLogoutBtn();
    initForm('.form-profile');

    $.ajax({
        type: 'GET',
        url: './../api/logs/index.php',
        success: (response) => {
            console.log(response);
            if (!response.success) return;

            let chartDatasets = [];
            let chartLabels = ['10/09/2020', '07/08/2020', '14/07/2020'];
            response.trames.forEach(trame => {
                trame.date = new Date(trame.date * 1000);

                if (!protocols.filter(item => (item.protocol === trame.protocol.name)).length > 0) protocols.push({ protocol: trame.protocol.name, color: `${randomInt(0, 255) + "," + randomInt(0, 255) + "," + randomInt(0, 255)}` });

                initTable(trame);
            });

            dates.forEach(item => {

            })
            protocols.forEach(item => {
                chartDatasets.push({
                    label: item.protocol,
                    data: [randomInt(0, 20), randomInt(0, 20), randomInt(0, 20)],
                    borderWidth: 1,
                    backgroundColor: 'rgba(' + item.color + ', 0.2)',
                    borderColor: 'rgba(' + item.color + ', 1)'
                });
                console.log(item.color);
            });

            initChart(chartDatasets, sortStringDate(chartLabels));
        }
    });

}

const sortStringDate = (array) => {
    return array.sort((a, b) => {
        a = a.split('/').reverse().join('');
        b = b.split('/').reverse().join('');
        return a > b ? 1 : a < b ? -1 : 0;
    });
}

const formatIntDouble = (int) => {
    return (int < 10 && int >= 0) ? "0" + int : int;
}

const hexToIpv4 = (ip) => {
    ip.replace(/\r\n/g, '\n');
    var lines = ip.split('\n');

    var output = '';
    for (var i = 0; i < lines.length; i++) {
        var line = lines[i];
        var line = line.replace(/0x/gi, '');

        var match = /([0-f]+)/i.exec(line);
        if (match) {
            var matchText = parseInt(match[1], 16);
            var converted = ((matchText >> 24) & 0xff) + '.' +
                ((matchText >> 16) & 0xff) + '.' +
                ((matchText >> 8) & 0xff) + '.' +
                (matchText & 0xff);
            output += converted;
        }
        else {
            output += line;
        }
        output += '\n';
    }
    return output;
}

const randomInt = (min, max) => {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

const initTable = (trame) => {
    const currentProtocol = protocols.filter(item => (item.protocol === trame.protocol.name));
    $('#table-logs tbody').append(`
        <tr style="background-color: rgba(${currentProtocol[0].color},.25);">
            <td>${trame.id}</td>
            <td>${trame.user.mail}</td>
            <td>${formatIntDouble(trame.date.getDate()) + '/' + formatIntDouble(trame.date.getMonth()) + '/' + trame.date.getFullYear() % 100 + ' ' + formatIntDouble(trame.date.getHours()) + ':' + formatIntDouble(trame.date.getMinutes()) + ':' + formatIntDouble(trame.date.getSeconds())}</td>
            <td>${trame.version}</td>
            <td>${trame.headerLength}</td>
            <td>${trame.headerChecksum}</td>
            <td>${trame.service}</td>
            <td>${trame.identification}</td>
            <td>${trame.flags.code}</td>
            <td>${trame.ttl}</td>
            <td>${trame.protocol.name}</td>
            <td>${trame.protocol.checksum.code}</td>
            <td>${trame.protocol.checksum.status}</td>
            <td>${trame.protocol.ports.from}</td>
            <td>${trame.protocol.ports.dest}</td>
            <td>${hexToIpv4(trame.ip.from)}</td>
            <td>${hexToIpv4(trame.ip.dest)}</td>
        </tr>
    `);
}

const firstnameInputHandler = (val) => {
    $('[role="firstname"]').text(val);
}

const lastnameInputHandler = (val) => {
    $('[role="lastname"]').text(val);
}

const initForm = (formClass, successHandler = () => { }) => {
    const form = $(formClass);
    form.on('submit', (e) => {
        e.preventDefault();
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'json',
            success: (response) => {
                successHandler(response);
                if (response.success) {
                    if (!$('.btn[type="submit"]').hasClass('btn-success')) {
                        $('.btn[type="submit"]').toggleClass('btn-success');
                        setTimeout(() => {
                            $('.btn[type="submit"]').toggleClass('btn-success');
                        }, 2000)
                    }
                } else {
                    if (!$('.btn[type="submit"]').hasClass('btn-error')) {
                        $('.btn[type="submit"]').toggleClass('btn-error');
                        setTimeout(() => {
                            $('.btn[type="submit"]').toggleClass('btn-error');
                        }, 2000)
                    }
                }
            },
            error: () => {
                if (!$('.btn[type="submit"]').hasClass('btn-error')) {
                    $('.btn[type="submit"]').toggleClass('btn-error');
                    setTimeout(() => {
                        $('.btn[type="submit"]').toggleClass('btn-error');
                    }, 2000)
                }
            }
        })
    });
}

const initChart = (datasets, labels) => {
    var ctx = document.getElementById('charts');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}

const initLogoutBtn = () => {
    $('[role="btn-logout"]').click((e) => {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: './../api/users/logout.php',
            success: (response) => {
                console.log(response);
                if (response.success) window.location.href = './../';
            }
        });
    })
}

init();