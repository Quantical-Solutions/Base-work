require('./bootstrap');
import Request from './xhr.js';

/*
=============================================================================
============================= JS & jQuery Script ============================
=============================================================================
 */

var md = {
    misc: {
        navbar_menu_visible: 0,
        active_collapse: true,
        disabled_collapse_init: 0,
    },

    checkSidebarImage: function() {
        $sidebar = $('.sidebar');
        image_src = $sidebar.data('image');

        if (image_src !== undefined) {
            sidebar_container = '<div class="sidebar-background" style="background-image: url(' + image_src + ') "/>';
            $sidebar.append(sidebar_container);
        }
    },

    showNotification: function(from, align) {
        type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "add_alert",
            message: "Welcome to <b>Material Dashboard Pro</b> - a beautiful admin panel for every web developer."

        }, {
            type: type[color],
            timer: 3000,
            placement: {
                from: from,
                align: align
            }
        });
    },

    initFormExtendedDatetimepickers: function() {
        $('.datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });

        $('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });

        $('.timepicker').datetimepicker({
            //          format: 'H:mm',    // use this format if you want the 24hours timepicker
            format: 'h:mm A', //use this format if you want the 12hours timpiecker with AM/PM toggle
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'

            }
        });
    },


    initSliders: function() {
        // Sliders for demo purpose
        var slider = document.getElementById('sliderRegular');

        noUiSlider.create(slider, {
            start: 40,
            connect: [true, false],
            range: {
                min: 0,
                max: 100
            }
        });

        var slider2 = document.getElementById('sliderDouble');

        noUiSlider.create(slider2, {
            start: [20, 60],
            connect: true,
            range: {
                min: 0,
                max: 100
            }
        });
    },

    initSidebarsCheck: function() {
        if ($(window).width() <= 991) {
            if ($sidebar.length != 0) {
                md.initRightMenu();
            }
        }
    },

    checkFullPageBackgroundImage: function() {
        $page = $('.full-page');
        image_src = $page.data('image');

        if (image_src !== undefined) {
            image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
            $page.append(image_container);
        }
    },

    labelsChart: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'],

    getStatsFromJson: function(date, id) {

        var json = JSON.parse(document.querySelector('#' + id).dataset.coord),
            results = { coord: [], top: '', range: '' },
            d = new Date(),
            today = (d.getMonth() < 10) ? date + '-0' + (d.getMonth()+1) + '-01' : date + '-' + (d.getMonth()+1) + '-01',
            yesterday = (d.getMonth() < 10) ? parseInt(date)-1 + '-0' + (d.getMonth()+1) + '-01' : date + '-' + (d.getMonth()+1) + '-01',
            compare = [];

        for (const key in json) {
            if (key === date) {
                for (const cle in json[key]) {
                    results.coord.push(json[key][cle]);
                    if (cle === today) {
                        compare.push(json[key][cle]);
                    }
                }
            }
            if (key === (parseInt(date)-1).toString()) {
                for (const cle in json[key]) {
                    if (cle === yesterday) {
                        compare.push(json[key][cle]);
                    }
                }
            }
        }

        var t = compare[0], y = compare[1];
        results.range = (y*100)/t;

        var max = Math.max.apply(null, results.coord);
        if (max >= 0 && max < 3) { results.top = 3; }
        else if (max > 2 && max < 5) { results.top = 6; }
        else if (max > 4 && max < 11) { results.top = 11; }
        else if (max > 10 && max < 51) { results.top = max + (Math.floor(max/3)); }
        else if (max > 50 && max < 1001) { results.top = max + (Math.floor(max/5)); }
        else { results.top = max + (Math.floor(max/10)); }

        return results;
    },

    initDashboardPageCharts: function(date) {

        if ($('#newCustomersChart').length != 0 || $('#activateCardChart').length != 0 || $('#activateAppChart').length != 0 || $('#estateChart').length != 0 || $('#orderChart').length != 0 || $('#productionChart').length != 0 || $('#deliveryChart').length != 0 || $('#distriChart').length != 0) {

            /* ----------==========     New Customers Chart initialization    ==========---------- */

            dataNewCustomersChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'newCustomersChart').coord
                ]
            };

            optionsNewCustomersChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: this.getStatsFromJson(date, 'newCustomersChart').top,
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
            }

            var newCustomersChart = new Chartist.Line('#newCustomersChart', dataNewCustomersChart, optionsNewCustomersChart);

            md.startAnimationForLineChart(newCustomersChart);


            /* ----------==========     Activation Card Chart initialization    ==========---------- */

            dataActivateCardChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'activateCardChart').coord
                ]
            };

            optionsActivateCardChart = {
                axisX: {
                    showGrid: false
                },
                low: 0,
                high: this.getStatsFromJson(date, 'activateCardChart').top,
                chartPadding: {
                    top: 0,
                    right: 5,
                    bottom: 0,
                    left: 0
                }
            };
            var responsiveOptions = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function(value) {
                            return value[0];
                        }
                    }
                }]
            ];

            var activateCardChart = new Chartist.Line('#activateCardChart', dataActivateCardChart, optionsActivateCardChart);

            md.startAnimationForBarChart(activateCardChart);


            /* ----------==========     Activation App Chart initialization    ==========---------- */

            var dataActivateAppChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'activateAppChart').coord
                ]
            };
            var optionsActivateAppChart = {
                axisX: {
                    showGrid: false
                },
                low: 0,
                high: this.getStatsFromJson(date, 'activateAppChart').top,
                chartPadding: {
                    top: 0,
                    right: 5,
                    bottom: 0,
                    left: 0
                }
            };
            var responsiveOptions = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function(value) {
                            return value[0];
                        }
                    }
                }]
            ];

            var activateAppChart = Chartist.Line('#activateAppChart', dataActivateAppChart, optionsActivateAppChart);

            md.startAnimationForBarChart(activateAppChart);

            /* ----------==========     Estates Chart initialization    ==========---------- */

            dataEstateChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'estateChart').coord
                ]
            };

            optionsEstateChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: this.getStatsFromJson(date, 'estateChart').top,
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            };

            var estateChart = new Chartist.Bar('#estateChart', dataEstateChart, optionsEstateChart, responsiveOptions);

            md.startAnimationForLineChart(estateChart);


            /* ----------==========     Orders Chart initialization    ==========---------- */

            dataOrderChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'orderChart').coord
                ]
            };

            optionsOrderChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: this.getStatsFromJson(date, 'orderChart').top,
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            };

            var orderChart = new Chartist.Line('#orderChart', dataOrderChart, optionsOrderChart, responsiveOptions);

            md.startAnimationForLineChart(orderChart);


            /* ----------==========     Production Chart initialization    ==========---------- */

            var dataProductionChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'productionChart').coord
                ]
            };
            var optionsProductionChart = {
                axisX: {
                    showGrid: false
                },
                low: 0,
                high: this.getStatsFromJson(date, 'productionChart').top,
                chartPadding: {
                    top: 0,
                    right: 5,
                    bottom: 0,
                    left: 0
                }
            };
            var responsiveOptions = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function(value) {
                            return value[0];
                        }
                    }
                }]
            ];
            var productionChart = Chartist.Bar('#productionChart', dataProductionChart, optionsProductionChart, responsiveOptions);

            md.startAnimationForBarChart(productionChart);
        }


        /* ----------==========     Delivery Chart initialization    ==========---------- */

        dataDeliveryChart = {
            labels: this.labelsChart,
            series: [
                this.getStatsFromJson(date, 'deliveryChart').coord
            ]
        };

        optionsDeliveryChart = {
            axisX: {
                showGrid: false
            },
            low: 0,
            high: this.getStatsFromJson(date, 'deliveryChart').top,
            chartPadding: {
                top: 0,
                right: 5,
                bottom: 0,
                left: 0
            }
        };
        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];

        var deliveryChart = new Chartist.Bar('#deliveryChart', dataDeliveryChart, optionsDeliveryChart);

        md.startAnimationForBarChart(deliveryChart);


        /* ----------==========     Distributors Chart initialization    ==========---------- */

        var dataDistriChart = {
            labels: this.labelsChart,
            series: [
                this.getStatsFromJson(date, 'distriChart').coord
            ]
        };
        var optionsDistriChart = {
            axisX: {
                showGrid: false
            },
            low: 0,
            high: this.getStatsFromJson(date, 'distriChart').top,
            chartPadding: {
                top: 0,
                right: 5,
                bottom: 0,
                left: 0
            }
        };
        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];
        var distriChart = Chartist.Bar('#distriChart', dataDistriChart, optionsDistriChart, responsiveOptions);

        md.startAnimationForBarChart(distriChart);
    },

    initMinimizeSidebar: function() {

        $('#minimizeSidebar').click(function() {
            var $btn = $(this);

            if (md.misc.sidebar_mini_active == true) {
                $('body').removeClass('sidebar-mini');
                md.misc.sidebar_mini_active = false;
            } else {
                $('body').addClass('sidebar-mini');
                md.misc.sidebar_mini_active = true;
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
                window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
                clearInterval(simulateWindowResize);
            }, 1000);
        });
    },

    checkScrollForTransparentNavbar: debounce(function() {
        if ($(document).scrollTop() > 260) {
            if (transparent) {
                transparent = false;
                $('.navbar-color-on-scroll').removeClass('navbar-transparent');
            }
        } else {
            if (!transparent) {
                transparent = true;
                $('.navbar-color-on-scroll').addClass('navbar-transparent');
            }
        }
    }, 17),


    initRightMenu: debounce(function() {
        $sidebar_wrapper = $('.sidebar-wrapper');

        if (!mobile_menu_initialized) {
            $navbar = $('nav').find('.navbar-collapse').children('.navbar-nav');

            mobile_menu_content = '';

            nav_content = $navbar.html();

            nav_content = '<ul class="nav navbar-nav nav-mobile-menu">' + nav_content + '</ul>';

            navbar_form = $('nav').find('.navbar-form').get(0).outerHTML;

            $sidebar_nav = $sidebar_wrapper.find(' > .nav');

            // insert the navbar form before the sidebar list
            $nav_content = $(nav_content);
            $navbar_form = $(navbar_form);
            $nav_content.insertBefore($sidebar_nav);
            $navbar_form.insertBefore($nav_content);

            $(".sidebar-wrapper .dropdown .dropdown-menu > li > a").click(function(event) {
                event.stopPropagation();

            });

            // simulate resize so all the charts/maps will be redrawn
            window.dispatchEvent(new Event('resize'));

            mobile_menu_initialized = true;
        } else {
            if ($(window).width() > 991) {
                // reset all the additions that we made for the sidebar wrapper only if the screen is bigger than 991px
                $sidebar_wrapper.find('.navbar-form').remove();
                $sidebar_wrapper.find('.nav-mobile-menu').remove();

                mobile_menu_initialized = false;
            }
        }
    }, 200),

    startAnimationForLineChart: function(chart) {

        chart.on('draw', function(data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 600,
                        dur: 700,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeOutQuint
                    }
                });
            } else if (data.type === 'point') {
                seq++;
                data.element.animate({
                    opacity: {
                        begin: seq * delays,
                        dur: durations,
                        from: 0,
                        to: 1,
                        easing: 'ease'
                    }
                });
            }
        });

        seq = 0;
    },
    startAnimationForBarChart: function(chart) {

        chart.on('draw', function(data) {
            if (data.type === 'bar') {
                seq2++;
                data.element.animate({
                    opacity: {
                        begin: seq2 * delays2,
                        dur: durations2,
                        from: 0,
                        to: 1,
                        easing: 'ease'
                    }
                });
            }
        });

        seq2 = 0;
    },


    initFullCalendar: function() {
        $calendar = $('#fullCalendar');

        today = new Date();
        y = today.getFullYear();
        m = today.getMonth();
        d = today.getDate();

        $calendar.fullCalendar({
            viewRender: function(view, element) {
                // We make sure that we activate the perfect scrollbar when the view isn't on Month
                if (view.name != 'month') {
                    //$(element).find('.fc-scroller').perfectScrollbar();
                }
            },
            header: {
                left: 'title',
                center: 'month,agendaWeek,agendaDay',
                right: 'prev,next,today'
            },
            defaultDate: today,
            selectable: true,
            selectHelper: true,
            views: {
                month: { // name of view
                    titleFormat: 'MMMM YYYY'
                    // other view-specific options here
                },
                week: {
                    titleFormat: " MMMM D YYYY"
                },
                day: {
                    titleFormat: 'D MMM, YYYY'
                }
            },

            select: function(start, end) {

                // on select we show the Sweet Alert modal with an input
                swal({
                    title: 'Create an Event',
                    html: '<div class="form-group">' +
                        '<input class="form-control" placeholder="Event Title" id="input-field">' +
                        '</div>',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function(result) {

                    var eventData;
                    event_title = $('#input-field').val();

                    if (event_title) {
                        eventData = {
                            title: event_title,
                            start: start,
                            end: end
                        };
                        $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
                    }

                    $calendar.fullCalendar('unselect');

                })
                    .catch(swal.noop);
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events


            // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
            events: [{
                title: 'All Day Event',
                start: new Date(y, m, 1),
                className: 'event-default'
            },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d - 4, 6, 0),
                    allDay: false,
                    className: 'event-rose'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d + 3, 6, 0),
                    allDay: false,
                    className: 'event-rose'
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d - 1, 10, 30),
                    allDay: false,
                    className: 'event-green'
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d + 7, 12, 0),
                    end: new Date(y, m, d + 7, 14, 0),
                    allDay: false,
                    className: 'event-red'
                },
                {
                    title: 'Md-pro Launch',
                    start: new Date(y, m, d - 2, 12, 0),
                    allDay: true,
                    className: 'event-azure'
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false,
                    className: 'event-azure'
                },
                {
                    title: 'Click for Creative Tim',
                    start: new Date(y, m, 21),
                    end: new Date(y, m, 22),
                    url: 'http://www.creative-tim.com/',
                    className: 'event-orange'
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 21),
                    end: new Date(y, m, 22),
                    url: 'http://www.creative-tim.com/',
                    className: 'event-orange'
                }
            ]
        });
    },

    initVectorMap: function() {
        var mapData = {
            "AU": 760,
            "BR": 550,
            "CA": 120,
            "DE": 1300,
            "FR": 540,
            "GB": 690,
            "GE": 200,
            "IN": 200,
            "RO": 600,
            "RU": 300,
            "US": 2920,
        };

        $('#worldMap').vectorMap({
            map: 'world_mill_en',
            backgroundColor: "transparent",
            zoomOnScroll: false,
            regionStyle: {
                initial: {
                    fill: '#e4e4e4',
                    "fill-opacity": 0.9,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 0
                }
            },

            series: {
                regions: [{
                    values: mapData,
                    scale: ["#AAAAAA", "#444444"],
                    normalizeFunction: 'polynomial'
                }]
            },
        });
    }
}

