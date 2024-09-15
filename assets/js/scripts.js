

    $(document).ready(function () {

            // вывод текста запроса при изменении выбора запроса
            $('#request_select').change(function () {
                let request = $(this).val();
                $.ajax({
                    url: 'actions/request_text.php',
                    type: 'POST',
                    data: {
                        id: request
                    },
                    success: function (data) {
                        $('#result_span').text(data);
                    }
                });
            });

            // Выполнение запроса при нажатии на кнопку
            $('#request_execute_btn').click(function (e) {
                let request = $('#request_select').val();
                if (request) {
                    e.preventDefault();

                    $.ajax({
                        url: 'actions/request_execute.php',
                        type: 'POST',
                        data: {
                            id: request
                        },
                        success: function (data) {
                            $('#table').html(data);
                        }
                    });
                }
            });

            // Добавление запроса при нажатии на кнопку
            $('#request_form_insert').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: 'actions/request_insert.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (data) {
                        $('input').val('');
                        $('textarea').val('');
                        $('#result_insert').removeClass('alert-danger').addClass('alert-success');
                        $('#result_insert').html(data);
                    },
                    error: function (data) {
                        $('input').val('');
                        $('textarea').val('');
                        $('#result_insert').removeClass('alert-success').addClass('alert-danger');
                        $('#result_insert').html(data);
                    }
                })
            })

        // Редактирование запроса при нажатии на кнопку
        $('#request_form_update').submit(function (e) {
            e.preventDefault();
            let request = $('#request_select').val();

            $.ajax({
                url: 'actions/request_update.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    $('input').val('');
                    $('textarea').val('');
                    $('#result_update').removeClass('alert-danger').addClass('alert-success');
                    $('#result_update').html(data);
                },
                error: function (data) {
                    $('input').val('');
                    $('textarea').val('');
                    $('#result_update').removeClass('alert-success').addClass('alert-danger');
                    $('#result_update').html(data);
                }
            })
            })




    });


