<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/package/list.php
return [
    'header' => [
        'title'     => 'Package Management',
        'depth1'    => 'home',
        'depth2'    => 'package management',
        'depth3'    => 'package list'
    ],
    'contents' => [
        'title' => 'Package List'
    ],
    'panel-1' => [
        'title'     => 'Available Create Code',
        'label-1'   => 'Single',
        'label-2'   => 'Multi',
        'button-1'  => 'Create Code',
    ],
    'panel-2' => [
        'title'     => 'Available Printing Code',
        'label-1'   => 'Single',
        'label-2'   => 'Multi',
        'button-1'  => 'Download Exist Excel',
        'button-2'  => 'Download New Excel',
    ],
    'panel-3' => [
        'title'     => 'Available Packaging Code',
        'label-1'   => 'Single',
        'label-2'   => 'Multi',
        'button-1'  => 'Create Package',
    ],
    'table' => [
        'select-1'  => [
            'label'             => 'Status',
            'option-default'    => 'all',
        ],
        'header' => [
            'no'            => 'NO',
            'type'          => 'Code Type',
            'start_no'      => 'Start NO',
            'end_no'        => 'End NO',
            'create_date'   => 'Create Date',
            'status'        => 'Status',
        ],
    ],
    'modal-1'   => [
        'title'     => 'Create Code',
        'select-1'  => [
            'option-default'    => 'Select',
        ],
        'label-1'   => 'Type',
        'label-2'   => 'Amount',
        'label-3'   => 'Password',
    ],
    'modal-2'   => [
        'title'     => 'Download Exist Excel',
        'select-1'  => [
            'option-default'    => 'Select',
        ],
        'label-1'   => 'Type',
        'label-2'   => 'Files',
    ],
    'modal-3'   => [
        'title'     => 'Download New Excel',
        'select-1'  => [
            'option-default'    => 'Select',
        ],
        'label-1'   => 'Type',
        'label-2'   => 'Amount',
    ],
    'modal-4'   => [
        'title'     => 'Create Package',
        'select-1'  => [
            'option-default'    => 'Select',
        ],
        'label-1'   => 'Type',
        'label-2'   => 'User Count',
        'label-3'   => 'Total Count',
        'label-4'   => 'Sheet Count',
        'label-5'   => 'File',
    ],
    'ajax-1'  => [
        '200'       => 'Success',
        '400-1'     => 'Incorrect Amount',
        '400'       => 'Incorrect Parameters',
        '401'       => 'Incorrect Password',
        '500'       => 'Server Error',
    ],
    'ajax-2'  => [
        '200'       => 'Success',
        '400-1'     => 'Incorrect Amount',
        '400'       => 'Incorrect Parameters',
        '401'       => 'Incorrect Password',
        '500'       => 'Server Error',
    ],
    'ajax-3'  => [
        '200'       => 'Success',
        '400-1'     => 'Incorrect Amount',
        '400'       => 'Incorrect Parameters',
        '401'       => 'Incorrect Password',
        '500'       => 'Server Error',
    ],
    'ajax-4'  => [
        '200'       => 'Success',
        '400-1'     => 'Incorrect Amount',
        '400'       => 'Incorrect Parameters',
        '401'       => 'Incorrect Password',
        '500'       => 'Server Error',
    ],
    'alert' => [
        'select-excel'      => 'Select the excel file',
        'select-file'       => 'Select the file',
        'invalid-type'      => 'Invalid type',
        'invalid-amount'    => 'Invalid amount',
        'invalid-password'  => 'Invalid password',
        'invalid-user-cnt'  => 'Invalid user count',
        'invalid-total-cnt' => 'Invalid total count',
        'invalid-sheet-cnt' => 'Invalid sheet count',
    ],
    'package-status'    => [
        'registered'    => 'registered',
        'out'           => 'out',
        'sold'          => 'sold',
    ],
];