var isClosed = false,
    isClosedSetts = false;

displayErrorConn();
timeStamper();
initSearchInputs();

if (document.querySelector('#statsPage')) {
    initFirstLoad('stats');
} else {
    initFirstLoad();
}



var Menu = {

    el: {
        ham: $('.menu'),
        menuTop: $('.menu-top'),
        menuMiddle: $('.menu-middle'),
        menuBottom: $('.menu-bottom')
    },

    init: function() {
        Menu.bindUIactions();
    },

    bindUIactions: function() {
        Menu.el.ham
            .on(
                'click',
                function(event) {
                    Menu.activateMenu(event);
                    event.preventDefault();
                }
            );
    },

    activateMenu: function() {
        Menu.el.menuTop.toggleClass('menu-top-click');
        Menu.el.menuMiddle.toggleClass('menu-middle-click');
        Menu.el.menuBottom.toggleClass('menu-bottom-click');
        $('nav').toggleClass('displayNav');
        $('#overlay').toggleClass('displayOverlay');
    }
};

Menu.init();

function burgerTime(elmt) {

    if (isClosed == true) {

        document.querySelector('#hamburger').classList.remove('is-open');
        document.querySelector('#hamburger').classList.add('is-closed');
        document.querySelector('header').classList.remove('display_menu');
        isClosed = false;

    } else {

        document.querySelector('#hamburger').classList.remove('is-closed');
        document.querySelector('#hamburger').classList.add('is-open');
        document.querySelector('header').classList.add('display_menu');
        isClosed = true;
    }
}

