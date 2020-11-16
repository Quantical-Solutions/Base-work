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
        var $sidebar = $('.sidebar');
        var image_src = $sidebar.data('image');

        if (image_src !== undefined) {
            var sidebar_container = '<div class="sidebar-background" style="background-image: url(' + image_src + ') "/>';
            $sidebar.append(sidebar_container);
        }
    },

    showNotification: function(from, align) {
        var type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

        var color = Math.floor((Math.random() * 6) + 1);

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
        if ($(window).width() < 992) {
            var $sidebar = $('.sidebar');
            if ($sidebar.length != 0) {
                md.initRightMenu();
            }
        } else {
            var $sidebar_wrapper = $('.sidebar-wrapper');
            $sidebar_wrapper.find('.navbar-form').remove();
            $sidebar_wrapper.find('.nav-mobile-menu').remove();

            mobile_menu_initialized = false;
        }
    },

    checkFullPageBackgroundImage: function() {
        var $page = $('.full-page');
        var image_src = $page.data('image');

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

            var dataNewCustomersChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'newCustomersChart').coord
                ]
            };

            var optionsNewCustomersChart = {
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

            var dataActivateCardChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'activateCardChart').coord
                ]
            };

            var optionsActivateCardChart = {
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

            var dataEstateChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'estateChart').coord
                ]
            };

            var optionsEstateChart = {
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

            var dataOrderChart = {
                labels: this.labelsChart,
                series: [
                    this.getStatsFromJson(date, 'orderChart').coord
                ]
            };

            var optionsOrderChart = {
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

        var dataDeliveryChart = {
            labels: this.labelsChart,
            series: [
                this.getStatsFromJson(date, 'deliveryChart').coord
            ]
        };

        var optionsDeliveryChart = {
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
        var $sidebar_wrapper = $('.sidebar-wrapper');

        if (!mobile_menu_initialized) {
            var $navbar = $('nav').find('.navbar-collapse').children('.navbar-nav');

            var mobile_menu_content = '';

            var nav_content = $navbar.html();

            nav_content = '<ul class="nav navbar-nav nav-mobile-menu">' + nav_content + '</ul>';

            var navbar_form = $('nav').find('.navbar-form').get(0).outerHTML;

            var $sidebar_nav = $sidebar_wrapper.find(' > .nav');

            // insert the navbar form before the sidebar list
            var $nav_content = $(nav_content);
            var $navbar_form = $(navbar_form);
            $nav_content.insertBefore($sidebar_nav);
            $navbar_form.insertBefore($nav_content);

            $(".sidebar-wrapper .dropdown .dropdown-menu > li > a").click(function(event) {
                event.stopPropagation();
                initSearch();
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

            initSearch();
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
initFirstLoad();

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
                    }
                });
            });
        }, 1250);
    }
}

