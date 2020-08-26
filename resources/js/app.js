require('./bootstrap');

$(document).on("click", "#getBooks", function () {
    $.ajax({
        method: "POST",
        url: '127.0.0.1:8000//reserves/',
        data: { "action": "get_reserves", "reservationData": mydata },
        type: 'JSON',
        success: function (answer) {
            console.log(answer);
        }
    })
});