function timeStamper() {

    if (document.querySelector('main')) {

        var d = new Date(),
            date = d.getFullYear() + '-' + ("0" + (d.getMonth()+1)).slice(-2) + '-' + ("0" + d.getDate()).slice(-2) + 'T' + ("0" + d.getHours()).slice(-2) + ':' + ("0" + d.getMinutes()).slice(-2) + ':' + ("0" + d.getSeconds()).slice(-2),
            id = document.body.dataset.id;

        $(document).ready(function () {

            $.post('/admin/request', {'xhr2': 'timeStamper', 'date': date, 'id': id}, function (data, status) {

                if (status == 'success' && data == 'ok') {

                    var d = new Date();
                    console.log('⚙️' + "%c QUANTICAL SOLUTIONS " + d.getFullYear() + " - " + "%cTampon horaire de" +
                        " connexion enregistré dans la Base de données administrateurs à " + "%c" + ("0" + d.getHours()).slice(-2) + "h" + ("0" + d.getMinutes()).slice(-2) + ". ⚙️ ", "color:RoyalBlue;" ,"color:orange;", "color:green;");
                }
            });
        });
    }
}

function setCKEditor() {

    for(name in CKEDITOR.instances) {
        if (document.querySelector(name)) {
            CKEDITOR.instances[name].destroy(true);
        }
    }
    CKEDITOR.replaceAll('ckeditor');
}

function displayErrorConn() {

    var error = document.querySelector('#errorConn');
    if (error) {

        setTimeout(function(){ error.classList.add('displayErrorConn') }, 50);
        setTimeout(function(){ error.classList.remove('displayErrorConn') }, 3050);
    }
}

function getPage(elmt, page, counter = false, game = false) {

    if (document.querySelector('main')) {

        if (document.querySelector('#modale')) { document.querySelector('#closeModal').click(); }
        document.querySelector('#mainLoader').classList.add('displayLoader');
        document.querySelector('#overlay').classList.add('displayOverlay');
        document.querySelector('main').classList.add('mainOverflowHidden');
        document.querySelector('main').scrollTo(0, 0);
        var bgs = [
            'https://cache.quanticalsolutions.com/main/img/adminBGS/bg1.jpg',
            'https://cache.quanticalsolutions.com/main/img/adminBGS/bg2.jpg',
            'https://cache.quanticalsolutions.com/main/img/adminBGS/bg3.jpg',
            'https://cache.quanticalsolutions.com/main/img/adminBGS/bg4.jpg',
            'https://cache.quanticalsolutions.com/main/img/adminBGS/bg5.jpg',
            'https://cache.quanticalsolutions.com/main/img/adminBGS/bg6.jpg'
        ];
        var random = bgs[Math.floor(Math.random() * bgs.length)];
        var transitionBlocks = document.querySelectorAll('.loaderDiv');
        for (var i = 0; i < transitionBlocks.length; i++) {
            transitionBlocks[i].style.backgroundImage = 'url("' + random + '")'
        }
        var title = elmt.textContent;
        var links = document.querySelectorAll('.ajax');
        for (var i = 0; i < links.length; i++) {
            links[i].classList.remove('hoverSpan');
            links[i].closest('.nav-item').classList.remove('active');
        }
        if (elmt.tagName != 'DIV') {
            elmt.classList.add('hoverSpan');
            elmt.closest('.nav-item').classList.add('active');
        }

        setTimeout(function(){

            $(document).ready(function () {

                $.post('/admin/request', {'xhr2': 'pages', 'page': page, 'title': title}, function (data, status) {

                    if (status == 'success') {

                        document.querySelector('#pageReplacer').innerHTML = data;
                        var pagi = document.querySelector('#mainPaginer');
                        if (pagi) {
                            div = document.createElement('DIV');
                            div.setAttribute('class', 'paginer');
                            div.setAttribute('id', 'bottomPaginer');
                            div.innerHTML = pagi.innerHTML;
                            pagi.parentElement.appendChild(div);
                        }

                        var cnt = (counter != false && document.querySelector('#mainTable').dataset.count) ? '<span' +
                            ' class="counter">' + document.querySelector('#mainTable').dataset.count + '</span>' : '';

                        document.querySelector('.navbar-brand').classList.add('hideTitle');
                        setTimeout(function(){
                            document.querySelector('.navbar-brand').innerHTML = elmt.querySelector('p').innerHTML + cnt;
                            document.querySelector('.navbar-brand').classList.remove('hideTitle');
                        }, 250);

                        setTimeout(function(){
                            document.querySelector('#mainLoader').classList.add('displayLoaderOut');
                        }, 1000);
                        setTimeout(function(){
                            document.querySelector('#mainLoader').classList.remove('displayLoader');
                        }, 1050);
                        setTimeout(function(){
                            document.querySelector('#overlay').classList.remove('displayOverlay');
                        }, 2200);
                        setTimeout(function(){
                            document.querySelector('#mainLoader').classList.remove('displayLoaderOut');
                            document.querySelector('main').classList.remove('mainOverflowHidden');
                        }, 2500);

                        document.querySelector('main').scrollTo(0, 0);
                        initFirstLoad();
                        if (document.querySelector('#statsPage')) {
                            md.initDashboardPageCharts('2020');
                        }

                    } else {

                        document.querySelector('#pageReplacer').innerHTML = 'Erreur de chargement de la page...';
                        document.querySelector('#mainLoader').classList.remove('displayLoader');
                        selectSearch();
                        initMediaSize();
                        recordForm('informations', 'recordSettings', 'settings');
                        recordForm('modeles', 'recordModeles', 'modeles_emails');
                    }
                });
            });
        }, 1250);
    }
}

function initFirstLoad() {

    get_servers_details();
    add_listeners_ftp();
    selectSearch();
    recordForm('informations', 'recordSettings', 'settings');
    recordForm('modeles', 'recordModeles', 'modeles_emails');
    igniteFrames();
    setCKEditor();
    initMediaSize();
    /*(function() {
        isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;

        if (isWindows) {
            // if we are on windows OS we activate the perfectScrollbar function
            $('main').perfectScrollbar();

            $('html').addClass('perfect-scrollbar-on');
        } else {
            $('html').addClass('perfect-scrollbar-off');
        }
    })();*/
    if (document.querySelector('#modeleTemplate')) {

        var option = document.querySelectorAll('#modéleTemplate option');
    }
}

function launchGraph(elmt) {

    var date = elmt.value, lastYear = parseInt(date)-1, lastSpan = document.querySelectorAll('.exoYearBefore'), thisYear = document.querySelectorAll('.exoThisYear');
    elmt.closest('.card-stats').querySelector('.card-title').innerHTML = '<i class="material-icons' +
        ' text-primary">calendar_today</i>' + date;
    for (var i = 0; i < lastSpan.length; i++) {
        lastSpan[i].innerHTML = lastYear;
    }
    for (var i = 0; i < thisYear.length; i++) {
        thisYear[i].innerHTML = date;
    }
    md.initDashboardPageCharts(date);
}

function triggerPage(page) {

    var onglet = document.querySelector('#' + page);
    onglet.click();
}

function createPDF(elmt) {

    document.querySelector('#mainLoader').classList.add('displayLoader');

    var data = elmt.dataset.json;
    var name = elmt.dataset.name;
    var rap = elmt.dataset.type;
    var color = '28,56,89';
    var url = '/admin/request';
    var json = { 'xhr2': 'createPDF', 'infos': data, 'nom': name, 'rap': rap, 'color': color };

    $(document).ready(function(){

        $.post(url, json, function(data, status){

            if (status == 'success') {

                document.querySelector('#mainLoader').classList.remove('displayLoader');
                elmt.previousElementSibling.click();

            } else {

                document.querySelector('#mainLoader').classList.remove('displayLoader');
                errorConsoleLog();
            }
        });
    });
}

function createXML(elmt) {

    document.querySelector('#mainLoader').classList.add('displayLoader');

    var data = elmt.dataset.json;
    var name = elmt.dataset.name;
    var type = elmt.dataset.type.replace(' & ', ' ET ');
    var url = '/admin/request';
    var json = { 'xhr2': 'createXML', 'infos': data, 'nom': name, 'type': type };

    $(document).ready(function(){

        $.post(url, json, function(data, status){

            if (status == 'success') {

                document.querySelector('#mainLoader').classList.remove('displayLoader');
                elmt.previousElementSibling.click();

            } else {

                document.querySelector('#mainLoader').classList.remove('displayLoader');
                errorConsoleLog();
            }
        });
    });
}

