let chartAmountPerRequests;
let chartTTLPerRequests;
let chartTimeoutPerRequests;

$(document).ready(function () {
    init();
});

const init = () => {
    const logsOrder = $('#logs-order');
    logsOrder.change(() => {
        $('#table-logs tbody').html('');
        initTableHeader();
        initRequest(logsOrder);
    });

    initLogoutBtn();
    initSwitchChartBtn();
    initForm('.form-profile');
    initTableHeader();
    initRequest(logsOrder);
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

const hexToInt = (hex) => { return parseInt(hex, 16); };

const randomInt = (min, max) => {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

const initRequest = (logsOrder) => {
    $.ajax({
        type: 'GET',
        url: './../api/logs/index.php',
        success: (response) => {
            if (!response.success) return;

            switch (logsOrder.val()) {
                case 'ttl-increase':
                    response.trames = response.trames.sort((a, b) => a.ttl - b.ttl)
                    break;
                case 'ttl-decrease':
                    response.trames = response.trames.sort((a, b) => b.ttl - a.ttl)
                    break;
                case 'id-increase':
                    response.trames = response.trames.sort((a, b) => a.id - b.id)
                    break;
                case 'id-decrease':
                    response.trames = response.trames.sort((a, b) => b.id - a.id)
                    break;
                case 'date-decrease':
                    response.trames = response.trames.sort((a, b) => a.date - b.date)
                    break;
                default:
                    response.trames = response.trames.sort((a, b) => b.date - a.date)
                    break;
            }

            let protocols = [];

            response.trames.forEach(trame => {
                trame.date = new Date(trame.date * 1000);

                if (!protocols.filter(item => (item.protocolName === trame.protocol.name)).length > 0) protocols.push({
                    protocolName: trame.protocol.name,
                    amount: 0,
                    color: `${randomInt(0, 210) + "," + randomInt(0, 210) + "," + '210'}`,
                    ttl: 0,
                    timeout: 0
                });

                protocols.forEach(obj => {
                    if (trame.protocol.name == obj.protocolName) {
                        obj.amount++;
                        obj.ttl += trame.ttl;
                        obj.timeout += (trame.status == 'timeout') ? 1 : 0;
                    };
                })

                initTableRow(trame, protocols);
            });

            // chartAmountPerRequests
            let chartAmountPerRequestsLabels = [];
            let chartAmountPerRequestsDatasets = []
            let chartAmountPerRequestsData = [];

            protocols.forEach(obj => {
                chartAmountPerRequestsLabels.push(obj.protocolName);
                chartAmountPerRequestsData.push(obj.amount);
                chartAmountPerRequestsDatasets.push({
                    label: obj.protocolName,
                    data: [obj.amount],
                    borderWidth: 1,
                    backgroundColor: ['rgba(' + obj.color + ', .25)'],
                    borderColor: ['rgba(' + obj.color + ', .75)']
                });
            });

            if (chartAmountPerRequests != null) chartAmountPerRequests.destroy();
            chartAmountPerRequests = new Chart($('#chartAmountPerRequests'), {
                type: 'bar',
                data: {
                    labels: ['trames'],
                    datasets: chartAmountPerRequestsDatasets
                },
                options: {
                    legend: {
                        display: false
                    },
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Nombre de trames par type de requête'
                    },
                    tooltips: {
                        callbacks: {
                            label: (tooltipItem) => {
                                return tooltipItem.yLabel;
                            }
                        }
                    }
                }
            });

            // chartTTLPerRequests
            let chartTTLPerRequestsLabels = [];
            let chartTTLPerRequestsData = [];
            let chartTTLPerRequestsBackgroundColor = [];
            let chartTTLPerRequestsBorderColor = [];

            protocols.forEach(obj => {
                chartTTLPerRequestsLabels.push(obj.protocolName);
                chartTTLPerRequestsData.push(obj.ttl);
                chartTTLPerRequestsBackgroundColor.push('rgba(' + obj.color + ', .25)');
                chartTTLPerRequestsBorderColor.push('rgba(' + obj.color + ', .75)');
            });

            if (chartTTLPerRequests != null) chartTTLPerRequests.destroy();
            chartTTLPerRequests = new Chart($('#chartTTLPerRequests'), {
                type: 'pie',
                data: {
                    labels: chartTTLPerRequestsLabels,
                    datasets: [{
                        data: chartTTLPerRequestsData,
                        borderWidth: 1,
                        backgroundColor: chartTTLPerRequestsBackgroundColor,
                        borderColor: chartTTLPerRequestsBorderColor
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Nombre de TTL par type de requête'
                    }
                }
            });

            // chartTTLPerRequests
            let chartTimeoutPerRequestsLabels = [];
            let chartTimeoutPerRequestsData = [];
            let chartTimeoutPerRequestsBackgroundColor = [];
            let chartTimeoutPerRequestsBorderColor = [];

            protocols.forEach(obj => {
                chartTimeoutPerRequestsLabels.push(obj.protocolName);
                chartTimeoutPerRequestsData.push(obj.timeout);
                chartTimeoutPerRequestsBackgroundColor.push('rgba(' + obj.color + ', .25)');
                chartTimeoutPerRequestsBorderColor.push('rgba(' + obj.color + ', .75)');
            });

            if (chartTimeoutPerRequests != null) chartTimeoutPerRequests.destroy();
            chartTimeoutPerRequests = new Chart($('#chartTimeoutPerRequests'), {
                type: 'pie',
                data: {
                    labels: chartTimeoutPerRequestsLabels,
                    datasets: [{
                        data: chartTimeoutPerRequestsData,
                        borderWidth: 1,
                        backgroundColor: chartTimeoutPerRequestsBackgroundColor,
                        borderColor: chartTimeoutPerRequestsBorderColor
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Nombre de Timeout par type de requête'
                    }
                }
            });

        }
    });
}

const initTableHeader = () => {
    $('#table-logs tbody').html(`
        <tr>
            <th>#</th>
            <th>user mail</th>
            <th>date</th>
            <th>version</th>
            <th colspan="2">header</th>
            <th>service</th>
            <th>identification</th>
            <th>flags code</th>
            <th>ttl</th>
            <th colspan="5">protocol</th>
            <th colspan="2">ip</th>
        </tr>
        <tr>
            <th colspan="4"></th>
            <th>length</th>
            <th>checksum</th>
            <th colspan="4"></th>
            <th>name</th>
            <th colspan="2">checksum</th>
            <th colspan="2">ports</th>
            <th>from</th>
            <th>dest</th>
        </tr>
        <tr>
            <th colspan="11"></th>
            <th>code</th>
            <th>status</th>
            <th>from</th>
            <th>dest</th>
            <th colspan="2"></th>
        </tr>
    `)
}

const initTableRow = (trame, protocols) => {
    const currentProtocol = protocols.filter(item => (item.protocolName === trame.protocol.name));
    $('#table-logs tbody').append(`
        <tr style="background-color: rgba(${(trame.status == 'timeout') ? '255, 71, 87, 1' : currentProtocol[0].color + ',.25'});">
            <td>${trame.id}</td>
            <td>${trame.user.mail}</td>
            <td>${formatIntDouble(trame.date.getDate()) + '/' + formatIntDouble(trame.date.getMonth()) + '/' + trame.date.getFullYear() % 100 + ' ' + formatIntDouble(trame.date.getHours()) + ':' + formatIntDouble(trame.date.getMinutes()) + ':' + formatIntDouble(trame.date.getSeconds())}</td>
            <td>${trame.version}</td>
            <td>${trame.headerLength}</td>
            <td>${trame.headerChecksum}</td>
            <td>${hexToInt(trame.service)}</td>
            <td>${hexToInt(trame.identification)}</td>
            <td>${hexToInt(trame.flags.code)}</td>
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
                initError(response.errors);
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

const initError = (errors) => {
    const errorContainer = $('.errors-wrapper .errors-container');
    $.each(errors, (key, value) => {
        errorContainer.append(`
        <div class="error-item">
            <h6>Une erreur est survenue</h6>
            <p><span>${key}</span>: ${value}</p>
            <div class="btn btn-white" onclick="this.parentNode.remove()">Fermer</div>
        </div>
      `)
    });
}

const initChart = (title, selector, type, labels, datasets) => {
    var chart = new Chart($(selector), {
        type: type,
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
            },
            title: {
                display: true,
                text: title
            },
            responsive: true
        }
    });
    return chart;
}

const initLogoutBtn = () => {
    $('[role="btn-logout"]').click((e) => {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: './../api/users/logout.php',
            success: (response) => {
                if (response.success) window.location.href = './../';
            }
        });
    })
}

const initSwitchChartBtn = () => {
    const btn = $('[role="switch-chart"]');
    btn.click((e) => {
        e.preventDefault();
        btn.toggleClass('ri-toggle-line');
        btn.toggleClass('ri-toggle-fill');
        $('.cards-charts > .charts-item').toggleClass('active').toggleClass('hidden');
        $('.cards-charts > .charts-container').toggleClass('active').toggleClass('hidden');
    })
}