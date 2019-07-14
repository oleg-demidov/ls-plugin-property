<?php

return [
    /**
     * Кастомные поля
     */
    'video'   => array(
        'preview' => 'Предпросмотр видео',
        'watch'   => 'Смотреть'
    ),
    'image'   => array(
        'empty' => 'Изображения нет'
    ),
    'file'    => array(
        'forbidden' => 'Для доступа к файлу необходимо авторизоваться',
        'downloads' => 'Загрузок',
        'empty'     => 'Файла нет'
    ),
    'notices' => array(
        'validate_type'                   => 'Неверный тип поля',
        'validate_code'                   => 'Код поля должен быть уникальным',
        'validate_value_date_future'      => 'дата не может быть в будущем',
        'validate_value_date_past'        => 'дата не может быть в прошлом',
        'validate_value_file_empty'       => 'Необходимо выбрать файл',
        'validate_value_file_upload'      => 'При загрузке файла возникла ошибка',
        'validate_value_file_size_max'    => 'Превышен размер файла, максимальный %%size%% Kb',
        'validate_value_file_type'        => 'Неверный тип файла, допустимы %%types%%',
        'validate_value_image_wrong'      => 'Файл не является изображением',
        'validate_value_image_width_max'  => 'Максимальная допустимая ширина изображения %%size%%px',
        'validate_value_image_height_max' => 'Максимальная допустимая высота изображения %%size%%px',
        'validate_value_select_max'       => 'Максимально можно выбрать только %%count%% элемента',
        'validate_value_select_min'       => 'Минимально можно выбрать только %%count%% элемента',
        'validate_value_select_wrong'     => 'Проверьте корректность выбранных элементов',
        'validate_value_select_only_one'  => 'Можно выбрать только один элемент',
        'validate_value_video_wrong'      => 'Необходимо указать корректную ссылку на видео: YouTube, Vimeo',
        'validate_value_wrong'            => 'Поле "%%field%%": ',
        'validate_value_wrong_base'       => 'неверное значение',
        'create_error'                    => 'Возникла ошибка при добавлении поля',
    ),
];