function errorConsoleLog() {

    console.log("%cUne erreur AJAX est survenue !", "color:red;");
}

function scrudAction(id, mode, table) {

    var html = '',
        button = '<div id="closeModal" onclick="closeModal()"><svg id="closeModal_svg"' +
            ' viewBox="0 0 32 32"><path d="M31.708 25.708c-0-0-0-0-0-0l-9.708-9.708 9.708-9.708c0-0 0-0 0-0 0.105-0.105' +
            ' 0.18-0.227 0.229-0.357 0.133-0.356' +
            ' 0.057-0.771-0.229-1.057l-4.586-4.586c-0.286-0.286-0.702-0.361-1.057-0.229-0.13 0.048-0.252 0.124-0.357' +
            ' 0.228 0 0-0 0-0 0l-9.708' +
            ' 9.708-9.708-9.708c-0-0-0-0-0-0-0.105-0.104-0.227-0.18-0.357-0.228-0.356-0.133-0.771-0.057-1.057' +
            ' 0.229l-4.586 4.586c-0.286 0.286-0.361 0.702-0.229 1.057 0.049 0.13 0.124 0.252 0.229 0.357 0 0 0 0 0' +
            ' 0l9.708 9.708-9.708 9.708c-0 0-0 0-0 0-0.104 0.105-0.18 0.227-0.229 0.357-0.133 0.355-0.057 0.771 0.229' +
            ' 1.057l4.586 4.586c0.286 0.286 0.702 0.361 1.057 0.229 0.13-0.049 0.252-0.124 0.357-0.229 0-0 0-0' +
            ' 0-0l9.708-9.708 9.708 9.708c0 0 0 0 0 0 0.105 0.105 0.227 0.18 0.357 0.229 0.356 0.133 0.771 0.057' +
            ' 1.057-0.229l4.586-4.586c0.286-0.286 0.362-0.702' +
            ' 0.229-1.057-0.049-0.13-0.124-0.252-0.229-0.357z"></path></svg></div>';
    switch (mode) {

        case 'see':

            html = '<div id="seeCont" class="htmlCont card"><div class="card-header card-header-primary"><h4 class="card-title">Voir' +
                ' les données de l\'entrée <i>n°' + id + '</i></h4>' + button + '</div><div id="ajaxFields"' +
                ' class="card-body"></div></div>';
            break;

        case 'edit':

            html = '<form method="post" enctype="multipart/form-data" id="editCont" class="htmlCont card"><input' +
                ' type="hidden" name="mode" value="' + mode + '"><input type="hidden" name="table" value="' + table + '"><div class="card-header card-header-primary"><h4 class="card-title">Modifier les données de l\'entrée <i>n°' + id + '</i></h4>' + button + '</div><div id="ajaxFields" class="card-body"></div><button class="cardBtns btn btn-primary pull-right" type="button" onclick="actionRow(' + id + ', \'' + table + '\', \'edit\')">Modifier</button><div class="clearfix"></div><button style="display: none;" type="submit">To Form</button></form>';
            break;

        case 'delete':

            html = '<div id="deleteCont" class="htmlCont card"><div class="card-header' +
                ' card-header-primary"><h4 class="card-title">Confirmation de suppression des données de' +
                ' l\'entrée <i>n°' + id + '</i></h4>' + button + '</div><div class="card-body"><button' +
                ' class="cardBtns btn btn-danger pull-right" type="button" onclick="actionRow(' + id + ', \'' + table + '\',' +
                ' \'delete\')">Supprimer</button><div class="clearfix"></div></div></div>';
            break;
    }
    createModal(html, mode, id, table);
}

function addRow(id, table) {

    var html = '',
        button = '<div id="closeModal" onclick="closeModal()"><svg id="closeModal_svg"' +
            ' viewBox="0 0 32 32"><path d="M31.708 25.708c-0-0-0-0-0-0l-9.708-9.708 9.708-9.708c0-0 0-0 0-0 0.105-0.105' +
            ' 0.18-0.227 0.229-0.357 0.133-0.356' +
            ' 0.057-0.771-0.229-1.057l-4.586-4.586c-0.286-0.286-0.702-0.361-1.057-0.229-0.13 0.048-0.252 0.124-0.357' +
            ' 0.228 0 0-0 0-0 0l-9.708' +
            ' 9.708-9.708-9.708c-0-0-0-0-0-0-0.105-0.104-0.227-0.18-0.357-0.228-0.356-0.133-0.771-0.057-1.057' +
            ' 0.229l-4.586 4.586c-0.286 0.286-0.361 0.702-0.229 1.057 0.049 0.13 0.124 0.252 0.229 0.357 0 0 0 0 0' +
            ' 0l9.708 9.708-9.708 9.708c-0 0-0 0-0 0-0.104 0.105-0.18 0.227-0.229 0.357-0.133 0.355-0.057 0.771 0.229' +
            ' 1.057l4.586 4.586c0.286 0.286 0.702 0.361 1.057 0.229 0.13-0.049 0.252-0.124 0.357-0.229 0-0 0-0' +
            ' 0-0l9.708-9.708 9.708 9.708c0 0 0 0 0 0 0.105 0.105 0.227 0.18 0.357 0.229 0.356 0.133 0.771 0.057' +
            ' 1.057-0.229l4.586-4.586c0.286-0.286 0.362-0.702' +
            ' 0.229-1.057-0.049-0.13-0.124-0.252-0.229-0.357z"></path></svg></div>';
    html += '<form method="post" enctype="multipart/form-data" id="addCont" class="htmlCont card"><input' +
        ' type="hidden" name="mode" value="record"><input type="hidden" name="table" value="' + table + '"><div' +
        ' class="card-header card-header-primary"><h4 class="card-title">Ajouter une entrée</h4>' + button + '</div><div' +
        ' id="ajaxFields" class="card-body"></div><button' +
        ' type="button" onclick="actionRow(false, \'' + table + '\', \'record\')" class="cardBtns btn btn-primary' +
        ' pull-right">Enregistrer</button><div class="clearfix"></div><button' +
        ' style="display: none;" type="submit">To Form</button></form>';
    createModal(html, 'add', id, table);
}

function createModal(data, mode, id, table) {

    document.querySelector('#mainLoader').classList.add('displayLoader');
    var div = document.createElement('DIV');
    div.setAttribute('id', 'modale');
    div.innerHTML = '<div class="innerModale"><div id="modalContent"' +
        ' class="col-md-12">' + data + '</div></div>';
    document.querySelector('main').appendChild(div);

    if (mode == 'delete') {

        div.classList.add('supressModal');
        div.classList.add('displayModal');
        document.querySelector('#mainLoader').classList.remove('displayLoader');

    } else {

        $(document).ready(function () {

            $.post('/admin/request', {
                'xhr2': 'buildModal',
                'id': id,
                'mode': mode,
                'table': table
            }, function (data, status) {

                if (status == 'success') {

                    document.querySelector('#ajaxFields').innerHTML = data;
                    setTimeout(function () {
                        div.classList.add('displayModal');
                        document.querySelector('#mainLoader').classList.remove('displayLoader');
                        recordForm('modalContent form', 'scrud_action', table);
                    }, 50);
                    setCKEditor();

                } else {

                    document.querySelector('#ajaxFields').innerHTML = 'Une erreur s\'est produite...';
                    setTimeout(function () {
                        div.classList.add('displayModal');
                        document.querySelector('#mainLoader').classList.remove('displayLoader');
                    }, 50);
                }
            });
        });
    }
}

function beCrypt(elmt) {

    var next = elmt.nextElementSibling;
    $(document).ready(function(){
        $.post('/admin/request', { 'xhr2': 'beCrypt', 'mdp': elmt.value, 'old': next.dataset.old }, function(data, status){
            if (status == 'success') {
                next.value = data
            } else {
                next.value = 'Une erreur est survenue...'
            }
        });
    });
}