function initFirstLoad() {

    setCKEditor();
    initMediaSize();
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

/*
=============================================================================
============================== Dashboard Igniter ============================
=============================================================================
 */

if ($('.sidebar')) {
    igniteDashboard();
}

function igniteDashboard() {

    $(document).ready(function() {

        var $sidebar = $('.sidebar');

        var $sidebar_img_container = $sidebar.find('.sidebar-background');

        var $full_page = $('.full-page');

        var $sidebar_responsive = $('body > .navbar-collapse');

        var window_width = $(window).width();

        var fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

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

        var $sidebar = $('.sidebar');

        md.initSidebarsCheck();

        var window_width = $(window).width();

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
    var $toggle = $(this);

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

/*
* =============================================================================
* ============================= Working Methods ===============================
* =============================================================================
*/

Request('tests', {});

var ongletSelected = document.querySelector('.hoverSpan');
if (ongletSelected) {
    var label = ongletSelected.querySelector('p');
    var posY = ongletSelected.parentElement.offsetTop - 20;
    if (label.innerHTML != 'Statistiques') {
        ongletSelected.parentElement.parentElement.parentElement.scrollTo(0, posY);
    }
}

initSearch();

function initSearch() {

    var searchInputs = document.querySelectorAll('.searchInputs');
    for (var i = 0; i < searchInputs.length; i++) {
        searchInputs[i].onkeyup = function (ev) {
            var target = ev.currentTarget,
                value = target.value;
            
            if (value.length > 0) {
                target.nextElementSibling.disabled = false;
            } else {
                target.nextElementSibling.disabled = true;
            }
        }
    }
}

var tables = document.querySelectorAll('.table');
for (var i = 0; i < tables.length; i++) {
    var table = tables[i],
        th = table.querySelectorAll('th'),
        long = 0;
    for (var j = 0; j < th.length; j++) {
        long += 180;
    }
    table.style.width = long + 'px';
}

$(document).ready(function(){
    document.querySelector('#mainLoader').classList.remove('displayLoader');
    document.querySelector('#pageReplacer').classList.add('displayCard');
    paginater();
});

function paginater() {

    var scrudCard = document.querySelector('.scrudCard');
    if (scrudCard) {
        if (document.querySelector('#entitiesCounter')) {
            document.querySelector('.navbar-brand').removeChild(document.querySelector('#entitiesCounter'));
        }
        document.querySelector('.navbar-brand').innerHTML += '<span id="entitiesCounter">' + document.querySelector('.scrudCard').dataset.count + '</span>';
        var pagi = document.querySelectorAll('.pagination');
        for (var i = 0; i < pagi.length; i++) {
            pagi[i].parentElement.removeChild(pagi[i]);
        }
        var trs = scrudCard.querySelectorAll('tBody tr');
        for (var i = 0; i < trs.length; i++) {
            trs[i].classList.add('trVisible');
        }
        for (var i = 0; i < trs.length; i++) {
            if (i > 9) {
                trs[i].classList.remove('trVisible');
            }
        }

        var counter = (scrudCard.dataset.count != '') ? parseInt(scrudCard.dataset.count) : 0;
        if (counter > 0) {
            var nb = Math.ceil(counter / 10);
            var html = '<div class="pagination">';
            html += '<select>';
            for (var i = 0; i < nb; i++) {
                html += '<option value="' + (i + 1) + '">' + (i + 1) + '</option>';
            }
            html += '</select>';
            html += '<span>sur ' + nb + '</span>';
            html += '</div>';
            document.querySelector('#pageReplacer').innerHTML += html;
            var select = document.querySelectorAll('.pagination select');
            for (var i = 0; i < select.length; i++) {
                select[i].onchange = function(ev) {
                    var target = ev.currentTarget,
                        value = target.value * 10,
                        start = value - 10;
                    console.log(start);
                    console.log(value);
                    var scrudCard = document.querySelector('.scrudCard');
                    var trz = scrudCard.querySelectorAll('tBody tr');
                    for (var j = 0; j < trz.length; j++) {
                        trz[j].classList.remove('trVisible');
                    }
                    for (var j = 0; j < trz.length; j++) {
                        if (j >= start && j < value) {
                            trz[j].classList.add('trVisible');
                        }
                    }
                    document.querySelector('#pageReplacer').scrollTo(0, 0);
                }
            }
        }
    }
}

function igniteSearchInputs() {

    var searchInputs = document.querySelectorAll('.thSearch');
    for (var i = 0; i < searchInputs.length; i++) {
        var input = searchInputs[i].querySelector('input');
        input.onkeyup = function(ev) {
            var target = ev.currentTarget,
                value = target.value,
                data = target.dataset.col,
                scrudCard = document.querySelector('.scrudCard'),
                trz = scrudCard.querySelectorAll('tBody tr'),
                paginations = document.querySelectorAll('.pagination');

            if (value.length > 0) {

                for (var j = 0; j < paginations.length; j++) {

                    paginations[j].style.display = 'none';
                }

                for (var j = 0; j < trz.length; j++) {

                    var tr = trz[j],
                        tds = tr.querySelectorAll('td');
                    tr.classList.remove('trVisible');
                    for (var k = 0; k < tds.length; k++) {

                        var td = tds[k];
                        if (td.classList.contains('td-' + data)
                            && (td.innerText.toLowerCase().indexOf(value.toLowerCase()) > -1
                                || td.textContent.toLowerCase().indexOf(value.toLowerCase()) > -1)) {

                            var parent = td.parentElement.classList.add('trVisible');
                        }
                    }
                }

            } else {

                for (var j = 0; j < paginations.length; j++) {

                    paginations[j].style.display = 'flex';
                    paginations[j].querySelector('select').children[0].selected = true;
                }

                for (var j = 0; j < trz.length; j++) {

                    var tr = trz[j];
                    tr.classList.add('trVisible');
                }
                paginater();
                igniteSearchInputs();
            }
        }
    }
}

function deleteRowScrud() {

    var scrudDeleteLink = document.querySelectorAll('.scrudDeleteLink');
    for (var i = 0; i < scrudDeleteLink.length; i++) {
        var deleter = scrudDeleteLink[i];
        deleter.onclick = function(ev) {
            var target = ev.currentTarget,
                id = target.dataset.id,
                url = target.dataset.url.slice(1),
                json = { 'id': id, 'url': url },
                counter = document.querySelector('#entitiesCounter'),
                tr = target.closest('tr'),
                parent = tr.parentElement,
                ref = document.querySelector('.scrudCard');

            Request('delete', json);
            if (counter) {
                
                var index = parseInt(counter.innerHTML);
                var newIndex = index - 1;
                ref.dataset.count = newIndex;
                tr.style.backgroundColor = 'rgba(179, 45, 0, 0.5)';
                setTimeout(function(){
                    parent.removeChild(tr);
                    paginater();
                    deleteRowScrud();
                }, 1000);
            }
        }
    }
}

$(document).ready(function(){

    igniteSearchInputs();
    deleteRowScrud();
});
