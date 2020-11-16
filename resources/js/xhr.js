/*
* =============================================================================
* =============================== XHR Methods =================================
* =============================================================================
*/


import { getUsersResponse } from './script.js';
import { getTestsResponse, getDeleteResponse } from './script-admin.js';

export default function xhr(controller, json) {

    json._token = $('meta[name="csrf-token"]').attr('content');
    $.post('/xhrprotocol/' + controller, json, function (data, status) {

        if (status == 'success') {

            try {

                var response = JSON.parse(data),
                    infos = response.data,
                    error = response.error,
                    params = response.params,
                    callback = response.callback;

                if (infos.length == 0 && error != '') {

                    console.log("😥 - %cPHP Bad request !" + " %cError message: %c" + error, 'color:#1a8cff;', 'color:inherit;', 'color:#ff4d4d;');
                } else {

                    switch (callback) {

                        case 'getUsersResponse':
                            getUsersResponse(infos);
                            break;

                        case 'getTestsResponse':
                            getTestsResponse(infos);
                            break;

                        case 'getDeleteResponse':
                            getDeleteResponse(infos);
                            break;

                        default:
                            console.log("😥 - %cCallback does not exist !" + " %cError message: %c" + callback + " is not defined.", 'color:#1a8cff;', 'color:inherit;', 'color:#ff4d4d;');
                            break;
                    }
                }

            } catch (e) {

                console.log("😥 - %cJSON" + " %cparsing error on " + "%cXHR response" + "%c. Error message: %c" + e.message + "...", 'color:#1a8cff;', 'color:inherit;', 'color:#1a8cff', 'color:inherit;', 'color:#ff4d4d;');
            }
        }
    });
}