function getSection(elmt, mode) {

    var nb = parseInt(elmt.parentElement.querySelector('nbr').innerHTML),
        sections = document.querySelectorAll('.sectionsDiv');

    switch (mode) {

        case 'less':

            if (nb > 1) {

                nb -= 1;

                for (var i = 0; i < sections.length; i++) {
                    sections[i].style.display = 'none';
                }

                for (var i = 0; i < sections.length; i++) {
                    if (sections[i].children[0].textContent == 'Section ' + nb) {
                        sections[i].style.display = 'flex';
                    }
                }

                elmt.parentElement.querySelector('nbr').innerHTML = nb;
            }
            break;

        case 'more':

            if (nb < 6) {

                nb += 1;

                for (var i = 0; i < sections.length; i++) {
                    sections[i].style.display = 'none';
                }

                for (var i = 0; i < sections.length; i++) {
                    if (sections[i].children[0].textContent == 'Section ' + nb) {
                        sections[i].style.display = 'flex';
                    }
                }

                elmt.parentElement.querySelector('nbr').innerHTML = nb;
            }
            break;
    }
}

function closeModal() {

    var div = document.querySelector('#modale');
    div.classList.remove('displayModal');
    div.classList.remove('supressModal');
    setTimeout(function(){
        div.parentElement.removeChild(div);
    }, 250);
}

function actionRow(id, table, mode) {

    if (mode != 'delete') {

        document.querySelector('#modalContent form button[type="submit"]').click();

    } else if (mode == 'delete') {

        document.querySelector('#mainLoader').classList.add('displayLoader');
        var url = '/admin/request';
        var json = { 'xhr2': 'scrud_action', 'id': id, 'table': table, 'mode': mode };

        $(document).ready(function(){

            $.post(url, json, function(data, status){

                if (status == 'success') {

                    document.querySelector('#mainLoader').classList.remove('displayLoader');
                    document.querySelectorAll('.hoverSpan')[0].click();

                } else {

                    document.querySelector('#mainLoader').classList.remove('displayLoader');
                    document.querySelector('#closeModal').click();
                }
            });
        });
    }
}

function search(elmt) {

    var tags = elmt.previousElementSibling.value;

    if (tags != '') {

        $(document).ready(function () {

            $.post('/admin/request', {'xhr2': 'recherche', 'tags': tags}, function (data, status) {

                if (status == 'success') {

                    document.querySelector('#pageReplacer').innerHTML = data;
                    document.querySelector('#mainLoader').classList.remove('displayLoader');
                    elmt.previousElementSibling.value = '';
                    initSearchInputs();

                } else {
                    document.querySelector('#pageReplacer').innerHTML = 'Erreur de chargement de la page...';
                    document.querySelector('#mainLoader').classList.remove('displayLoader');
                    elmt.previousElementSibling.value = '';
                    initSearchInputs();
                }
            });
        });
    }
}

function initSearchInputs() {

    var inputs = document.querySelectorAll('.searchInputs');
    if (inputs) {
        for (var i = 0; i < inputs.length; i++) {

            inputs[i].addEventListener("keyup", function (event) {

                if (event.keyCode === 13) {

                    event.preventDefault();
                    this.nextElementSibling.click();
                }
            });
        }
    }
}

function modeGraph(elmt, str) {

    if (document.querySelector('#graphicDiv')) {

        document.querySelector('#graphicDiv').innerHTML = '<canvas id="myChart"></canvas>';

        $(document).ready(function(){

            var mode = document.querySelector('#graphMode').value,
                year = document.querySelector('#graphYear').value;

            $.post('/admin/request', { 'xhr2': 'getStats', 'subject': str, 'date': year }, function(data, status){

                if (status == 'success') {

                    var ctx = document.querySelector('#myChart').getContext('2d'),
                        json = JSON.parse(data),
                        coord = json['coord'],
                        xAxis = [],
                        yAxis = [],
                        li = document.querySelectorAll('.statsLegendsLists');

                    for (var i = 0; i < li.length; i++) {
                        li[i].classList.remove('selStat');
                    }

                    elmt.classList.add('selStat');
                    for (var key in coord) {
                        xAxis.push(key);
                        yAxis.push(coord[key]);
                    }

                    var myChart = new Chart(ctx, {
                        type: mode,
                        data: {
                            labels: xAxis,
                            datasets: [{
                                label: '',
                                data: yAxis,
                                backgroundColor: json['bg'],
                                borderColor: json['border'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                } else {

                    console.log('Erreur de chargement des données du graphique...');
                }
            });
        });
    }
}

function getSearchResultPage(elmt, onglet, id) {

    var ajax = document.querySelectorAll('.ajax');
    for (var i = 0; i < ajax.length; i++) {
        if (ajax[i].getAttribute('onclick') == 'getPage(this, \'' + onglet + '\')') {
            ajax[i].click();
            document.body.dataset.search = id;
            break;
        }
    }
}

function selectSearch() {

    var set = document.body.dataset.search;
    if (set != '' && parseInt(set, 16) != 'NaN') {

        var td = document.querySelectorAll('table td'), trs = document.querySelectorAll('.pagination');
        for (var i = 0; i < trs.length; i++) {
            trs[i].classList.remove('displayTr');
        }
        for (var i = 0; i < td.length; i++) {
            if (td[i].parentElement.children[0].innerHTML == set) {
                var tr = td[i].parentElement, pos = tr.offsetTop, pagi = tr.dataset.pagi, options = document.querySelectorAll('.paginer option');
                for (var j = 0; j < options.length; j++) {
                    if (options[j].value == pagi) {
                        options[j].selected = true;
                    }
                }
                for (var j = 0; j < trs.length; j++) {
                    if (trs[j].dataset.pagi == pagi) {
                        trs[j].classList.add('displayTr');
                    }
                }
                tr.classList.add('selTr');
                tr.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
                setTimeout(function(){ tr.classList.remove('selTr'); }, 3000);
                document.body.dataset.search = '';
                break;
            }
        }
    }
}

function getPagi(elmt) {

    var td = document.querySelectorAll('.scrudPagination'),
        page = elmt.value,
        pagiTop = document.querySelector('#mainPaginer'),
        pagiBottom = document.querySelector('#bottomPaginer');

    if (pagiTop && pagiBottom) {

        if (elmt.parentElement.id == 'mainPaginer') {

            var options = pagiBottom.querySelectorAll('option');
            for (var i = 0; i < options.length; i++) {
                if (options[i].value == page) {
                    options[i].selected = true;
                }
            }

        } else if (elmt.parentElement.id == 'bottomPaginer') {

            var options = pagiTop.querySelectorAll('option');
            for (var i = 0; i < options.length; i++) {
                if (options[i].value == page) {
                    options[i].selected = true;
                }
            }
        }
    }

    for (var i = 0; i < td.length; i++) {

        if (parseInt(td[i].dataset.pagi) != page) {

            td[i].classList.remove('displayTr');

        } else {

            if (!td[i].classList.contains('displayTr')) {

                td[i].classList.add('displayTr');
            }
        }
    }
}

function displayImportDetails(elmt) {

    var infos = JSON.parse(elmt.dataset.details),
        div = document.querySelector('#importFtpSection'),
        nom = div.querySelector('input[name="last_name"]'),
        usage = div.querySelector('input[name="usual_name"]'),
        prenom = div.querySelector('input[name="first_name"]'),
        date = div.querySelector('input[name="birth_date"]'),
        sexe = div.querySelector('input[name="sexe"]'),
        email = div.querySelector('input[name="email"]');

    nom.value = infos.LASTNAME;
    nom.disabled = false;
    usage.value = infos.USUALNAME;
    usage.disabled = false;
    prenom.value = infos.FIRSTNAME;
    prenom.disabled = false;
    sexe.value = (infos.SEXE == 'M') ? 'Homme' : 'Femme';
    sexe.disabled = false;
    date.value = infos.BIRTHDATE.slice(0, 4) + '-' + infos.BIRTHDATE.slice(4, 6) + '-' + infos.BIRTHDATE.slice(6);
    date.disabled = false;
    email.value = infos.EMAIL;
    email.disabled = false;
}

function eraseImportFields(elmt) {

    var inputs = elmt.parentElement.querySelectorAll('.inputsImports');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
        inputs[i].disabled = true;
    }
}

function importNewClient(elmt) {

    var inputs = document.querySelectorAll('.toImport'), ok = 0;
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove('error');
    }
    for (var i = 0; i < inputs.length; i++) {
        if ((inputs[i].value == '' || inputs[i].value == 'xEx') && inputs[i].name != 'usual_name') {
            inputs[i].classList.add('error');
        }
    }
    var error = document.querySelectorAll('.error');
    if (error) { ok = error.length }
    if (ok == 0) {

        var div = document.querySelector('#importManuelSection'),
            nom = div.querySelector('input[name="last_name"]').value,
            usage = div.querySelector('input[name="usual_name"]').value,
            prenom = div.querySelector('input[name="first_name"]').value,
            date = div.querySelector('input[name="birth_date"]').value,
            sexe = div.querySelector('select[name="sexe"]').value,
            email = div.querySelector('input[name="email"]').value,
            json = { 'xhr2': 'recordImport', 'nom': nom, 'usage': usage, 'prenom': prenom, 'sexe': sexe, 'birth': date, 'mail': email };

        $(document).ready(function () {

            $.post('/admin/request', json, function (data, status) {

                if (status == 'success') {

                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].value = '';
                    }
                    div.querySelector('select[name="sexe"]').children[0].selected = true;

                    document.querySelector('#importManuelSection p').innerHTML += '<span style="color: #339933; margin-left: 10px;">Import enregistré</span>';

                    setTimeout(function(){ document.querySelector('#importManuelSection p').innerHTML = 'Saisir les informations d\'un nouveau client.' }, 3000);

                } else {

                    document.querySelector('#importManuelSection p').innerHTML += '<span style="color: #960018; margin-left: 10px;">Une erreur est survenue...</span>';

                    setTimeout(function(){ document.querySelector('#importManuelSection p').innerHTML = 'Saisir les informations d\'un nouveau client.' }, 3000);
                }
            });
        });
    }
}

function previewLogo(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            input.parentElement.style.backgroundImage = 'url("' +  e.target.result + '")';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function recordForm(id, controller, page) {

    var form = document.querySelector('#' + id);
    if (form) {

        form.addEventListener('submit', function(ev) {

            var inputs = document.querySelectorAll('.toImport'), ok = 0;
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].classList.remove('error');
            }
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value == '' && inputs[i].type != 'file') {
                    inputs[i].classList.add('error');
                }
            }
            var error = document.querySelectorAll('.error');
            if (error) { ok = error.length }

            var data = new FormData(document.querySelector('#' + id));
            data.append("xhr2", controller);

            if (ok == 0) {

                document.querySelector('#mainLoader').classList.add('displayLoader');
                var request = new XMLHttpRequest();
                request.open("POST", "/admin/request", true);
                request.onload = function (oEvent) {

                    if (request.status == 200) {

                        document.querySelector('#mainLoader').classList.remove('displayLoader');
                        var ajax = document.querySelectorAll('.ajax');
                        for (var i = 0; i < ajax.length; i++) {
                            if (ajax[i].getAttribute('onclick') == 'getPage(this, \'' + page + '\')') {
                                ajax[i].click();
                                break;
                            }
                        }

                    } else {

                        document.querySelector('#mainLoader').classList.remove('displayLoader');
                        if (document.querySelector('#messgeAjax')) {
                            document.querySelector('#messgeAjax').style.display = 'block';
                        }
                    }
                };

                request.send(data);
            }

            ev.preventDefault();
        }, false);
    }
}

