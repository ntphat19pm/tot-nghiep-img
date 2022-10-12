<?php
    return[
        [
            'label'=>'Home',
            'route'=>'admin.index',
            'icon'=>'fa-home'
        ],
        [
            'label'=>'Quản lý nhân viên',
            'route'=>'nhanvien.index',
            'icon'=>'fa-users-cog'

        ],
         [
            'label'=>'Quản lý ảnh bạn bè',
            'route'=>'banbe.index',
            'icon'=>'fa-users-cog'

        ],
        [
            'label'=>'Quản lý ảnh cá nhân',
            'route'=>'canhan.index',
            'icon'=>'fa-users-cog'

        ],
        [
            'label'=>'Quản lý ảnh người thân',
            'route'=>'nguoithan.index',
            'icon'=>'fa-users-cog'

        ],    
        [
            'label'=>' Cài đặt',
            'route'=>'admin.index',
            'icon'=>'fa-wrench',
            'item' =>[
                [
                    'label'=>'Quản lý thông tin',
                    'route'=>'lienhe.index'
                ]
            ]

        ],


    ]


?>