function launchBackup() {

    $(document).ready(function(){
        $.post('cron?2fE56Dcg10OOp=c54DfG2Rty235', { 'xhr2': 'manualBackup' }, function(data, status){
            if (status == 'success') {

                var ajax = document.querySelectorAll('.ajax');
                for (var i = 0; i < ajax.length; i++) {
                    if (ajax[i].getAttribute('onclick') == 'getPage(this, \'backups\')') {
                        ajax[i].click();
                        break;
                    }
                }

            } else {

                document.querySelector('#errorBackup').style.display = 'block';
            }
        });
    });
}

function eraseBackup(file) {

    var json = { 'xhr2': 'eraserBackup', 'file': file }, url = '/admin/request';

    $(document).ready(function(){

        $.post(url, json, function(data, status){

            if (status == 'success') {

                var ajax = document.querySelectorAll('.ajax');
                for (var i = 0; i < ajax.length; i++) {
                    if (ajax[i].getAttribute('onclick') == 'getPage(this, \'backups\')') {
                        ajax[i].click();
                        break;
                    }
                }

            } else {

                document.querySelector('#errorBackup').style.display = 'block';
            }
        });
    });
}

function igniteFrames() {

    var overlays = document.querySelectorAll('.overlayModele');
    if (overlays && overlays[0]) {
        setTimeout(function(){ overlays[0].click(); }, 1500);
    }
    for (var i = 0; i < overlays.length; i++) {
        dragElement(overlays[i].querySelector('text span'), i);
    }
}

function displayOverlays(elmt, index) {

    var overlays = document.querySelectorAll('.overlayModele');
    if (!elmt.classList.contains('displayScroller')) {

        for (var i = 0; i < overlays.length; i++) {
            overlays[i].classList.remove('displayScroller');
            overlays[i].querySelector('text span').style.top = '0px';
        }
        var long = (elmt.offsetHeight/5)*4;
        elmt.classList.add('displayScroller');
        elmt.querySelector('text').style.height = (document.querySelectorAll('iframe')[index].contentWindow.screen.height > 0) ? ((document.querySelectorAll('iframe')[index].contentWindow.screen.height*100)/long)*2.5 + 'px' : '0px';

    } else {

        for (var i = 0; i < overlays.length; i++) {
            overlays[i].classList.remove('displayScroller');
            overlays[i].querySelector('text span').style.top = '0px';
        }
    }
}

function dragElement(elmt, index) {

    var pos1 = 0, pos2 = 0;
    elmt.onmousedown = dragMouseDown;

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        pos2 = e.clientY;
        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {

        e = e || window.event;
        e.preventDefault();

        pos1 = pos2 - e.clientY;
        pos2 = e.clientY;
        elmt.classList.add('selCursor');

        var start = elmt.parentElement.offsetTop;
        var stop = elmt.parentElement.offsetHeight - elmt.offsetHeight;
        var position = elmt.offsetTop - pos1;
        var ratio = (parseInt((100*position)/stop) <= 100) ? parseInt((100*position)/stop) : 0;
        if (position + start >= start && position <= stop) {

            elmt.style.top = position + "px";
            letScroll(position, index, ratio);
        }
    }

    function closeDragElement() {

        document.onmouseup = null;
        document.onmousemove = null;
        elmt.classList.remove('selCursor');
    }
}

function letScroll(position, index, ratio) {

    var long = document.querySelector('#frame' + index).contentWindow.screen.height;
    var trans = (2.5*100)/long;
    var pos = parseInt((long*ratio)/100)+trans;
    document.querySelector('#frame' + index).contentWindow.scrollTo(0, pos);
}

function chooseModele(id) {

    document.querySelector('#mainLoader').classList.add('displayLoader');
    var json = { 'xhr2': 'chooseModele', 'id': id }, url = '/admin/request';
    $(document).ready(function(){

        $.post(url, json, function(data, status){

            document.querySelector('#mainLoader').classList.remove('displayLoader');
            if (status == 'success') {

                document.querySelector('#modeleContainer').innerHTML = data;
                igniteFrames();

            } else {

                document.querySelector('#errorAjax').style.display = 'block';
            }
        });
    });
}

function selShortCode(elmt) {

    var code = elmt.querySelector('input');
    code.select();
    document.querySelector('#scReplace').innerHTML = code.value;
    document.querySelector('#modaleCopy').classList.add('display_modaleCopy');
    setTimeout(function(){
        document.querySelector('#modaleCopy').classList.remove('display_modaleCopy');
    }, 3000);
    document.execCommand("copy");
}

function media_file_duration() {

    if (document.querySelector('#bibliotheque')) {

        var video = document.querySelectorAll('#bibliotheque video');
        var audio = document.querySelectorAll('#bibliotheque audio');

        for (var i = 0; i < video.length; i++) {

            var target = video[i].nextElementSibling.children[3];
            var duration = timeToString(video[i].duration);
            target.innerHTML = (duration != 'NaNhNaNmNaNs') ? 'Durée : ' + duration : 'Durée : Rafraîchir la page';
        }

        for (var i = 0; i < audio.length; i++) {

            var target = audio[i].parentElement.nextElementSibling.children[3];
            var duration = timeToString(audio[i].duration);
            target.innerHTML = (duration != 'NaNhNaNmNaNs') ? 'Durée : ' + duration : 'Durée : Rafraîchir la page';
        }
    }
}

function scrud_table_img_preview(elmt = false) {

    var target = document.querySelector('#scrud_previewer');
    var main = document.querySelector('main');

    if (target.classList.contains('display_scrud_previewer')) {

        document.querySelector('main').style.overflowY = 'scroll';
        target.classList.remove('display_scrud_previewer');
        setTimeout(function () {
            target.querySelector('img').src = '';
        }, 250);

    } else {

        if (elmt && elmt.src.search('no-src.jpg') == -1) {

            target.style.top = main.scrollTop + 'px';
            main.style.overflowY = 'hidden';
            target.querySelector('img').src = (elmt) ? elmt.src : '';
            target.classList.add('display_scrud_previewer');
        }
    }
}

function scrud_lib_import(type) {

    var target = document.querySelector('#scrud_hidden_lib_file_input');

    switch (type) {

        case 'image': target.accept = 'image/png, image/jpeg, image/jpg, image/bmp'; target.name = 'lib_file_img'; break;
        case 'video': target.accept = 'video/avi, video/mp4, video/mpeg4, video/mov'; target.name = 'lib_file_vid'; break;
        case 'sound': target.accept = 'audio/wav, audio/mp3, audio/mpeg3, audio/flac'; target.name = 'lib_file_son'; break;
    }

    target.click();
    target.onchange = function() { target.nextElementSibling.click(); }
}

function scrud_delete_media(elmt, path) {

    $(document).ready(function(){

        $.post('/scrud_xhr/scrud_delete_media', { 'path': path }, function(data, status){

            if (status == 'success') {

                var output = document.querySelector('#scrud_lib_modal_info p');
                output.innerHTML = 'Fichier <b>' + data + '</b> supprimé<br>de la <b>bibliothèque</b>';
                output.parentElement.classList.add('scrud_lib_modal_good');
                output.parentElement.classList.add('display_lib_modal');
                setTimeout(function () {
                    output.parentElement.classList.remove('display_lib_modal');
                    refresh_librairies();
                }, 3000);
            }
        });
    });
}

function refresh_librairies() {

    $(document).ready(function(){

        $.post('/scrud_xhr/refresh_librairies', { 'key': 'refresh' }, function(data, status){

            if (status == 'success') {

                document.querySelector('#bibliotheque').children[1].innerHTML = data;
                var bibliH2 = document.querySelectorAll('#bibliotheque h2');
                var lib_importer = document.querySelectorAll('.scrud_lib_importer');
                var lib_download_link = document.querySelectorAll('.scrud_lib_download_link');
                var color = document.querySelectorAll('.backSection')[0].style.borderTopColor;

                for (var i = 0; i < bibliH2.length; i++) { bibliH2[i].style.borderColor = color; }
                for (var i = 0; i < lib_importer.length; i++) { lib_importer[i].style.backgroundColor = color; }
                for (var i = 0; i < lib_download_link.length; i++) { lib_download_link[i].style.backgroundColor = color; }

                ignite_formData_lib();
                setTimeout(function(){ media_file_duration(); }, 1000);
            }
        });
    });
}

function ignite_formData_lib() {

    document.querySelector('#scrud_lib_section_checker').parentElement.setAttribute('class', 'scrud_bib');
    document.querySelector('main').classList.add('showMain');

    var bodyContent = document.querySelector('body');
    var inner = '<div id="scrud_lib_modal_info"><p></p></div>';
    bodyContent.innerHTML = inner + bodyContent.innerHTML;

    var form = document.forms.namedItem('scrud_lib_upload_form');
    form.addEventListener('submit', function(sub) {

        var output = document.querySelector('#scrud_lib_modal_info p');
        var data = new FormData(document.forms.namedItem('scrud_lib_upload_form'));
        var type = document.querySelector('#scrud_hidden_lib_file_input').name;
        data.append("type", type);

        var req = new XMLHttpRequest();
        req.open('POST', '/scrud_xhr/lib_uploader', true);
        req.onload = function(load) {

            if (req.status == 200) {

                if (req.response.search('404') != -1) {

                    output.innerHTML = 'Une <b>erreur est survenue<br>durant l\'import';
                    output.parentElement.classList.add('scrud_lib_modal_error');
                    output.parentElement.classList.add('display_lib_modal');
                    setTimeout(function(){
                        output.parentElement.classList.remove('display_lib_modal');
                    }, 3000);

                } else {

                    output.innerHTML = 'Fichier <b>' + req.response + '</b> importé dans<br>la <b>bibliothèque</b>';
                    output.parentElement.classList.add('scrud_lib_modal_good');
                    output.parentElement.classList.add('display_lib_modal');
                    setTimeout(function () {
                        output.parentElement.classList.remove('display_lib_modal');
                        refresh_librairies();
                    }, 3000);
                }

            } else {

                output.innerHTML = 'Une <b>erreur</b> de type <b>' + req.status + '</b><br>est survenue durant l\'import';
                output.parentElement.classList.add('lib_modal_error');
                output.parentElement.classList.add('display_lib_modal');
                setTimeout(function(){
                    output.parentElement.classList.remove('display_lib_modal');
                }, 3000);
            }
        };

        req.send(data);
        sub.preventDefault();
    }, false);
}

/*
=============================================================================
============================== Dashboard Igniter ============================
=============================================================================
 */

if (document.querySelector('.sidebar')) {
    igniteDashboard();
}

function igniteDashboard() {

    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $counter = $('.counter');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }

                if ($counter.length != 0) {
                    $counter.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });

    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        var page = document.querySelector('#statsPage');
        if (page) {
            md.initDashboardPageCharts('2020');
        }

    });
}

function calculateTotalValue(length) {

    var minutes = Math.floor(length / 60),
        seconds_int = length - minutes * 60,
        seconds_str = seconds_int.toString().replace('.', '0'),
        seconds = seconds_str.substr(0, 2),
        time = minutes + 'm' + seconds + 's';

    return time;
}

function initMediaSize() {

    if (document.querySelector('form') && document.querySelector('form').name === 'scrud_lib_upload_form') {

        var srcs = document.querySelectorAll('audio');
        for (let i = 0; i < srcs.length; i++) {
            srcs[i].onloadedmetadata = () => {
                var duration = srcs[i].duration,
                    calc = srcs[i].closest('tr').children[3];
                if (duration !== 'NaN') {
                    calc.innerHTML = calculateTotalValue(duration);
                }
            };
        }

        var vids = document.querySelectorAll('video');
        for (let i = 0; i < vids.length; i++) {
            vids[i].onloadedmetadata = () => {
                var duration = vids[i].duration,
                    calc = vids[i].closest('tr').children[3];
                if (duration !== 'NaN') {
                    calc.innerHTML = calculateTotalValue(duration);
                }
            };
        }
    }
}

function listen_scrud_sound(elmt) {

    var target = elmt.nextElementSibling.children[0];
    var stop = elmt.previousElementSibling;

    if (!stop.classList.contains('show_srcud_stopMusic')) {

        stop.classList.add('show_srcud_stopMusic');
        target.src = target.parentElement.dataset.src;
    }

    setTimeout(function(){

        if (elmt.classList.contains('scrud_show_musicPlayer')) {

            elmt.classList.remove('scrud_show_musicPlayer');
            elmt.innerHTML = '<svg viewBox="0 0 32 32"><path d="M6 4l20 12-20 12z"></path></svg>';
            target.pause();

        } else {

            elmt.classList.add('scrud_show_musicPlayer');
            elmt.innerHTML = '<svg viewBox="0 0 32 32"><path d="M4 4h10v24h-10zM18 4h10v24h-10z"></path></svg>';
            target.play();
        }

    }, 50);
}

function stop_scrud_music(elmt) {

    var target = elmt.nextElementSibling.nextElementSibling.children[0];
    target.src = '';
    elmt.nextElementSibling.innerHTML = '<svg viewBox="0 0 32 32"><path d="M6 4l20 12-20 12z"></path></svg>';
    elmt.classList.remove('show_srcud_stopMusic');
    elmt.nextElementSibling.classList.remove('scrud_show_musicPlayer');
}

/*(function() {
    isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;

    if (isWindows) {
        // if we are on windows OS we activate the perfectScrollbar function
        $('.sidebar .sidebar-wrapper/!*, .main-panel, .main*!/').perfectScrollbar();

        $('html').addClass('perfect-scrollbar-on');
    } else {
        $('html').addClass('perfect-scrollbar-off');
    }
})();*/


var breakCards = true;

var searchVisible = 0;
var transparent = true;

var transparentDemo = true;
var fixedTop = false;

var mobile_menu_visible = 0,
    mobile_menu_initialized = false,
    toggle_initialized = false,
    bootstrap_nav_initialized = false;

var seq = 0,
    delays = 80,
    durations = 500;
var seq2 = 0,
    delays2 = 80,
    durations2 = 500;

$(document).ready(function() {

    $('body').bootstrapMaterialDesign();

    if (document.querySelector('.sidebar')) {

        $sidebar = $('.sidebar');

        md.initSidebarsCheck();

        window_width = $(window).width();

        // check if there is an image set for the sidebar's background
        md.checkSidebarImage();

        //    Activate bootstrap-select
        if ($(".selectpicker").length != 0) {
            $(".selectpicker").selectpicker();
        }

        //  Activate the tooltips
        $('[rel="tooltip"]').tooltip();

        $('.form-control').on("focus", function () {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function () {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });

        // remove class has-error for checkbox validation
        $('input[type="checkbox"][required="true"], input[type="radio"][required="true"]').on('click', function () {
            if ($(this).hasClass('error')) {
                $(this).closest('div').removeClass('has-error');
            }
        });
    }

});

$(document).on('click', '.navbar-toggler', function() {
    $toggle = $(this);

    if (mobile_menu_visible == 1) {
        $('html').removeClass('nav-open');

        $('.close-layer').remove();
        setTimeout(function() {
            $toggle.removeClass('toggled');
        }, 400);

        mobile_menu_visible = 0;
    } else {
        setTimeout(function() {
            $toggle.addClass('toggled');
        }, 430);

        var $layer = $('<div class="close-layer"></div>');

        if ($('body').find('.main-panel').length != 0) {
            $layer.appendTo(".main-panel");

        } else if (($('body').hasClass('off-canvas-sidebar'))) {
            $layer.appendTo(".wrapper-full-page");
        }

        setTimeout(function() {
            $layer.addClass('visible');
        }, 100);

        $layer.click(function() {
            $('html').removeClass('nav-open');
            mobile_menu_visible = 0;

            $layer.removeClass('visible');

            setTimeout(function() {
                $layer.remove();
                $toggle.removeClass('toggled');

            }, 400);
        });

        $('html').addClass('nav-open');
        mobile_menu_visible = 1;

    }

});

// activate collapse right menu when the windows is resized
$(window).resize(function() {
    md.initSidebarsCheck();

    // reset the seq for charts drawing animations
    seq = seq2 = 0;

    setTimeout(function() {
        if (document.querySelector('#statsPage')) {
            md.initDashboardPageCharts('2020');
        }
    }, 500);
});

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        }, wait);
        if (immediate && !timeout) func.apply(context, args);
    };
};

function add_listeners_ftp() {

    var ftp = document.querySelectorAll('.bandeau_ftp');

    if (ftp) {

        for (var i = 0; i < ftp.length; i++) {

            ftp[i].children[1].addEventListener('click', displayFTParray);
        }
    }
}

function displayFTParray(ftp) {

    var target = ftp.currentTarget;
    var array = target.parentElement.nextElementSibling;

    if (array.style.height == '0px') {

        array.style.height = '400px';
        array.style.opacity = '1';

    } else {

        array.style.height = '0px';
        array.style.opacity = '0';
    }
}

function earse_ftp_file(url, elmt) {

    var target = elmt;
    var twin = elmt.parentElement.nextElementSibling;
    var erase = elmt.previousElementSibling.previousElementSibling;
    erase.classList.add('show_eraser_loader');
    var index = parseInt(elmt.parentElement.dataset.id);
    var parent = elmt.parentElement.parentElement;
    var childies = parent.children;
    twin.style.height = '0px';
    twin.style.opacity = '0';

    $(document).ready(function(){

        $.post('/ajax/earse_ftp_file', { path: url },

            function(data, status){

                if (status == 'success') {

                    elmt.parentElement.classList.add('hide_all_table');
                    setTimeout(function(){

                        elmt.parentElement.style.display = 'none';

                        for (var i = 0; i < childies.length; i++) {

                            if (childies[i].dataset.id == index) {

                                parent.removeChild(childies[i+1]);
                                parent.removeChild(childies[i]);
                            }
                        }

                        if (parent.innerHTML == '') {

                            parent.innerHTML = '<p id="no_ftp_result">Aucun export disponible pour le moment.</p>'
                        }

                    }, 450);
                }
            }
        );
    });
}

function import_ftp(elmt) {
    document.querySelector('#hidden_ftp_form input').click();
}

function load_ftp(elmt) {

    var form = document.querySelector('#hidden_ftp_form');
    imports = [];
    importsObj = [];

    if (elmt.files) {

        for (var i = 0; i < elmt.files.length; i++) {

            var file = elmt.files[i];
            imports.push(file.name);
            importsObj.push(file);
        }

        importsObj.forEach(function(file) {

            var formData = new FormData();
            var request = new XMLHttpRequest();

            formData.set('ftp_import', file);
            formData.set('xhr2', 'import_ftp');
            request.open('POST', '/admin/request');

            request.onload = function(event, nom = file.name) {

                if (request.status == 200) {

                    document.querySelector('#ftp_content').innerHTML = event.srcElement.response;
                    add_listeners_ftp();
                    get_servers_details();

                } else {

                    console.log('Une erreur s\'est produite...');
                }
            };

            request.send(formData);
        });
    }
}

function get_servers_details() {

    var servers = document.querySelectorAll('server');

    if (servers) {

        for (var i = 0; i < servers.length; i++) {

            var lists = servers[i].children;
            var list = '<ul class="modale_ftp">';

            for (var j = 0; j < lists.length; j++) {

                if (lists[j].tagName == 'HOST' || lists[j].tagName == 'PORT' || lists[j].tagName == 'USER') {

                    list += '<li><b>' + lists[j].tagName.charAt(0).toUpperCase() + lists[j].tagName.slice(1).toLowerCase() + ' : </b><span>' + lists[j].innerHTML + '</span></li>';

                } else if (lists[j].tagName == 'PASS') {

                    list += '<li><b>' + lists[j].tagName.charAt(0).toUpperCase() + lists[j].tagName.slice(1).toLowerCase() + ' : </b><span>' + window.atob(lists[j].innerHTML) + '</span></li>';
                }
            }

            list += '</ul>';

            var children = servers[i].children;

            for (var j = 0; j < children.length; j++) {

                if (children[j].tagName == 'NAME') {

                    var inner = children[j].innerHTML;
                    children[j].innerHTML = '<p onclick="display_ftp_modal(this);">' + inner + '</p>';
                }
            }

            var inner = servers[i].querySelector('name').innerHTML + list;
            servers[i].innerHTML = inner;
        }
    }
}

function display_ftp_modal(elmt) {

    if (elmt.nextElementSibling.classList.contains('show_ftp_modale')) {

        elmt.nextElementSibling.classList.remove('show_ftp_modale');
        elmt.nextElementSibling.style.height = '0px';

    } else {

        var modale_ftp = document.querySelectorAll('.modale_ftp');

        for (var i = 0; i < modale_ftp.length; i++) {

            modale_ftp[i].classList.remove('show_ftp_modale');
            modale_ftp[i].style.height = '0px';
        }

        elmt.nextElementSibling.style.height = elmt.nextElementSibling.scrollHeight + 20 + 'px';
        elmt.nextElementSibling.classList.add('show_ftp_modale');
    }
}

/*
* =============================================================================
* ============================= Working Methods ===============================
* =============================================================================
*/

Request('tests', {});

console.log('test admin');
